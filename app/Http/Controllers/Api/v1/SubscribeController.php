<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Services\SubscribeAction;

class SubscribeController extends Controller
{

    public function __construct(public SubscribeAction $subscribeAction)
    {
    }

    public function subscribe(SubscribeRequest $request)
    {
        $this->subscribeAction->execute($request->validated('email'), $request->validated('url'));

        return response()->json([
            'success' => true,
            'message' => 'Subscribed successfully',
        ]);
    }
}
