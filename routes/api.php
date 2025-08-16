<?php

use App\Http\Controllers\Api\v1\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::post('subscribe', [SubscribeController::class, 'subscribe']);
