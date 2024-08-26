<?php

namespace App\Modules\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Setting::welcome");
    }
}
