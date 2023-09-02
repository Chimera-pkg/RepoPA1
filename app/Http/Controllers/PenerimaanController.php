<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use App\Http\Requests\StorePenerimaanRequest;
use App\Http\Requests\UpdatePenerimaanRequest;

class PenerimaanController extends Controller
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
        $penerimaan = Penerimaan::orderBy('created_at', 'desc')->get();
        $data = [
            'title' => 'Kelola Barang Masuk - Aplikasi Pengelolaan Stok Annisa Kosmetik',
            'penerimaan' => $penerimaan
        ];

        return view('penerimaan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerimaan = Penerimaan::orderBy('created_at', 'desc')->get();
        return view('offcanvas.add_new_penerimaan', [
            'title' => 'Data Barang masuk',
            'penerimaan' => $penerimaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenerimaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Inventory::find($request->id_inventory);
        $barang->stok_barang = $barang->stok_barang + $request->jumlah;
        $barang->update();

        $data = penerimaan::create([
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
     * @param  \App\Models\Penerimaan  $penerimaan
     * @return \Illuminate\Http\Response
     */
    public function show(Penerimaan $penerimaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penerimaan  $penerimaan
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
     * @param  \App\Http\Requests\UpdatePenerimaanRequest  $request
     * @param  \App\Models\Penerimaan  $penerimaan
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
     * @param  \App\Models\Penerimaan  $penerimaan
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
}
