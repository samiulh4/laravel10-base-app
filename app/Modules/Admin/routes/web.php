<?php

use Illuminate\Support\Facades\Route;

Route::group(["module"=> "Admin"], function () {
    Route::get('/admin', 'AdminController@index');
});


