<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Http\Controllers\AdminController;

Route::group(["middleware"=> ["auth"]], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});




