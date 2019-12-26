<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('pakets')->insert(
            [
            'nama' => '1 MB',
            'harga' => '100000',
            'created_at' => Carbon::now(),
            ],
            [
            'nama' => '2 MB',
            'harga' => '200000',
            'created_at' => Carbon::now(),
            ],
            [
            'nama' => '3 MB',
            'harga' => '300000',
            'created_at' => Carbon::now(),
            ],
        );

        DB::table('clients')->insert([
            'nama' => 'client1',
            'deskripsi' => 'deskripsi 1',
            'id_paket' => '1',
            'desa' => 'desa 1',
            'kecamatan' => 'kecamatan 1',
            'no_rumah' => '1',
            'masa_aktif' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
