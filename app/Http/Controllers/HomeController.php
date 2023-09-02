<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use App\Models\Barang_Masuk;
use App\Models\Inventory;
use App\Models\InventoryUse;
use App\Models\Menu;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = [
            'title' => 'Beranda - Aplikasi Pengelolaan Stok Annisa Kosmetik',
        ];

        if (Auth::user()->role != 'sales') {

            // $data['']
            // dd();

            $total_harga = 0;
            $barang_masuk = Barang_Masuk::get();

            foreach ($barang_masuk as $barang_masuk) {
                $total_harga += $barang_masuk->harga_satuan * $barang_masuk->jumlah;
            }

            $data['total_pembelian'] = $total_harga;

            $data['total_barang_masuk'] = Barang_Masuk::sum('jumlah');
            $data['total_barang_keluar'] = Barang_Keluar::sum('jumlah');

            $data['transaksi_barang_masuk'] = Barang_Masuk::count();
            $data['transaksi_barang_keluar'] = Barang_Keluar::count();

            $data['barang_masuk'] = Barang_Masuk::join('barangs', 'barang_masuk.id_inventory', '=', 'barangs.id')
                ->selectRaw('COUNT(*) as jumlah, barangs.nama_barang as nama_barang, barangs.id as kode_inventori')
                ->groupBy('nama_barang', 'kode_inventori')
                ->get();

            $data['barang_keluar'] = Barang_Keluar::join('barangs', 'barang_keluar.id_inventory', '=', 'barangs.id')
                ->selectRaw('COUNT(*) as jumlah, barangs.nama_barang as nama_barang, barangs.id as kode_inventori')
                ->groupBy('nama_barang', 'kode_inventori')
                ->get();

            $data['data_barang_masuk'] = Barang_Masuk::selectRaw('SUM(jumlah) as jumlah, MONTH(barang_masuk.tanggal) as bulan')
                ->whereYear('barang_masuk.tanggal', date('Y'))
                ->groupBy('bulan')
                ->orderBy('barang_masuk.tanggal', 'asc');

            $data['data_barang_keluar'] = Barang_Keluar::selectRaw('SUM(jumlah) as jumlah, MONTH(barang_keluar.tanggal) as bulan')
                ->whereYear('barang_keluar.tanggal', date('Y'))
                ->groupBy('bulan')
                ->orderBy('barang_keluar.tanggal', 'asc');

            $data['seluruh_bahan'] = Inventory::count();
            $data['toko'] = 3;
            $data['bahan_akitf'] = Inventory::where('status_barang', 1)->count();

            // SELECT * FROM `inventory_use` order by created_at DESC;

            $data['penggunaan_terakhir'] = InventoryUse::penggunaan_terakhir();
            // dd($data['penggunaan_terakhir']);



            return view('home', $data);
        } else {

            return redirect()->to('barang_masuk');
        }
    }
}
