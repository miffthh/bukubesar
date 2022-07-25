<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akuns')->insert([
            'kode_akun' => '2222',
            'nama_akun' => 'Bank Mandiri'
        ]);
    }
}
