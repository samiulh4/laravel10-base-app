<?php

namespace App\Modules\Area\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Area::welcome");
    }
}
