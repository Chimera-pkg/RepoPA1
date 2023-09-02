<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_notifikasi',
        'nama_barang',
        'gambar_barang',
        'stok_barang',
        'kadaluarsa_barang',
        'satuan_barang',
        'status_barang',
        'informasi_barang',
        'id_supplier',
    ];

    protected $table = 'barangs';

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }

    public function barang_masuk()
    {
        return $this->hasMany(Barang_Masuk::class);
    }

    public function barang_keluar()
    {
        return $this->hasMany(Barang_Keluar::class);
    }
}
