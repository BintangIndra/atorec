<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'nama_u' => 'susanto',
            'alamat_u' => 'solo baru',
            'email' => 'susanto@tanto.com',
            'password' => Hash::make('keanureeve'),
            'no_hp' => '082233123212',
            'role' => 'admin',
            'aktif' => 1,
        ]);
    }
}
