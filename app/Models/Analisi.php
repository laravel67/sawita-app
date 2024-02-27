<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }


    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class);
    }
}
