<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class);
    }
}
