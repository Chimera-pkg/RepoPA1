<?php

namespace App\Http\Controllers;

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
            'title' => 'Beranda - Aplikasi Pengelolaan RM Alam Mutiara',
        ];

        if (Auth::user()->role == 'gudang') {

            // $data['']
            // dd();

            $data['seluruh_bahan'] = Inventory::count();
            $data['toko'] = 3;
            $data['bahan_akitf'] = Inventory::where('status_bahan', 1)->count();

            // SELECT * FROM `inventory_use` order by created_at DESC;

            $data['penggunaan_terakhir'] = InventoryUse::penggunaan_terakhir();
            // dd($data['penggunaan_terakhir']);



            return view('home', $data);
        } else {

            return redirect()->to('kelola_pengguna');
        }
    }
}
