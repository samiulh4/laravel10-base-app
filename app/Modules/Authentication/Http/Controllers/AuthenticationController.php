<?php

namespace App\Modules\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Authentication\Http\Requests\SignUpUserRequest;
use App\Modules\Authentication\Services\AuthenticationService;

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
        $authService = new AuthenticationService;
        $store = $authService->signUpService($request);
        
        session()->flash($store['status'], $store['message']);

        if($store['status'] == 'success'){
            return redirect('/sign-in');
        }
        return redirect('/sign-up');
    }// end -:- signUpStore()
}// end -:- AuthenticationController
