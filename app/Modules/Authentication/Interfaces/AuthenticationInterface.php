<?php
namespace App\Modules\Authentication\Interfaces;

interface AuthenticationInterface
{
    public function signUpUser(array $data = []);

}// end -:- AuthenticationInterface