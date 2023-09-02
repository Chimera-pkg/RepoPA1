<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inventory',
        'id_user',
        'id_user',
        'jumlah',
        'harga_satuan',
        'tanggal',
        'jam',
    ];

    protected $table = 'penerimaan';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function penerimaan()
    {
        return $this->belongsTo(Inventory::class, 'id_inventory', 'id');
    }
}
