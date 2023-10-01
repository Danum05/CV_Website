<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123')
        ]);
        DB::table('users')->insert([
            'name' => 'danu',
            'email' => 'danu@gmail.com',
            'password' => Hash::make('danu122'),
        ]);
        DB::table('users')->insert([
            'name' => 'rahma',
            'email' => 'rahma@gmail.com',
            'password' => Hash::make('rahma123'),
        ]);
        DB::table('users')->insert([
            'name' => 'reihan',
            'email' => 'reihan@gmail.com',
            'password' => Hash::make('reihan123'),
        ]);
        DB::table('users')->insert([
            'name' => 'yasmin',
            'email' => 'yasmin@gmail.com',
            'password' => Hash::make('yasmin123'),
        ]);
    }
}
