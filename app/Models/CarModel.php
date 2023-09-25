<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the car_brand that owns the CarModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car_brand()
    {
        return $this->belongsTo(CarBrand::class);
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
