
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
        /*DB::table('users')->insert([
            'nama_u' => 'susanto',
            'alamat_u' => 'solo baru',
            'email' => 'susanto@tanto.com',
            'password' => Hash::make('keanureeve'),
            'no_hp' => '082233123212',
            'role' => 'admin',
            'aktif' => 1,
        ]);
        
        DB::table('users')->insert([
            'nama_u' => 'anto',
            'alamat_u' => 'kalimantan tengah',
            'email' => 'anto@gmail.com',
            'password' => Hash::make('7aysd7'),
            'no_hp' => '08978534612',
            'role' => 'reseller',
            'aktif' => 1,
        ]);
        */
        factory(App\trans_reseller::class, 100)->create();
    }
}
