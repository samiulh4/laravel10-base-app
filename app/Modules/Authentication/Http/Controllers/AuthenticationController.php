<?php

namespace App\Modules\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Authentication::welcome");
    }
}
