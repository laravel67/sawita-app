<?php

namespace App\Models;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garden extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function analisis()
    {
        return $this->hasMany(Analisi::class);
    }
}
