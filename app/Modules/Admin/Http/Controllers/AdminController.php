<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  
    public function index()
    {
        return view("Admin::pages.index");
    }
}
