<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LucasDotVin\Soulbscription\Models\Feature;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    /**
     * The features that belong to the Card
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cardable()
    {
        return $this->morphTo();
    }
}
