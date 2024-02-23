<?php

namespace App\Models;

use App\Models\Pupuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stoker extends Model
{
    use HasFactory;

    public function pupuks()
    {
        return $this->hasMany(Pupuk::class);
    }
}
