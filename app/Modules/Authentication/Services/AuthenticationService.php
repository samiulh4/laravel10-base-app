<?php
namespace App\Modules\Authentication\Services;

use App\Modules\Authentication\Http\Requests\SignUpUserRequest;
use App\Modules\Authentication\Http\Requests\SignInUserRequest;
use Exception;
use App\Modules\Authentication\Repositories\AuthenticationRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class AuthenticationService
{
    protected $authRepository;
    public function __construct(AuthenticationRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function signUpService(SignUpUserRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
           
            $authRep = new AuthenticationRepository();
            
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $filePath = 'uploads'.DIRECTORY_SEPARATOR.'avatars';
                $fileDestinationPath = public_path($filePath);
                if (!file_exists($fileDestinationPath)) {
                    mkdir($fileDestinationPath, 0777, true);
                }
                $fileDbPath = 'uploads'.DIRECTORY_SEPARATOR.'avatars'.DIRECTORY_SEPARATOR.$fileName;
                if($file->move($fileDestinationPath, $fileName)){
                    $data['avatar'] = $fileDbPath;
                }
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

    public function signInService(SignInUserRequest $request)
    {
        $data = $request->validated(); // $data is an array
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        try {
            $authRep = new AuthenticationRepository();
            $authUser = $authRep->signInUser($credentials);

            if(empty($authUser)){
                return [
                    "status"=> "error",
                    "data"=> null,
                    "message"=> "Invalid email or password !"
                ];
            }
            
            return [
                "status"=> "success",
                "data"=> $authUser,
                "message"=> "Sign in successful!"
            ];
        } catch (Exception $e) {
            return [
                "status"=> "error",
                "data"=> null,
                "message"=> $e->getFile().'=>'.$e->getLine().'=>'.$e->getMessage()
            ];
        }
    }// end -:- signInService()

    public function signOutService()
    {
        Auth::logout(); // Logs out the user
        request()->session()->invalidate(); // Invalidates the session
        request()->session()->regenerateToken(); // Regenerates the CSRF token for security

        return true;
    }
}// end -:- AuthenticationService