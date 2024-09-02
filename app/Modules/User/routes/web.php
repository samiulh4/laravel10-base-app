<?php

use Illuminate\Support\Facades\Route;
use App\Modules\User\Http\Controllers\UserController;



Route::group(['prefix' => '/admin', 'middleware'=> ['auth']], function(){
    Route::get('/user/list',  [UserController::class, 'adminUserList']);
    Route::get('/user/get-data',  [UserController::class, 'adminGetList']);
});
