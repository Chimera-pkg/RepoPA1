<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inventory',
        'stok_berubah',
        'status',
        'keterangan',
        'id_user',
        'stok_sekarang',
        'tanggal_kelola',
        'harga',
        'pemasok',
        'nota',
    ];

    protected $table = 'barang_kelola';

    public static function get_detail($inventory_id)
    {

        $details = InventoryUse::join('barangs', 'barangs.id', '=', 'barang.id_inventory')
            ->join('users', 'barang.id_user', '=', 'users.id')
            ->where('barangs.id', $inventory_id)
            ->get(['barang.*', 'users.name', 'users.id as id_user', 'barangs.nama_barang', 'barangs.id as id_bahan', 'barangs.satuan_barang']);

        return $details;
    }

    public static function penggunaan_terakhir()
    {

        $details = InventoryUse::join('barangs', 'barangs.id', '=', 'barang_kelola.id_inventory')
            ->orderByDesc('created_at')
            // ->limit(5)
            ->get(['barang_kelola.status', 'barang_kelola.created_at', 'barang_kelola.stok_berubah', 'barangs.nama_barang', 'barangs.id as id_bahan', 'barangs.satuan_barang', 'barangs.gambar_barang']);

        return $details;
    }
}
