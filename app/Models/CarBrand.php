<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the car_models for the CarBrand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function car_models()
    {
        return $this->hasMany(CarModel::class );
    }
    /**
     * The car_types that belong to the CarBrand
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function car_types()
    {
        return $this->belongsToMany(CarType::class, 'car_brand_car_type');
    }

    public function posts()
    {
        return $this->morphToMany(Post::class , 'postable')->withPivot('postable_id');

    }

    public function interresters()
    {
        return $this->morphToMany(User::class , 'interrestable')->withTimestamps();
    }
}
