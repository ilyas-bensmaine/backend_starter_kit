<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the part_sub_categories for the PartCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function part_sub_categories()
    {
        return $this->hasMany(PartSubCategory::class);
    }


    public function parts()
    {
        return $this->hasManyThrough(Part::class, PartSubCategory::class);
    }

    public function posts()
    {
        return $this->morphToMany(Post::class , 'postable')->withTimestamps();
    }

    public function interresters()
    {
        return $this->morphToMany(User::class , 'interrestable')->withTimestamps();
    }
}
