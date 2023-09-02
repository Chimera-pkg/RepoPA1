<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\PengajuanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// fitur baru
use App\Models\InventoryUse;
use App\Models\Supplier;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;






class PengajuanBarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == "manager") {
            return view('pengajuan.index', [
                'title' => "Data Pengajuan Manager",
            ]);
        } 

        return view('pengajuan.gudang.index', [
            'title' => "Data Pengajuan Gudang",
            'inventories' => Inventory::all(),
            'supplier' => Supplier::all(),  
            
        ]);
    }
    // fitur baru    
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = PengajuanBarang::with(['inventory', 'pengaju'])->get();
            return datatables()->of($data)
                ->addColumn('pengaju', function (PengajuanBarang $dataPengajuanBarang) {
                    return $dataPengajuanBarang->pengaju->name;
                })
                ->addColumn('barang', function (PengajuanBarang $dataPengajuanBarang) {
                    return $dataPengajuanBarang->inventory->nama_barang;
                })
                ->addColumn('supplier', function (PengajuanBarang $dataPengajuanBarang) {
                    return $dataPengajuanBarang->supplier->nama;
                })
                ->addColumn('action', function (PengajuanBarang $pengajuanBarang) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="deleteuser btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'id_inventory' => 'required',
            'jumlah_barang' => 'required|integer|min:1',
            // 'id_supplier' => 'required|min:1', // Anda tidak perlu menggunakan 'varchar' di sini
        ], [
            'id_inventory.required' => 'Harap pilih barang terlebih dahulu',
            'jumlah_barang.required' => 'Harap isi stok jumlah barang',
            'jumlah_barang.integer' => 'Jumlah barang harus berupa angka',
            'jumlah_barang.min' => 'Jumlah barang minimal adalah 1',
            // 'id_supplier.required' => 'Harap pilih supplier',
            // 'id_supplier.min' => 'Pilih supplier yang valid',
            // 'id_supplier' => $req->id_supplier,

        ]);
    
        // Buat objek PengajuanBarang
        $pengajuan = new PengajuanBarang();
        $pengajuan->id_inventory = $validatedData['id_inventory'];
        $pengajuan->jumlah_barang = $validatedData['jumlah_barang'];
        // $pengajuan->id_supplier = $validatedData['id_supplier'];
        $pengajuan->tanggal_pengajuan = now(); // Menambahkan tanggal saat ini
        // $pengajuan->id_user = Auth::user()->id;
    
        // Simpan pengajuan ke database
        $pengajuan->save();
    
        return response()->json(['data' => $pengajuan], 200);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanBarang  $pengajuanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanBarang $pengajuanBarang)
    {
        $pengajuanBarang->status_manajer = !$pengajuanBarang->status_manajer;
        $pengajuanBarang->save();

        return response()->json(['data'=> $pengajuanBarang], 200);

    }

    public function updateStatusSampai(Request $request, PengajuanBarang $pengajuanBarang)
    {
        $pengajuanBarang->status_barang_sampai = !$pengajuanBarang->status_barang_sampai;
        $pengajuanBarang->save();

        $pengajuanBarang->refresh();

        $dataBarang = Inventory::find($pengajuanBarang->id_inventory);
        $dataBarang->stok_barang = $dataBarang->stok_barang + $pengajuanBarang->jumlah_barang;
        $dataBarang->save();

        return response()->json(['data'=> $pengajuanBarang], 200);
    }
}
