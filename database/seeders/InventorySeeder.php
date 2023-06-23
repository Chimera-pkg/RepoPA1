<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert(
            [
                [
                    'nama_bahan' => 'Alcohol Parfume',
                    'stok_bahan' => 20,
                    'satuan_bahan' => 'liter',
                ],
                [
                    'nama_bahan' => 'Botol Kaca',
                    'stok_bahan' => 50,
                    'satuan_bahan' => 'pcs',
                ],
            ]
        );
    }
}
