<?php

namespace App\Services;

use App\Jobs\UpdateSubscribePriceJob;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\UserSubscribe;

class SubscribeAction
{
    /**
     * Action for subscribe user for olx url. Create if not exists user and subscribe
     * @param string $email
     * @param string $url
     * @return void
     */
    public function execute(string $email, string $url): void
    {
        $user = User::firstOrCreate([
            'email' => $email,
        ]);

        $subscribe = Subscribe::firstOrCreate([
            'url' => $url,
        ]);

        UserSubscribe::firstOrCreate([
            'user_id' => $user->id,
            'subscribe_id' => $subscribe->id,
        ]);

        UpdateSubscribePriceJob::dispatch($subscribe);
    }
}
