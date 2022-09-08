<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dproyek extends Model
{
    protected $table = "dproyek";
    protected $primaryKey = "kode_proyek";
    protected $fillable = [
        'kode_proyek','nama_proyek'];

    public function pproyek()
    {
        return $this->hasMany(pproyek::class);
    }
}