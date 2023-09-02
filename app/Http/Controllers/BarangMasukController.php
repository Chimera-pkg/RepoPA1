<?php

namespace App\Http\Controllers;

use App\Models\Barang_Masuk;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang_masuk = Barang_Masuk::orderBy('created_at', 'desc')->get();
        $data = [
            'title' => 'Kelola Barang Masuk - Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'barang_masuk' => $barang_masuk
        ];

        return view('barang_masuk', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventori = Inventory::orderBy('created_at', 'desc')->get();
        return view('offcanvas.add_new_barang_masuk', [
            'title' => 'Data Barang masuk',
            'inventori' => $inventori
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
        $barang = Inventory::find($request->id_inventory);
        $barang->stok_barang = $barang->stok_barang + $request->jumlah;
        $barang->update();

        $data = Barang_Masuk::create([
            'id_inventory' => $request->id_inventory,
            'id_user' => Auth::user()->id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventori = Inventory::orderBy('created_at', 'desc')->get();
        $data = Barang_Masuk::find($id);
        return view('offcanvas.edit_barang_masuk', [
            'title' => 'Data Barang Masuk',
            'inventori' => $inventori,
            'data' => $data
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Barang_Masuk::find($id);
        $barang = Inventory::find($data->id_inventory);
        $barang->stok_barang = ($barang->stok_barang - $data->jumlah) +  $request->jumlah;
        $barang->update();

        Barang_Masuk::where('id', $id)->update([
            'id_inventory' => $request->id_inventory,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang_Masuk::find($id);
        $barang = Inventory::find($data->id_inventory);
        $barang->stok_barang = $barang->stok_barang - $data->jumlah;
        $barang->update();
        $data->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }


    public function filter_produk(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $query = Barang_Masuk::select('*');


        if ($bulan) {
            $query->whereMonth('tanggal', $bulan);
        }

        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        $barang_masuk = $query->orderBy('created_at', 'DESC')
            ->get();

        $data = [
            'title' => 'Kelola Barang Masuk - Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'barang_masuk' => $barang_masuk
        ];

        return view('barang_masuk', $data);
    }
}
