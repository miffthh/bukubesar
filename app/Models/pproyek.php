<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class pproyek extends Model
{
    // use HasFactory;
    protected $table = "pproyek";
    // protected $primary = "kode_perolehan";
    protected $guarded = [];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun', 'kode_akun');
    }
    public function dproyek()
    {
        return $this->belongsTo(DProyek::class, 'kode_proyek', 'kode_proyek');
    }
}
