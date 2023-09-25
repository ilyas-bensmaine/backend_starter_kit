<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = [];

    /**
     * Get the part_sub_category that owns the Part
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function part_sub_category()
    {
        return $this->belongsTo(PartSubCategory::class);
    }

    public function part_category()
    {
        return $this->belongsToThrough(PartCategory::class, PartSubCategory::class);
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
