<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Blog\Http\Controllers\BlogController;


Route::group(['prefix' => '/admin', 'middleware'=> ['auth']], function(){
    Route::get('/blog/list',  [BlogController::class, 'adminBlogList']);
    Route::get('/blog/get-data',  [BlogController::class, 'adminGetBlogData']);
});


