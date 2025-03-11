<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'name' => 'Deleandro Schaeffer Ribeiro',
                'username' => 'ssistemas',
                'email' => 'deleandro@hotmail.com.br',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('1400')
            ],
            [
                'name' => 'Vendedor',
                'username' => 'vendor',
                'email' => 'vendedor@hotmail.com.br',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('1400')
            ],
            [
                'name' => 'Cliente user',
                'username' => 'user',
                'email' => 'cliente@hotmail.com.br',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('1400')
            ]
        ]);
    }
}
