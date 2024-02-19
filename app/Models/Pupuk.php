<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function analizes()
    {
        return $this->hasMany(Analize::class);
    }
    public function guides()
    {
        return $this->hasMany(Guide::class);
    }
}
