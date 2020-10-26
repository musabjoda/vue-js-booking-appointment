<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Api;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AuthController extends Controller
{

    public function register(Request $request)
    {
 
        $this->validate($request ,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required|string|min:8',
            'timezone' => 'required|string'
            ]);
            
            $request->password =bcrypt($request->password);
            $user=new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =$request->password;
            $user->timezone = $request->timezone;
            $user->save();
            $accessToken=$user->createToken('token')->accessToken;
            return response(['user' => $user,'token' => $accessToken]);

        }

    public function login(Request $request)
    {
        
        $logdata=$this->validate($request ,[
            'email' => 'required|string|email',
            'password' =>'required|string|min:8'
        
            ]);
            if(!auth()->attempt($logdata))
            {
                return response(['message' => 'Invalid Login'],401);
            }
            $accessToken=auth()->user()->createToken('token')->accessToken;
            return response(['user' => auth()->user(),'token' => $accessToken]);
        
        }
        

}
