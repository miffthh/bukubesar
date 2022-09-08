<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bbbadm extends Model
{
    use HasFactory;
    protected $table = "bbbadm";
    // // protected $primary = "kode_perolehan";
    protected $guarded = [];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun', 'kode_akun');
    }
}
