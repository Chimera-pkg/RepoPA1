<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_telp',
        'alamat',
        'status'
    ];

    protected $table = 'supplier';

    public function barang()
    {
        return $this->hasMany(Inventory::class);
    }
}
