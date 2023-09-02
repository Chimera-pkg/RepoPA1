<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Pesan;
use Illuminate\Http\Request;

class KelolaStokController extends Controller
{

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
        //
        $jumlah = Inventory::where('stok_barang', '<', 20)->count();
        $pesan = Pesan::where('status', 1)->count();
        $data = [
            'title' => 'Kelola Stok- Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'jumlah' =>  $jumlah,
            'pesan' =>  $pesan,
        ];

        return view('kelola_stok', $data);
    }

    public function stok_kurang_20()
    {
        //
        $jumlah = Inventory::where('stok_barang', '<', 20)->count();
        $pesan = Pesan::where('status', 1)->count();
        $data = [
            'title' => 'Kelola Stok- Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'jumlah' =>  $jumlah,
            'pesan' =>  $pesan,
        ];

        return view('kelola_stok', $data);
    }

    public function get_all_stok(Request $request)
    {
        if ($request->ajax()) {
            $data = Inventory::where('status_barang', 1)->get();
            return datatables()->of($data)
                ->addColumn('action', function (Inventory $inventory) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function get_all_stok_kurang_20(Request $request)
    {
        if ($request->ajax()) {
            $data = Inventory::where('stok_barang', '<', 20)->where('status_barang', 1)->get();
            return datatables()->of($data)
                ->addColumn('action', function (Inventory $inventory) {
                    $actionBtn = '<a href="javascript:void(0)" class="m-1 edit btn btn-success btn-sm">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $inventory = Inventory::find($request->id);

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
            'stok_barang' => $inventory->stok_barang + $request->tambah_stok - $request->kurang_stok,
        ];

        $inventory->update($data);
        return redirect()->back()->with(['success' => 'Stok Bahan Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
