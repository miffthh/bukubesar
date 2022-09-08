<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    protected $table = "akun";
    protected $primaryKey = "kode_akun";
    protected $fillable = ['kode_akun','nama_akun'];

    public function pproyek()
    {
        return $this->hasMany(pproyek::class);
    }
}