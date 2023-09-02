<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_Masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inventory',
        'id_user',
        'jumlah',
        'harga_satuan',
        'tanggal',
        'jam',
    ];

    protected $table = 'barang_masuk';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Inventory::class, 'id_inventory', 'id');
    }
}
