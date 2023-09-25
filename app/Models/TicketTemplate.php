<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use LucasDotVin\Soulbscription\Models\Feature;

class TicketTemplate extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The features that belong to the TicketTemplate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class)->withPivot('charges')->withTimestamps();
    }

    public function cards()
    {
        return $this->morphMany(Card::class, 'cardable');
    }
    /**
     * The users that belong to the TicketTemplate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
