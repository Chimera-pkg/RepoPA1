<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "
        INSERT INTO `barang_masuk` (`id`, `id_inventory`, `id_user`, `jumlah`, `harga_satuan`, `tanggal`, `jam`, `created_at`, `updated_at`) VALUES
        (1, 1, 1, '20', '189000', '2024-05-15', '10:19:00', '2023-08-13 20:19:38', '2023-08-13 20:19:38'),
        (2, 2, 1, '10', '189000', '2023-08-14', '14:28:00', '2023-08-14 00:28:36', '2023-08-14 00:28:36');
        ";

        DB::connection()->getPdo()->exec($query);
    }
}
