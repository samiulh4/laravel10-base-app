<?php
namespace App\Modules\Authentication\Services;

use App\Modules\Authentication\Http\Requests\SignUpUserRequest;
use Exception;
use App\Modules\Authentication\Repositories\AuthenticationRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthenticationService
{
    public function signUpService(SignUpUserRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
           
            $authRep = new AuthenticationRepository();
            
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('/uploads/avatars', $fileName, 'public');
                $data['avatar'] = $filePath;
            }
            
            $user = $authRep->signUpUser($data);

            DB::commit();
            
            if(empty($user)){
                return [
                    "status"=> "error",
                    "data"=> null,
                    "message"=> "something wend wrong , when createing user !"
                ];
            }
            
            return [
                "status"=> "success",
                "data"=> $user,
                "message"=> "Sign up successful!"
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                "status"=> "error",
                "data"=> null,
                "message"=> $e->getFile().'=>'.$e->getLine().'=>'.$e->getMessage()
            ];
        }
    }// end -:- signUpService()
}// end -:- AuthenticationService