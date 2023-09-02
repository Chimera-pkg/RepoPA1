<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_inventory',
        'pesan',
        'status'
    ];

    protected $table = 'pesan';

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
