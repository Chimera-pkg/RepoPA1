<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryUse;
use DataTables;
use Illuminate\Http\Request;
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

        $data = [
            'title' => 'Kelola Inventori - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        return view('kelola_inventori', $data);
    }

    public function get_all_inventories(Request $request)
    {

        if ($request->ajax()) {
            $data = Inventory::all();
            return datatables()->of($data)
                ->addColumn('action', function (Inventory $inventory) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>
                    <a href="javascript:void(0)" class="deleteuser btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
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

        $imageName = time() . '.' . $req->gambar_bahan->extension();
        $req->gambar_bahan->move(public_path('assets/img/bahan'), $imageName);

        Inventory::create([
            'nama_bahan' => $req->nama_barang,
            'gambar_bahan' => $imageName,
            'stok_bahan' => $req->stok,
            'satuan_bahan' => $req->satuan_bahan,
        ]);

        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update_status($id)
    {

        // dd($id);
        $inventory = Inventory::find($id);

        // $data = [];

        if ($inventory->status_bahan == 1) {

            $data = [
                'status_bahan' => 0,
            ];
        } else {

            $data = [
                'status_bahan' => 1,
            ];
        }

        $inventory->update($data);

        return redirect()->back()->with(['success' => 'Status Inventori Berhasil Diupdate!']);
    }

    public function delete($id)
    {

        $data = Inventory::find($id);

        if (file_exists(public_path('assets/img/bahan/' . $data->gambar_bahan))) {
            unlink(public_path('assets/img/bahan/' . $data->gambar_bahan));
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
            'nama_bahan' => $request->nama_barang,
            'satuan_bahan' => $request->satuan_bahan,
        ];

        if ($request->hasFile('gambar_bahan')) {

            if (file_exists(public_path('assets/img/bahan/' . $inventory->gambar_bahan))) {
                unlink(public_path('assets/img/bahan/' . $inventory->gambar_bahan));
            }

            $imageName = time() . '.' . $request->gambar_bahan->extension();
            $request->gambar_bahan->move(public_path('assets/img/bahan'), $imageName);
            $data['gambar_bahan'] = $imageName;
        }

        $inventory->update($data);

        return redirect()->back()->with(['success' => 'Data Bahan Baku Berhasil Diupdate!']);
    }

    public function detail($id)
    {

        $request = Request::capture();
        $segments = $request->segments();
        $inventory = Inventory::find($id);

        $data = [
            'title' => 'Detail Inventori - Aplikasi Pengelolaan RM Alam Mutiara',
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
                'stok_bahan' => $data_inventory->stok_bahan + $data_use->stok_berubah
            ];
        } else {
            $data_upd = [
                'stok_bahan' => $data_inventory->stok_bahan - $data_use->stok_berubah
            ];

            if (file_exists(public_path('assets/img/nota/' . $data_use->nota))) {
                unlink(public_path('assets/img/nota/' . $data_use->nota));
            }
        }

        $data_inventory->update($data_upd);

        $data_use->delete();
        return redirect()->back()->with(['success' => 'Data Penggunaan Stok Berhasil Dihapus!']);
    }

    public function update_kelola_stok(Request $request)
    {

        // dd('ok');

        $imageName = null;
        $harga = 0;
        if ($request->status_edit == 1) {

            $validator = Validator::make($request->all(), [
                'harga' => ['required', 'numeric'],
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

        $stok_akhir = $inventory->stok_bahan;

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
            'nota' => $imageName,

        ];

        // dd($request->tanggal_kelola);

        $data_inventory = [
            'stok_bahan' => $stok_akhir,
        ];

        // dd($stok_akhir);

        $inventory->update($data_inventory);

        InventoryUse::create($data_inventory_use);

        return redirect()->back()->with(['success' => 'Data Stok Berhasil Diupdate!']);
    }

    public function kelola_stok(Request $request)
    {

        $imageName = null;
        $harga = 0;
        if ($request->status == 1) {

            $validator = Validator::make($request->all(), [
                'harga' => ['required', 'numeric'],
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

        $stok_akhir = $inventory->stok_bahan;

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
            'nota' => $imageName,

        ];

        // dd($request->tanggal_kelola);

        $data_inventory = [
            'stok_bahan' => $stok_akhir,
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
}
