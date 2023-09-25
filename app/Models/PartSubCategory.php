<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartSubCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the part_category that owns the PartSubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function part_category()
    {
        return $this->belongsTo(PartCategory::class);
    }

    /**
     * Get all of the parts for the PartSubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parts()
    {
        return $this->hasMany(Part::class);
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
