<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Supplier;

class PengajuanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inventory',
        'id_user',
        // fitur baru
        'id_supplier',
        'status_pengecekan',
        // ---
        'jumlah_barang',
        'tanggal_pengajuan',
        'status_manajer',
        'status_barang_sampai',

        

    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected $table = 'pengajuan_barangs';

    /**
     * Get the inventory that owns the PengajuanBarang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     public $timestamps = false;

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'id_inventory', 'id');
    }

    /**
     * Get the pengaju that owns the PengajuanBarang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengaju(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }
    
}
