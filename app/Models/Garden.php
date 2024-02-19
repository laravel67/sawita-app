<?php

namespace App\Models;

use App\Models\Jadwal;
use App\Models\Analize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garden extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function analizes()
    {
        return $this->hasMany(Analize::class);
    }
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
