<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;

class UserObserver
{
    public function created(User $user): void
    {
        $user->notify(new VerifyEmail);
    }
}
