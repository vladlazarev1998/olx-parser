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
     * @throws \Exception|\Throwable
     */
    public function execute(string $email, string $url): void
    {
        \DB::beginTransaction();

        try {
            $user = User::firstOrCreate([
                'email' => $email,
            ]);

            $subscribe = Subscribe::where('url', $url)->first();

            if (!$subscribe) {
                $subscribe = Subscribe::create([
                    'url' => $url,
                    'price' => app(ParseUrlAction::class)->execute($url)
                ]);
            }

            UserSubscribe::firstOrCreate([
                'user_id' => $user->id,
                'subscribe_id' => $subscribe->id,
            ]);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
