<?php

namespace App\Modules\Web\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function index()
    {
        return view("Web::pages.index");
    }// end -:- index()
}// end -:- WebController
