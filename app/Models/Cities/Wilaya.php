<?php

namespace App\Models\Cities;

use App\Models\Post;
use App\Models\PostResponse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */

    /**
     * Get all of the posts for the Wilaya
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    /**
     * Get all of the users for the Wilaya
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    /**
     * Get all of the post_responses   for the Wilaya
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post_responses()
    {
        return $this->hasMany(PostResponse::class);
    }
}
