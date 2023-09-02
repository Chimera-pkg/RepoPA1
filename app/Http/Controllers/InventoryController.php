<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryUse;
use App\Models\Supplier;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $inventori = Inventory::where('status_barang', 1)->get();
        $jumlah = Inventory::where('stok_barang', '<', 20)->count();
        $data = [
            'title' => 'Kelola Inventori - Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'inventori' => $inventori,
            'jumlah' => $jumlah
        ];

        return view('kelola_inventori', $data);
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

    public function store(Request $req)
    {
        // $validator = Validator::make($req->all(), [
        //     'name' => ['required', 'string', 'max:255'],
        //     'username' => ['required', 'string', 'unique:users'],
        //     'role' => ['required', 'string'],
        //     'password' => ['required', 'string'],
        //     'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
        // ]);

        // // dd($req->name);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $imageName = time() . '.' . $req->gambar_barang->extension();
        $req->gambar_barang->move(public_path('assets/img/bahan'), $imageName);

        Inventory::create([
            'nomor_notifikasi' => $req->nomor_notifikasi,
            'nama_barang' => $req->nama_barang,
            'gambar_barang' => $imageName,
            'stok_barang' => $req->stok,
            'kadaluarsa_barang' => $req->kadaluarsa_barang,
            'satuan_barang' => $req->satuan_barang,
            'status_barang' => $req->kondisi_barang,
            'informasi_barang' => $req->infomasi_barang,
            'id_supplier' => $req->id_supplier,
        ]);

        if ($req->kondisi_barang == "1") {
            return redirect()->back()->with('success', 'Data Berhasil Disimpan!');
        } else {
            return redirect()->back()->with('success', 'Data Masuk Pada Menu Pengembalian!');
        }
    }

    public function update_status($id)
    {

        // dd($id);
        $inventory = Inventory::find($id);

        // $data = [];

        if ($inventory->status_barang == 1) {

            $data = [
                'status_barang' => 0,
            ];
        } else {

            $data = [
                'status_barang' => 1,
            ];
        }

        $inventory->update($data);

        return redirect()->back()->with('success', 'Status Inventori Berhasil Diupdate!');
    }

    public function delete($id)
    {

        $data = Inventory::find($id);

        if (file_exists(public_path('assets/img/bahan/' . $data->gambar_barang))) {
            unlink(public_path('assets/img/bahan/' . $data->gambar_barang));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function update(Request $request)
    {

        $inventory = Inventory::findOrFail($request->id);

        // $validator = Validator::make($request->all(), [
        //     'name' => ['required', 'string', 'max:255'],
        //     'username' => 'required|unique:users,username,' . $user->id,
        //     'role' => 'required|string',
        //     'password' => ['nullable', 'string', 'min:8'],
        //     'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
        // ]);

        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $data = [
            'nomor_notifikasi' => $request->nomor_notifikasi,
            'kadaluarsa_barang' => $request->kadaluarsa_barang,
            'nama_barang' => $request->nama_barang,
            'satuan_barang' => $request->satuan_barang,
            'status_barang' => $request->kondisi_barang,
            'informasi_barang' => $request->infomasi_barang,
            'id_supplier' => $request->id_supplier
        ];

        if ($request->hasFile('gambar_barang')) {

            if (file_exists(public_path('assets/img/bahan/' . $inventory->gambar_barang))) {
                unlink(public_path('assets/img/bahan/' . $inventory->gambar_barang));
            }

            $imageName = time() . '.' . $request->gambar_barang->extension();
            $request->gambar_barang->move(public_path('assets/img/bahan'), $imageName);
            $data['gambar_barang'] = $imageName;
        }

        $inventory->update($data);

        if ($request->kondisi_barang == "1") {
            return redirect()->back()->with('success', 'Data Bahan Baku Berhasil Diupdate!');
        } else {
            return redirect()->back()->with('success', 'Data Masuk Pada Menu Pengembalian!');
        }
    }

    public function detail($id)
    {

        $request = Request::capture();
        $segments = $request->segments();
        $inventory = Inventory::find($id);

        $data = [
            'title' => 'Detail Inventori - Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'inventory' => $inventory,
            'segments' => $segments,
        ];

        return view('detail_inventori', $data);
    }


    public function delete_inventory_use($id)
    {

        $data_use = InventoryUse::find($id);

        $data_inventory = Inventory::find($data_use->id_inventory);
        // dd($data_use->id_inventory);

        if ($data_use->status == 0) {

            $data_upd = [
                'stok_barang' => $data_inventory->stok_barang + $data_use->stok_berubah
            ];
        } else {
            $data_upd = [
                'stok_barang' => $data_inventory->stok_barang - $data_use->stok_berubah
            ];

            if (file_exists(public_path('assets/img/nota/' . $data_use->nota))) {
                unlink(public_path('assets/img/nota/' . $data_use->nota));
            }
        }

        $data_inventory->update($data_upd);

        $data_use->delete();
        return redirect()->back()->with('success', 'Data Penggunaan Stok Berhasil Dihapus!');
    }

    public function update_kelola_stok(Request $request)
    {

        // dd('ok');

        $imageName = null;
        $harga = 0;
        if ($request->status_edit == 1) {

            $validator = Validator::make($request->all(), [
                'harga' => ['required', 'numeric'],
                'pemasok' => ['required'],
                'nota' => ['required', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
            ]);

            // dd($req->name);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator->errors(), 'errorEdit')
                    ->withInput();
            }

            $imageName = time() . '.' . $request->nota->extension();
            $request->nota->move(public_path('assets/img/nota'), $imageName);
            $harga = $request->harga;
        } else {

            $harga = 0;
        }

        $inventory = Inventory::findOrFail($request->inventory_id);
        $status = $request->status;

        // dd($status);

        $stok_akhir = $inventory->stok_barang;

        if ($status == 1) {

            $stok_akhir = $stok_akhir + $request->stok;
        } else {

            $stok_akhir = $stok_akhir - $request->stok;

            if ($stok_akhir < 0) {

                return redirect()->back()->with(['error' => 'Stok Bahan Baku Melebihi Batas!']);
            }
        }

        $data_inventory_use = [
            'id_inventory' => $request->inventory_id,
            'stok_berubah' => $request->stok,
            'status' => $request->status,
            'tanggal_kelola' => $request->tanggal_kelola,
            'keterangan' => $request->keterangan,
            'id_user' => $request->id_user,
            'stok_sekarang' => $stok_akhir,
            'harga' => $harga,
            'pemasok' => $request->pemasok,
            'nota' => $imageName,

        ];

        // dd($request->tanggal_kelola);

        $data_inventory = [
            'stok_barang' => $stok_akhir,
        ];

        // dd($stok_akhir);

        $inventory->update($data_inventory);

        InventoryUse::create($data_inventory_use);

        return redirect()->back()->with('success', 'Data Stok Berhasil Diupdate!');
    }

    public function kelola_stok(Request $request)
    {

        $imageName = null;
        $harga = 0;
        if ($request->status == 1) {

            $validator = Validator::make($request->all(), [
                'harga' => ['required', 'numeric'],
                'pemasok' => ['required'],
                'nota' => ['required', 'image', 'mimes:jpg,png,jpeg,webp,gif,svg,bmp', 'max:2048'],
            ]);

            // dd($req->name);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $imageName = time() . '.' . $request->nota->extension();
            $request->nota->move(public_path('assets/img/nota'), $imageName);
            $harga = $request->harga;
        } else {

            $harga = 0;
        }

        $inventory = Inventory::findOrFail($request->inventory_id);
        $status = $request->status;

        // dd($status);

        $stok_akhir = $inventory->stok_barang;

        if ($status == 1) {

            $stok_akhir = $stok_akhir + $request->stok;
        } else {

            $stok_akhir = $stok_akhir - $request->stok;

            if ($stok_akhir < 0) {

                return redirect()->back()->with(['error' => 'Stok Bahan Baku Melebihi Batas!']);
            }
        }

        $data_inventory_use = [
            'id_inventory' => $request->inventory_id,
            'stok_berubah' => $request->stok,
            'status' => $request->status,
            'tanggal_kelola' => $request->tanggal_kelola,
            'keterangan' => $request->keterangan,
            'id_user' => $request->id_user,
            'stok_sekarang' => $stok_akhir,
            'harga' => $harga,
            'pemasok' => $request->pemasok,
            'nota' => $imageName,

        ];

        // dd($request->tanggal_kelola);

        $data_inventory = [
            'stok_barang' => $stok_akhir,
        ];

        // dd($stok_akhir);

        $inventory->update($data_inventory);

        InventoryUse::create($data_inventory_use);

        return redirect()->back()->with(['success' => 'Data Stok Berhasil Diupdate!']);
    }

    public function get_detail_penggunaan(Request $request, $id)
    {

        // $details = InventoryUse::get_detail($id);

        // dd($details);

        if ($request->ajax()) {
            $data = InventoryUse::get_detail($id);
            return datatables()->of($data)
                ->addColumn('action', function (InventoryUse $inventory) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="deleteuser btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function cetak_laporan(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;
        $data = Inventory::select(
            'barangs.id as id_barang',
            'barangs.nama_barang as nama_barang',
            'barangs.stok_barang as stok_barang',
            'barang_masuk.harga_satuan as harga_satuan',
            DB::raw('SUM(barang_masuk.jumlah) as masuk'),
            DB::raw('SUM(barang_keluar.jumlah) as keluar')
        )
            ->leftJoin('barang_masuk', 'barang_masuk.id_inventory', '=', 'barangs.id')
            ->leftJoin('barang_keluar', 'barang_keluar.id_inventory', '=', 'barangs.id')
            ->where(function ($query) use ($awal, $akhir) {
                $query->orWhereBetween('barang_masuk.tanggal', [$awal, $akhir])
                    ->orWhereBetween('barang_keluar.tanggal', [$awal, $akhir]);
            })
            ->where('barangs.status_barang', 1)
            ->groupBy('barangs.id', 'barangs.nama_barang', 'barangs.stok_barang', 'barang_masuk.harga_satuan')
            ->get();
        $pdf = PDF::loadview('cetak_laporan', compact('data', 'awal', 'akhir'));
        return $pdf->download('Laporan Barang Stok Barang_' . date('Y-m-d H-i-s') . '.pdf');
    }

    public function laporan()
    {
        //
        $inventori = Inventory::where('status_barang', 1)->get();
        $data = [
            'title' => 'Kelola Inventori - Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'inventori' => $inventori,
        ];

        return view('laporan', $data);
    }
}
