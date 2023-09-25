<?php

namespace App\Models;

use App\Models\Cities\Wilaya;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LucasDotVin\Soulbscription\Models\Concerns\HasSubscriptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable , InteractsWithMedia, HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the wilaya that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    /**
     * Get the profile that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function user_status()
    {
        return $this->belongsTo(UserStatus::class);
    }
    public function user_profession()
    {
        return $this->belongsTo(UserProfession::class);
    }
    /**
     * Get all of the posts for the User
     *
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get all of the post_responses for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post_responses()
    {
        return $this->hasMany(PostResponse::class);
    }
    /**
     * The viewes_posts that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function viewed_posts()
    {
        return $this->belongsToMany(Post::class, 'post_views', 'user_id', 'post_id')->withPivot('saved','created_at');
    }
      /**
     * The saved_posts that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function saved_posts()
    {
        return $this->belongsToMany(Post::class, 'post_views', 'user_id', 'post_id')->wherePivot('saved', true);
    }
    /**
     * The followings that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followings', 'user_id', 'followed_id')->withTimestamps()
                    ->withPivot('get_notifications');
    }
    /**
     * The ticket_templates that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ticket_templates(): BelongsToMany
    {
        return $this->belongsToMany(TicketTemplate::class)->withTimestamps();
    }

    /**
     * The popups that belong to the Popup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function popups(): BelongsToMany
    {
        return $this->belongsToMany(Popup::class)->withPivot('seen_count');
    }

    public function last_popup(){
        return $this->belongsToMany(Popup::class)->wherePivot('seen_count' ,'<' ,1 );
    }
    //poly morphisme

    public function part_categories()
    {
        return $this->morphedByMany(PartCategory::class, 'interrestable')->withTimestamps();
    }

    public function part_sub_categories()
    {
        return $this->morphedByMany(PartSubCategory::class, 'interrestable')->withTimestamps();
    }

    public function parts()
    {
        return $this->morphedByMany(Part::class, 'interrestable')->withTimestamps();
    }

    public function car_brands()
    {
        return $this->morphedByMany(CarBrand::class, 'interrestable')->withTimestamps();
    }

    public function car_types()
    {
        return $this->morphedByMany(CarType::class, 'interrestable')->withTimestamps();
    }

    public function car_models()
    {
        return $this->morphedByMany(CarModel::class, 'interrestable')->withTimestamps();
    }

    public function part_brands()
    {
        return $this->morphedByMany(PartBrand::class, 'interrestable')->withTimestamps();
    }

    //SCOPES
    public function scopePlans(Builder $query, $plans): Builder
    {
        $categories = json_decode($plans);
        return $query->whereHas('subscription', function (Builder $query) use ($categories) {
            $query->whereIn('subscriptions.plan_id', $categories);
        });
    }

    public function scopeTicketTemplate(Builder $query, $ticket_template): Builder
    {
        $categories = json_decode($ticket_template);
        return $query->whereHas('ticket_templates', function (Builder $query) use ($categories) {
            $query->whereIn('ticket_templates.id', $categories);
        });
    }


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
        return $query->whereHas('car_models', function (Builder $query) use ($categories) {
            $query->whereIn('car_models.id', $categories);
        });
    }
    public function scopeInvitations(Builder $query): Builder
    {
        return $query->where('invitaition_code' ,'=' , $this->invitaition_code);
        ;
    }
}
