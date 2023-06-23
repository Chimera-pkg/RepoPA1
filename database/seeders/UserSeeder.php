<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [

                [
                    'name' => 'Gudang 1',
                    'username' => 'gudang_1',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'gudang',

                ],
                [
                    'name' => 'Gudang 2',
                    'username' => 'gudang_2',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'gudang',

                ],
                [
                    'name' => 'Admin 1',
                    'username' => 'admin_1',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'admin',

                ],

            ]
        );
    }
}
