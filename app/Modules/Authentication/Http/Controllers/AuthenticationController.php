<?php

namespace App\Modules\Authentication\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Authentication\Http\Requests\SignUpUserRequest;
use App\Modules\Authentication\Http\Requests\SignInUserRequest;
use App\Modules\Authentication\Services\AuthenticationService;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    
    protected $authService;

    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }
    public function signInView()
    {
        return view("Authentication::pages.sign-in");
    }// end -:- signInView()

    public function signUpView()
    {
        return view("Authentication::pages.sign-up");
    }// end -:- signUpView()

    public function signUpStore(SignUpUserRequest $request)
    {
        $store =  $this->authService->signUpService($request);
        
        session()->flash($store['status'], $store['message']);

        if($store['status'] == 'success'){
            return redirect('/sign-in');
        }
        return redirect('/sign-up');
    }// end -:- signUpStore()

    public function signInAccess(SignInUserRequest $request)
    {
        $auth =  $this->authService->signInService($request);

        if($auth['status'] == 'success'){
            return redirect('/admin');
        }
        return redirect('/sign-in');
    }// end -:- signInAccess()

    public function signOut()
    {
        $sign_out_status = $this->authService->signOutService();
        if($sign_out_status == true){
            return redirect('/sign-in');
        }
        return Redirect::back();
    }// end -:- signOut()
}// end -:- AuthenticationController
