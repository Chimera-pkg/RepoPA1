<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use App\Models\Barang_Masuk;
use App\Models\Inventory;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
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

        $pesan = Pesan::get();
        foreach ($pesan as $data_pesan) {
            $data_pesan2 = Pesan::findOrFail($data_pesan->id);
            $data_pesan2->status = 2;
            $data_pesan2->update();
        }
        $data = [
            'title' => 'Pesan - Aplikasi Pengelolaan Stok Annisa Kosmetik',
        ];

        return view('pesan', $data);
    }

    public function pesan()
    {
        //

        Pesan::update(['status' => '2']);
        $data = [
            'title' => 'Pesan - Aplikasi Pengelolaan Stok Annisa Kosmetik',
        ];

        return view('pesan', $data);
    }

    public function get_all_pesan(Request $request)
    {

        if ($request->ajax()) {
            $data = Pesan::join('inventories', 'pesan.id_inventory', '=', 'inventories.id')->select('pesan.*', 'inventories.nama_barang')->orderBy('created_at', 'desc')->get();
            return datatables()->of($data)
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pesan::create([
            'id_inventory' => $request->id,
            'pesan' => $request->pesan,
        ]);
        return redirect()->back()->with('success', 'Pesan Berhasil Dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang_Keluar::find($id);

        return view('offcanvas.add_pesan', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang_Masuk::find($id);
        return view('offcanvas.add_pesan', ['data' => $data]);
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
        //
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
