<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
//use Validator;
use App\Http\Controllers\Controller;
use Illuminate\http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Routing\Route;
//use Middleware\authenticate;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:60',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:7',
        ]);
    }*/

   public function authenticate(Request $request){
        $credentials = $request->only('email', 'password');
        try{
            if (! $token = JWTAuth::attempt($credentials)){
             //dd($credentials);
          return response()->json(['error'=>'User credentials are not correct'], 401);
            }
        }catch(JWTException $ex){
            return response()->json(['error'=>'Somenthing went wrong!'], 500);
        }

        return response()->json(compact('token'));

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
