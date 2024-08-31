<?php
namespace App\Modules\Authentication\Repositories;

use App\Modules\Authentication\Interfaces\AuthenticationInterface;
use Exception;
use App\Modules\User\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationRepository implements AuthenticationInterface
{
    public function signUpUser(array $data = [])
    {
        try {
            $user = new Users();
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->user_name = $data["user_name"] ?? $data["email"];
            $user->user_type_code = $data["user_type_code"] ?? 'user';
            $user->gender_code = $data["gender_code"] ?? null;
            $user->web_access = $data["web_access"] ?? 'web';
            $user->password = Hash::make($data["password"]);
            $user->password = Hash::make($data["password"]);
            $user->avatar = $data["avatar"] ?? null;
            $user->is_active = 1;
            $user->save();

            $user->created_by =  $user->id;
            $user->updated_by = $user->id;
            $user->save();

            return $user;
        } catch (Exception $e) {
           return null;
        }
    }// end -:- signUpUser

    public function signInUser(array $credentials)
    {
        try {  
            if (Auth::attempt($credentials)) {
                return Auth::user();
            }
            return null;
         } catch (Exception $e) {
            return null;
         }
    }// end -:- signInUser()

}// end -:- AuthenticationRepository
