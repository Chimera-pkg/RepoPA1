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
                    'name' => 'Fitri',
                    'username' => 'gudang_1',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'gudang',

                ],
                [
                    'name' => 'Anto',
                    'username' => 'gudang_2',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'gudang',

                ],
                [
                    'name' => 'Laras',
                    'username' => 'admin_1',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'admin',

                ],
                [
                    'name' => 'Putri',
                    'username' => 'sales_1',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'sales',
                ],
                [
                    'name' => 'Sales 2',
                    'username' => 'sales_2',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'sales',
                ],
                [
                    'name' => 'Haja',
                    'username' => 'manager_1',
                    'password' => Hash::make('asdasdasd'),
                    'role' => 'manager',
                ],
            ]
        );
    }
}
