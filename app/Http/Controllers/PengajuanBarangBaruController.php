<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\PengajuanBarangBaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
// fitur baru
use App\Models\InventoryUse;
use App\Models\Supplier;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PengajuanBarangBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == "manager") {
            return view('pengajuan.baru.index', [
                'title' => "Data Pengajuan Manager",
            ]);
        } 

        return view('pengajuan.gudang.baru.index', [
            'title' => "Data Pengajuan Gudang",
            'supplier' => Supplier::all(),  

        ]);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = PengajuanBarangBaru::with(['pengaju','supplier',])->get();
            return datatables()->of($data)
                ->addColumn('pengaju', function (PengajuanBarangBaru $dataPengajuanBarang) {
                    return $dataPengajuanBarang->pengaju->name;
                }) 
                ->addColumn('barang', function (PengajuanBarangBaru $dataPengajuanBarang) {
                    return $dataPengajuanBarang->inventory->nama_barang;
                })
                ->addColumn('supplier', function (PengajuanBarangBaru $dataPengajuanBarang) {
                    return $dataPengajuanBarang->supplier->nama;
                })
                ->addColumn('action', function (PengajuanBarangBaru $pengajuanBarang) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="deleteuser btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                
                ->rawColumns(['action'])
                ->toJson();
        }
        
    }
    public function create()
    {
        $supplier = Supplier::orderBy('created_at', 'desc')->get();
        return view('offcanvas.add_new_inventory', [
            'title' => 'Data Mangga',
            'supplier' => $supplier
        ]);
    }


    public function edit($id)
    {
        $data = Inventory::find($id);
        $supplier = Supplier::orderBy('created_at', 'desc')->get();
        return view('offcanvas.edit_inventory', [
            'title' => 'Data Mangga',
            'supplier' => $supplier,
            'data' => $data
        ]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'jumlah_barang' => ['required', 'integer', 'min:1'],
            'informasi_barang' => ['required', 'string', 'max:255'],
            // 'id_supplier' => ['required', 'integer', 'min:1'],

        ], [
            'nama_barang.required' => 'Harap isi nama barang baru',
            'nama_barang.string' => 'Nama barang harus berupa huruf',
            'nama_barang.max' => 'Nama barang maksimal 255 karakter',
            'jumlah_barang.required' => 'Harap isi stok jumlah barang dengan angka',
            'jumlah_barang.integer' => 'Jumlah barang harus berupa angka',
            'jumlah_barang.min' => 'Jumlah barang minimal adalah 1',
            'informasi_barang.required' => 'Harap isi informasi barang',
            'informasi_barang.string' => 'Informasi barang harus berupa huruf',
            'informasi_barang.max' => 'Informasi barang maksimal 255 karakter',
            'id_supplier.integer' => ''

        ]);

        $validateData['tanggal_pengajuan'] = date('Y-m-d');
        $validateData['id_user'] = Auth::user()->id;

        $data = PengajuanBarangBaru::create($validateData);

        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanBarangBaru  $pengajuanBarangBaru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanBarangBaru $pengajuanBarangBaru)
    {
        $pengajuanBarangBaru->status_manajer = !$pengajuanBarangBaru->status_manajer;
        $pengajuanBarangBaru->save();

        return response()->json(['data'=> $pengajuanBarangBaru], 200);
    }

    public function updateStatusSampai(Request $request, PengajuanBarangBaru $pengajuanBarangBaru)
    {
        $pengajuanBarangBaru->status_barang_sampai = !$pengajuanBarangBaru->status_barang_sampai;
        $pengajuanBarangBaru->save();

        $pengajuanBarangBaru->refresh();

        $dataBarang = Inventory::create([
            'nomor_notifikasi' => substr(uniqid(), 0, 10) ,
            'nama_barang' => $pengajuanBarangBaru->nama_barang,
            'stok_barang' => $pengajuanBarangBaru->jumlah_barang,
            'satuan_barang' => 'pcs',
            'informasi_barang' => $pengajuanBarangBaru->informasi_barang,

        ]);

        return response()->json(['data'=> $pengajuanBarangBaru, 'data_inventory' => $dataBarang], 200);
    }
}
