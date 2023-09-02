<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "
            INSERT INTO `barang_keluar` (`id`, `id_inventory`, `id_user`, `jumlah`, `tanggal`, `jam`, `created_at`, `updated_at`) VALUES
            (1, 2, 1, '2', '2023-08-14', '11:50:00', '2023-08-13 21:50:24', '2023-08-13 21:50:24'),
            (2, 1, 1, '2', '2023-08-14', '14:33:00', '2023-08-14 00:33:45', '2023-08-14 00:33:45');
        ";

        DB::connection()->getPdo()->exec($query);
    }
}
