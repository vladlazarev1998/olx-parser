<?php

namespace App\Services;

use App\Models\Subscribe;

class UpdateSubscribePriceAction
{
    public function execute(Subscribe $subscribe): void
    {
        $price = app(ParseUrlAction::class)->execute($subscribe->url);
        $subscribe->update(['price' => $price]);
    }
}
