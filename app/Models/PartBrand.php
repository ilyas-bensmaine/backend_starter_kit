<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartBrand extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function posts()
    {
        return $this->morphToMany(Post::class , 'postable')->withTimestamps();
    }

    public function interresters()
    {
        return $this->morphToMany(User::class , 'interrestable')->withTimestamps();
    }
}
