<?php

namespace App\Models;




use App\Models\Akun;
use App\Models\DProyek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bks extends Model
{
    use HasFactory;
    protected $table = "bks";
    // // protected $primary = "kode_perolehan";
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
