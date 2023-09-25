<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdminStatus extends Model
{
    use HasFactory;

    protected $guarded = [];


    // Relations
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

}
