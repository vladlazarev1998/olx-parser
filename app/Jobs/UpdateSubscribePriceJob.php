<?php

namespace App\Jobs;

use App\Models\Subscribe;
use App\Services\UpdateSubscribePriceAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateSubscribePriceJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Subscribe $subscribe)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app(UpdateSubscribePriceAction::class)->execute($this->subscribe);
    }
}
