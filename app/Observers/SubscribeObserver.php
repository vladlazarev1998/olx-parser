<?php

namespace App\Observers;

use App\Mail\SubscribeUpdatedPriceMail;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;

class SubscribeObserver
{
    /**
     * Handle the Subscribe "updated" event.
     */
    public function updated(Subscribe $subscribe): void
    {
        if ($subscribe->isDirty('price')) {
            $users = $subscribe->users;

            foreach ($users as $user) {
                Mail::to($user->email)->send(new SubscribeUpdatedPriceMail($subscribe));
            }
        }
    }
}
