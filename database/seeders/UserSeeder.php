<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
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
        
            User::create ([              
            'nidn' => '32123',
            'name' => 'Admin Aplikasi',
            'jenis_kelamin' => 'Laki-Laki',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('admin123'),
            'role' => 'admin',            
            'remember_token' => Str::random(60),
            ]);
    }
}
