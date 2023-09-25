<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResponseStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the post_responses for the PostResponseStatus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post_responses()
    {
        return $this->hasMany(PostResponse::class);
    }
}
