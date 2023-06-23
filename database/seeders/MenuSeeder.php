<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('menus')->insert(
            [
                [
                    'nama_menu' => 'Ayam Kampung',
                    'harga' => 19000,
                    'gambar' => 'https://i.pravatar.cc/80?img=1',
                    'jenis' => "Makanan",
                ],
                [
                    'nama_menu' => 'Nasgor Manis',
                    'harga' => 25000,
                    'gambar' => 'https://i.pravatar.cc/80?img=2',
                    'jenis' => "Makanan",
                ],
                [
                    'nama_menu' => 'Jus Jeruk',
                    'harga' => 10000,
                    'gambar' => 'https://i.pravatar.cc/80?img=3',
                    'jenis' => "Minuman",
                ],
            ]
        );
    }
}