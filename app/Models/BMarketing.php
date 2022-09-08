<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMarketing extends Model
{
    // use HasFactory;
    protected $table = "bmarketings";
    protected $guarded = [];

    public function akun()
    {
        return $this->hasMany(Akun::class, 'kode_akun', 'kode_akun');
    }
}
