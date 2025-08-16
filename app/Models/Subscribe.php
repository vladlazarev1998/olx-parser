<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscribe extends Model
{
    protected $fillable = [
        'url',
        'price'
    ];

    public function userSubscribes(): HasMany
    {
        return $this->hasMany(UserSubscribe::class, 'subscribe_id');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, UserSubscribe::class,  'subscribe_id', 'id');
    }
}
