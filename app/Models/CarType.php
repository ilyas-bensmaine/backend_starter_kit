<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $translatable = ['name' , 'description'];

    public function name(): Attribute
    {
        // app()->setLocale('dz');
        $locale = app()->getLocale();
        return new Attribute(
            get: fn ($value) => json_decode($value)->$locale,
            set: fn ($value) => $value,
        );
    }

    /**
     * The car_brands that belong to the CarType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function car_brands()
    {
        return $this->belongsToMany(CarBrand::class ,  'car_brand_car_type');
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
