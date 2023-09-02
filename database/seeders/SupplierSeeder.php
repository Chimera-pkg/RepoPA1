<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert(
            [
                [
                    'nama' => "PT. Beauty Girl",
                    'no_telp' => '088790456321',
                    'alamat' => "Jalan Profesor Mohammad Yamin Sh0, Nomor 40,Kota Bandung , Jawa Barat",
                    'status' => 1
                ],
                [
                    'nama' => "PT. Jayla Skin",
                    'no_telp' => '089675423789',
                    'alamat' => "Jl.Merdeka, Jakarta Selatan",
                    'status' => 1,
                ],
                [
                    'nama' => "PT. Jadawdawd",
                    'no_telp' => '089675423789',
                    'alamat' => "Jl.Merdeka, Jakarta Selatan",
                    'status' => 1,
                ],
            ]
        );
    }
}
