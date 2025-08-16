<?php

namespace App\Observers;

use App\Mail\SubscribeUpdatedPriceMail;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;

class SubscribeObserver
{
    /**
     * Handle the Subscribe "created" event.
     */
    public function created(Subscribe $subscribe): void
    {
        //
    }

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

    /**
     * Handle the Subscribe "deleted" event.
     */
    public function deleted(Subscribe $subscribe): void
    {
        //
    }

    /**
     * Handle the Subscribe "restored" event.
     */
    public function restored(Subscribe $subscribe): void
    {
        //
    }

    /**
     * Handle the Subscribe "force deleted" event.
     */
    public function forceDeleted(Subscribe $subscribe): void
    {
        //
    }
}
