<?php

use Illuminate\Support\Facades\Route;
use App\Modules\LayoutAdmin\Http\Controllers\AdminController;

Route::group(['prefix' => '/admin', 'middleware'=> ['auth']], function () {
    Route::get('/', [AdminController::class, 'index']);
});




