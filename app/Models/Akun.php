<?php

namespace App\Models;

use App\Models\Bks;
use App\Models\Bbbadm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akuns';
    protected $guarded = [];

    public function pproyeks()
    {
        return $this->hasMany(pproyek::class, 'kode_akun', 'kode_akun');
    }

    public function bmarketing()
    {
        return $this->hasMany(bmarketing::class, 'kode_akun', 'kode_akun');
    }

    public function bks()
    {
        return $this->hasMany(Bks::class, 'kode_akun', 'kode_akun');
    }

    public function bbbadm()
    {
        return $this->hasMany(Bbbadm::class, 'kode_akun', 'kode_akun');
    }
}
