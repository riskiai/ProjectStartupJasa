<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data sebelum menambahkan kembali (Jika Diperlukan)
        // DB::table('users')->truncate();


        // Tambahkan data pengguna dengan peran 'admin'
        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'Riski',
            'email'=> 'riski@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('riski123'), // Hash Untuk menggenerate password menjadi kode unik
        ]);

        DB::table('users')->insert([
            'role' => 'user',
            'name' => 'debi',
            'email'=> 'debi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('debi123'), // Hash Untuk menggenerate password menjadi kode unik
        ]);

    }
}
