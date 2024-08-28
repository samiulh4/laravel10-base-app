<?php
namespace App\Modules\Authentication\Interfaces;

interface AuthenticationInterface
{
    public function signUpUser(array $data = []);
    public function signInUser(array $credentials);
    public function signOutUser();
    
}// end -:- AuthenticationInterface