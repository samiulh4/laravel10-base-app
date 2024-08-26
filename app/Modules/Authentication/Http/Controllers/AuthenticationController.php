<?php

namespace App\Modules\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User\Models\Users;
use App\Modules\Authentication\Http\Requests\SignUpUserRequest;

class AuthenticationController extends Controller
{
    public function signIn()
    {
        return view("Authentication::pages.sign-in");
    }// end -:- signIn()

    public function signUpView()
    {
        return view("Authentication::pages.sign-up");
    }// end -:- signUpView()

    public function signUpStore(SignUpUserRequest $request)
    {
       
        $validated = $request->validated();

        return redirect('/sign-in');
    }// end -:- signUpStore()
}// end -:- AuthenticationController
