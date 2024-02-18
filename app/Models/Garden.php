<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function analizes()
    {
        return $this->hasMany(Analize::class);
    }
}
