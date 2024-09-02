<?php

namespace App\Modules\LayoutAdmin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  
    public function index()
    {
        return view("LayoutAdmin::pages.index");
    }
}
