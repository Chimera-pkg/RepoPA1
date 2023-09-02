<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajuan_barangs')->insert(
            [
                [
                    'id_inventory' => 1,
                    'id_user' => 1,
                    'id_supplier' => 1,
                    'jumlah_barang' => 20,
                    'tanggal_pengajuan' => now(),
                ],
            ]
        );
    }
}
