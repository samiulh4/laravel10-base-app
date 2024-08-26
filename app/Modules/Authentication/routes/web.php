<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Authentication\Http\Controllers\AuthenticationController;


// Route::group(["module"=> "Authentication"], function () {
    
// });

Route::get('/sign-in', [AuthenticationController::class, 'signIn']);
Route::get('/sign-up', [AuthenticationController::class, 'signUpView']);
Route::post('/sign-up', [AuthenticationController::class, 'signUpStore']);
