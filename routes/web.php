<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::redirect('/', '/login');

Route::get('/login', function () {

    $data = [
        'title' => 'Login - Aplikasi Stok Annisa Kosmetik',
    ];

    return view('auth.login', $data);
});


Route::get('laporan', [App\Http\Controllers\InventoryController::class, 'laporan'])->name('laporan');
Route::post('cetak_laporan', [App\Http\Controllers\InventoryController::class, 'cetak_laporan'])->name('cetak_laporan');
// Auth::routes();

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('kelola_pengguna')->group(function () {
    Route::get('/', [App\Http\Controllers\KelolaPenggunaController::class, 'index'])->name('kelola_pengguna');
    Route::get('users', [App\Http\Controllers\KelolaPenggunaController::class, 'get_all_users'])->name('kelola_pengguna.users');
    Route::get('delete/{id}', [App\Http\Controllers\KelolaPenggunaController::class, 'destroy'])->name('kelola_pengguna.delete');
    Route::post('store', [App\Http\Controllers\KelolaPenggunaController::class, 'store'])->name('kelola_pengguna.store');
    Route::post('update', [App\Http\Controllers\KelolaPenggunaController::class, 'update'])->name('kelola_pengguna.update');
    Route::get('update_status/{id}', [App\Http\Controllers\KelolaPenggunaController::class, 'update_status'])->name('kelola_pengguna.update_status');
});

Route::prefix('profile')->group(function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('hapus_akun', [App\Http\Controllers\ProfileController::class, 'hapus_akun'])->name('profile.hapus_akun');
    Route::get('update_password', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('profile.update_password');
    Route::post('edit_pw', [App\Http\Controllers\ProfileController::class, 'edit_pw'])->name('profile.edit_pw');
});




Route::prefix('inventori')->group(function () {
    Route::get('/', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventori');
    Route::get('get_all_inventories', [App\Http\Controllers\InventoryController::class, 'get_all_inventories'])->name('inventori.get_all_inventories');
    Route::get('update_status/{id}', [App\Http\Controllers\InventoryController::class, 'update_status'])->name('inventori.update_status');
    Route::delete('delete/{id}', [App\Http\Controllers\InventoryController::class, 'delete'])->name('inventori.delete');
    Route::post('store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventori.store');
    Route::post('update', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventori.update');
    Route::get('create', [App\Http\Controllers\InventoryController::class, 'create'])->name('inventori.create');
    Route::get('edit/{id}', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventori.edit');



    Route::get('detail/{id}', [App\Http\Controllers\InventoryController::class, 'detail'])->name('inventori.detail');

    Route::get('delete_inventory_use/{id}', [App\Http\Controllers\InventoryController::class, 'delete_inventory_use'])->name('inventori.delete_inventory_use');

    Route::post('update_kelola_stok', [App\Http\Controllers\InventoryController::class, 'update_kelola_stok'])->name('inventori.update_kelola_stok');

    Route::post('kelola_stok', [App\Http\Controllers\InventoryController::class, 'kelola_stok'])->name('inventori.kelola_stok');
    Route::get('get_detail_penggunaan/{id}', [App\Http\Controllers\InventoryController::class, 'get_detail_penggunaan'])->name('inventori.get_detail_penggunaan');
});

// fitur baru
Route::prefix('penerimaan')->group(function () {
    Route::get('/', [App\Http\Controllers\PenerimaanController::class, 'index'])->name('penerimaan');
    Route::get('get_all_inventories', [App\Http\Controllers\PenerimaanController::class, 'get_all_inventories'])->name('penerimaan.get_all_inventories');
    Route::get('update_status/{id}', [App\Http\Controllers\PenerimaanController::class, 'update_status'])->name('inventori.update_status');
    Route::delete('delete/{id}', [App\Http\Controllers\InventoryController::class, 'delete'])->name('inventori.delete');
    Route::post('store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventori.store');
    Route::post('update', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventori.update');
    Route::get('create', [App\Http\Controllers\PenerimaanController::class, 'create'])->name('penerimaan.create');
    Route::get('edit/{id}', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventori.edit');



    Route::get('detail/{id}', [App\Http\Controllers\InventoryController::class, 'detail'])->name('inventori.detail');

    Route::get('delete_inventory_use/{id}', [App\Http\Controllers\InventoryController::class, 'delete_inventory_use'])->name('inventori.delete_inventory_use');

    Route::post('update_kelola_stok', [App\Http\Controllers\InventoryController::class, 'update_kelola_stok'])->name('inventori.update_kelola_stok');

    Route::post('kelola_stok', [App\Http\Controllers\InventoryController::class, 'kelola_stok'])->name('inventori.kelola_stok');
    Route::get('get_detail_penggunaan/{id}', [App\Http\Controllers\InventoryController::class, 'get_detail_penggunaan'])->name('inventori.get_detail_penggunaan');
});

Route::prefix('pengembalian')->group(function () {
    Route::get('/', [App\Http\Controllers\PengembalianController::class, 'index'])->name('pengembalian');
    Route::get('get_all_pengembalian', [App\Http\Controllers\PengembalianController::class, 'get_all_pengembalian'])->name('pengembalian.get_all_pengembalian');
});

Route::prefix('pengajuan')->group(function () {
    Route::get('/', [App\Http\Controllers\PengajuanBarangController::class, 'index'])->name('pengajuan.index');
    Route::get('/get-all-data', [App\Http\Controllers\PengajuanBarangController::class, 'getData'])->name('pengajuan.index.data');
    Route::prefix('baru')->group(function () {
        Route::get('/', [App\Http\Controllers\PengajuanBarangBaruController::class, 'index'])->name('pengajuan.baru.index');
        Route::get('/get-all-data', [App\Http\Controllers\PengajuanBarangBaruController::class, 'getData'])->name('pengajuan.baru.index.data');
    });
    Route::post('/', [App\Http\Controllers\PengajuanBarangController::class, 'store'])->name('pengajuan.store');
    Route::prefix('gudang')->group(function () {
        Route::get('/', [App\Http\Controllers\PengajuanBarangController::class, 'index'])->name('pengajuan.gudang.index');
        Route::get('/get-all-data', [App\Http\Controllers\PengajuanBarangController::class, 'getData'])->name('pengajuan.gudang.index.data');
        Route::prefix('baru')->group(function () {
            Route::get('/', [App\Http\Controllers\PengajuanBarangBaruController::class, 'index'])->name('pengajuan.gudang.baru.index');
            Route::post('/', [App\Http\Controllers\PengajuanBarangBaruController::class, 'store'])->name('pengajuan.gudang.baru.store');
            Route::get('/get-all-data', [App\Http\Controllers\PengajuanBarangBaruController::class, 'getData'])->name('pengajuan.gudang.baru.index.data');
            Route::put('/update-status/{pengajuanBarangBaru}', [App\Http\Controllers\PengajuanBarangBaruController::class, 'update'])->name('pengajuan.baru.update.status.pengajuan');
            Route::put('/update-status-sampai/{pengajuanBarangBaru}', [App\Http\Controllers\PengajuanBarangBaruController::class, 'updateStatusSampai'])->name('pengajuan.baru.update.status.sampai');
        });
    });
    Route::put('/update-status/{pengajuanBarang}', [App\Http\Controllers\PengajuanBarangController::class, 'update'])->name('pengajuan.update.status.pengajuan');
    Route::put('/update-status-sampai/{pengajuanBarang}', [App\Http\Controllers\PengajuanBarangController::class, 'updateStatusSampai'])->name('pengajuan.update.status.sampai');
});

Route::prefix('kelola_stok')->group(function () {
    Route::get('/', [App\Http\Controllers\KelolaStokController::class, 'index'])->name('kelola_stok');
    Route::get('get_all_stok', [App\Http\Controllers\KelolaStokController::class, 'get_all_stok'])->name('kelola_stok.get_all_stok');
    Route::get('get_all_stok_kurang_20', [App\Http\Controllers\KelolaStokController::class, 'get_all_stok_kurang_20'])->name('kelola_stok.get_all_stok_kurang_20');
    Route::post('update', [App\Http\Controllers\KelolaStokController::class, 'update'])->name('kelola_stok.update');
    Route::get('stok_kurang_20', [App\Http\Controllers\KelolaStokController::class, 'stok_kurang_20'])->name('kelola_stok.stok_kurang_20');
});

Route::prefix('pesan')->group(function () {
    Route::get('/', [App\Http\Controllers\PesanController::class, 'index'])->name('pesan');
    Route::get('get_all_pesan', [App\Http\Controllers\PesanController::class, 'get_all_pesan'])->name('pesan.get_all_pesan');
    Route::post('store', [App\Http\Controllers\PesanController::class, 'store'])->name('pesan.store');
    Route::get('edit/{id}', [App\Http\Controllers\PesanController::class, 'edit'])->name('pesan.edit');
    Route::get('show/{id}', [App\Http\Controllers\PesanController::class, 'show'])->name('pesan.show');
    Route::post('update', [App\Http\Controllers\PesanController::class, 'update'])->name('pesan.update');
});

Route::prefix('supplier')->group(function () {
    Route::get('/', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier');
    Route::get('create', [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
    Route::get('edit/{id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
    Route::get('show/{id}', [App\Http\Controllers\SupplierController::class, 'show'])->name('supplier.show');
    Route::delete('destroy/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::post('store', [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
    Route::put('update/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
});


Route::prefix('barang_masuk')->group(function () {
    Route::get('/', [App\Http\Controllers\BarangMasukController::class, 'index'])->name('barang_masuk');
    Route::get('create', [App\Http\Controllers\BarangMasukController::class, 'create'])->name('barang_masuk.create');
    Route::get('edit/{id}', [App\Http\Controllers\BarangMasukController::class, 'edit'])->name('barang_masuk.edit');
    Route::get('show/{id}', [App\Http\Controllers\BarangMasukController::class, 'show'])->name('barang_masuk.show');
    Route::delete('destroy/{id}', [App\Http\Controllers\BarangMasukController::class, 'destroy'])->name('barang_masuk.destroy');
    Route::post('store', [App\Http\Controllers\BarangMasukController::class, 'store'])->name('barang_masuk.store');
    Route::post('filter_produk', [App\Http\Controllers\BarangMasukController::class, 'filter_produk'])->name('barang_masuk.filter_produk');
    Route::put('update/{id}', [App\Http\Controllers\BarangMasukController::class, 'update'])->name('barang_masuk.update');
});



Route::prefix('barang_keluar')->group(function () {
    Route::get('/', [App\Http\Controllers\BarangKeluarController::class, 'index'])->name('barang_keluar');
    Route::get('create', [App\Http\Controllers\BarangKeluarController::class, 'create'])->name('barang_keluar.create');
    Route::get('edit/{id}', [App\Http\Controllers\BarangKeluarController::class, 'edit'])->name('barang_keluar.edit');
    Route::get('show/{id}', [App\Http\Controllers\BarangKeluarController::class, 'show'])->name('barang_keluar.show');
    Route::delete('destroy/{id}', [App\Http\Controllers\BarangKeluarController::class, 'destroy'])->name('barang_keluar.destroy');
    Route::post('store', [App\Http\Controllers\BarangKeluarController::class, 'store'])->name('barang_keluar.store');
    Route::post('filter_produk', [App\Http\Controllers\BarangKeluarController::class, 'filter_produk'])->name('barang_keluar.filter_produk');
    Route::put('update/{id}', [App\Http\Controllers\BarangKeluarController::class, 'update'])->name('barang_keluar.update');
});
