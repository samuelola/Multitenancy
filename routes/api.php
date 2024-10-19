<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    // Route::post('/register', [AuthController::class, 'register']);
});
