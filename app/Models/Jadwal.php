<?php

namespace App\Models;

use App\Models\Garden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }
}
