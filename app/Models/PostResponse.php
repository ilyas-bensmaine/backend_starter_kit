<?php

namespace App\Models;

use App\Models\Cities\Wilaya;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PostResponse extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];


    /**
     * Get the user that owns the PostResponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post_response_status that owns the PostResponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post_response_status()
    {
        return $this->belongsTo(PostResponseStatus::class);
    }

    /**
     * Get the post that owns the PostResponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    /**
     * Get the wilaya that owns the PostResponse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    public function reporters()
    {
        return $this->morphToMany(Report::class , 'reportable')->withTimestamps();
    }

}
