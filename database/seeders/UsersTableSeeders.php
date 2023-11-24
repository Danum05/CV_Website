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
            'id'=>'1',
            'name'=>'superadmin',
            'email'=>'superadmin@gmail.com',
            'password'=>Hash::make('superadmin123'),
            'role'=>'superadmin',
        ]);

        DB::table('users')->insert([
            'id'=>'2',
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'role'=>'admin',
        ]);
    }
}
