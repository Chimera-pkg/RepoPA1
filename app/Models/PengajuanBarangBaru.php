<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// fitur baru
use App\Models\InventoryUse;
use App\Models\Supplier;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PengajuanBarangBaru extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_supplier',
        'id_user',
        'nama_barang',
        'jumlah_barang',
        'informasi_barang',
        'tanggal_pengajuan',
        'status_manajer',
        'status_barang_sampai',
        'status_pengecekan',
    ];

    protected $casts = [
        'id' => 'string',
    ];
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

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'id_inventory', 'id');
    }

}
