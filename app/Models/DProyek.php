<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DProyek extends Model
{
    use HasFactory;
    protected $table = 'data_proyeks';
    protected $guarded = [];

    public function pproyek()
    {
        return $this->hasMany(pproyek::class, 'kode_proyek', 'kode_proyek');
    }
}
