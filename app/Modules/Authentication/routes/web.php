<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Authentication\Http\Controllers\AuthenticationController;

Route::get('/sign-up', [AuthenticationController::class, 'signUpView']);
Route::post('/sign-up', [AuthenticationController::class, 'signUpStore']);
Route::get('/sign-in', [AuthenticationController::class, 'signInView']);
Route::post('/sign-in', [AuthenticationController::class, 'signInAccess']);
Route::post('/sign-out', [AuthenticationController::class, 'signOut'])->middleware('auth');

