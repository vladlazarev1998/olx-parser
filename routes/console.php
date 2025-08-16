<?php

use App\Jobs\UpdateSubscribePriceJob;
use App\Models\Subscribe;

Schedule::call(callback: function () {
    $subscribes = Subscribe::all();

    foreach ($subscribes as $subscribe) {
        UpdateSubscribePriceJob::dispatch($subscribe);
    }
})->everyMinute();
