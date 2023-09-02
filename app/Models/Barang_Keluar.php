<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_Keluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inventory',
        'id_user',
        'jumlah',
        'tanggal',
        'jam',
    ];

    protected $table = 'barang_keluar';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Inventory::class, 'id_inventory', 'id');
    }
}
