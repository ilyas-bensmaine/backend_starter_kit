<?php

namespace App\Models;

use App\Models\Cities\Wilaya;
use App\Notifications\NewPostNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = [];

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the wilaya that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }
    /**
     * Get the post_type that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post_type()
    {
        return $this->belongsTo(PostType::class);
    }
    /**
     * Get the post_status that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post_status()
    {
        return $this->belongsTo(PostStatus::class);
    }
    /**
     * Get all of the post_responses for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post_responses()
    {
        return $this->hasMany(PostResponse::class);
    }
    /**
     * The viewers that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function viewers()
    {
        return $this->belongsToMany(User::class, 'post_views', 'post_id', 'user_id')->withTimestamps();
    }
    /**
     * The viewers that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function savers()
    {
        return $this->belongsToMany(User::class, 'post_views', 'post_id', 'user_id')->wherePivot('saved', true);
    }
    public function responders()
    {
        return $this->belongsToMany(User::class, 'post_responses', 'post_id', 'user_id');
    }

    //poly morphisme

    public function reporters()
    {
        return $this->morphToMany(Report::class , 'reportable')->withTimestamps();
    }

    public function part_categories()
    {
        return $this->morphedByMany(PartCategory::class, 'postable');
    }

    public function part_sub_categories()
    {
        return $this->morphedByMany(PartSubCategory::class, 'postable');
    }

    public function parts()
    {
        return $this->morphedByMany(Part::class, 'postable');
    }

    public function car_brands()
    {
        return $this->morphedByMany(CarBrand::class, 'postable');
    }

    public function car_types()
    {
        return $this->morphedByMany(CarType::class, 'postable');
    }

    public function car_models()
    {
        return $this->morphedByMany(CarModel::class, 'postable');
    }

    public function part_brands()
    {
        return $this->morphedByMany(PartBrand::class, 'postable');
    }

    //SCOPES
    public function scopePartCategories(Builder $query, $part_categories): Builder
    {
        $categories = json_decode($part_categories);
        return $query->whereHas('part_categories', function (Builder $query) use ($categories) {
            $query->whereIn('part_categories.id', $categories);
        });
    }
    public function scopePartSubCategories(Builder $query, $part_sub_categories): Builder
    {
        $categories = json_decode($part_sub_categories);
        return $query->whereHas('part_sub_categories', function (Builder $query) use ($categories) {
            $query->whereIn('part_sub_categories.id', $categories);
        });
    }
    public function scopeParts(Builder $query, $parts): Builder
    {
        $categories = json_decode($parts);
        return $query->whereHas('parts', function (Builder $query) use ($categories) {
            $query->whereIn('parts.id', $categories);
        });
    }
    public function scopeCarTypes(Builder $query, $car_types): Builder
    {
        $categories = json_decode($car_types);
        return $query->whereHas('car_types', function (Builder $query) use ($categories) {
            $query->whereIn('car_types.id', $categories);
        });
    }
    public function scopeCarBrands(Builder $query, $car_brands): Builder
    {
        $categories = json_decode($car_brands);
        return $query->whereHas('car_brands', function (Builder $query) use ($categories) {
            $query->whereIn('car_brands.id', $categories);
        });
    }

    public function scopeCarModels(Builder $query, $car_model): Builder
    {
        $categories = json_decode($car_model);
        return $query->whereHas('car_model', function (Builder $query) use ($categories) {
            $query->whereIn('car_model.id', $categories);
        });
    }

    public function scopePriceBetween(Builder $query, $price_between): Builder
    {
        $price = json_decode($price_between);
        return $query->whereBetween('price', $price);
    }

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('post_status_id', '=', '1');
    }

    /**
     * notify all the users who might be interrested in this post
     * @return void
     */
    public function get_interresters()
    {
        /**
         * les vendeur des pieces des voitures sont généralement specialisés dans quelque
         * categorie
         * alors que ceux des autres types englobe toutes les cat des piece
         * donc si le type  de la piece demandé s'agit d'une voitue on notifie selon la categorie
         * sinon on notifie tous les vendeur qui sont interessés par le type et le continent
         */
        $ids = array();
        $poster = $this->user;
        $car_models = $this->car_models;
        $car_brands = $this->car_brands;
        $car_type  = $this->car_types->isEmpty()? $this->car_types->first() : null;
        $part_categories = $this->part_categories;
        $part_sub_categories = $this->part_sub_categories;
        $part_brands = $this->part_brands;
        $parts = $this->parts;


        foreach ($car_models as $key => $car_model) {
              $ids =  (array_merge($ids, $car_model->interresters->pluck('id')->toArray()));
        }
        foreach ($car_brands as $key => $car_brand) {
              $ids =  (array_merge($ids, $car_brand->interresters->pluck('id')->toArray()));
        }
        if ($car_type)
              $ids = (array_merge($ids, $car_type->interresters->pluck('id')->toArray()));

        foreach ($part_categories as $key => $part_category) {
             $ids = (array_merge($ids, $part_category->interresters->pluck('id')->toArray()));
        }
        foreach ($part_sub_categories as $key => $part_sub_category) {
            $ids = (array_merge($ids, $part_sub_category->interresters->pluck('id')->toArray()));
        }
        foreach ($part_brands as $key => $part_brand) {
            $ids = (array_merge($ids, $part_brand->interresters->pluck('id')->toArray()));
        }
        foreach ($parts as $key => $part) {
            $ids = (array_merge($ids, $part->interresters->pluck('id')->toArray()));
        }

        $ids =  array_unique($ids , SORT_NUMERIC);
        $key = array_search($poster->id, $ids);
        if (false !== $key) {
            unset($ids[$key]);
        }
        return $ids;

    }

    public function notify_interresters()
    {
        //ToDo   make and broadcat notifications
        $interresters = User::find($this->get_interresters());
        // dd($this->get_interresters());
        foreach ($interresters as $key => $user) {
            $user->notify(new NewPostNotification($this));
        }
    }
}
