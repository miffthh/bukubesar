<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_proyeks')->insert([
            'kode_proyek' => '9999',
            'nama_proyek' => 'Amanah',
        ]);
    }
}
