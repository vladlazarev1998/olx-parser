<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscribe extends Model
{
    protected $fillable = [
        'user_id',
        'subscribe_id',
    ];
}
