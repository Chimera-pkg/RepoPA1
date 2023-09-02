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
        DB::table('barangs')->insert(
            [
                [
                    'nomor_notifikasi' => "123",
                    'nama_barang' => 'Alcohol Parfume',
                    'supplier' => 'PT ABCS',
                    'stok_barang' => 20,
                    'satuan_barang' => 'liter',
                    'informasi_barang' => "Lorem ipsum dolor sit amet",
                    'id_supplier' => 1,
                ],
                [
                    'nomor_notifikasi' => "456",
                    'nama_barang' => 'Botol Kaca',
                    'stok_barang' => 50,
                    'satuan_barang' => 'pcs',
                    'informasi_barang' => "Lorem ipsum dolor sit amet",
                    'id_supplier' => 1,
                ],
            ]
        );
    }
}
