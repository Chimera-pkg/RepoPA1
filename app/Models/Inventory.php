<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bahan',
        'gambar_bahan',
        'stok_bahan',
        'satuan_bahan',
        'status_bahan',
    ];

    protected $table = 'inventories';
}