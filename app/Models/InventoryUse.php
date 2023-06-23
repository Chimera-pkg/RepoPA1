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
        'nota',
    ];

    protected $table = 'inventory_use';

    public static function get_detail($inventory_id)
    {

        $details = InventoryUse::join('inventories', 'inventories.id', '=', 'inventory_use.id_inventory')
            ->join('users', 'inventory_use.id_user', '=', 'users.id')
            ->where('inventories.id', $inventory_id)
            ->get(['inventory_use.*', 'users.name', 'users.id as id_user', 'inventories.nama_bahan', 'inventories.id as id_bahan', 'inventories.satuan_bahan']);

        return $details;
    }

    public static function penggunaan_terakhir()
    {

        $details = InventoryUse::join('inventories', 'inventories.id', '=', 'inventory_use.id_inventory')
            ->orderByDesc('created_at')
            // ->limit(5)
            ->get(['inventory_use.status', 'inventory_use.created_at', 'inventory_use.stok_berubah', 'inventories.nama_bahan', 'inventories.id as id_bahan', 'inventories.satuan_bahan', 'inventories.gambar_bahan']);

        return $details;
    }
}
