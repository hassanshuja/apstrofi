<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function register(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|unique:users,email|email',
        //     'password' => 'required'    
        // ]);
        // return response()->json(['req' => $request->all(), 'error' => $request->signup_newsletter ? 1 : NULL]);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'min:10'],
            'signup_newsletter' => ['boolean']
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        $user  = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'signup_newsletter' => $request->signup_newsletter == true ? 1 : NULL
        ]);

        if(!$token = auth()->attempt($request->only(['email', 'password'])))
        {
            return abort(401);
        }

        return (new UserResource($user))
            ->additional([
               'meta' => [
                 'token' => $token
             ]
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        if(!$token = auth()->attempt($request->only(['email', 'password'])))
        {
            $error = array('error' => 'Emial OR Password Not Authorized');
            return response()->json($error, 403);
        }

        return (new UserResource($request->user()))
                ->additional([
                    'meta' => [
                        'token' => $token
                    ]
                ]);
    }

    public function user(Request $request){
        if($request->user()){
            return new UserResource($request->user());
        }else{
            $error = array('error' => 'User Not Found');
            return response()->json($error);
        }
            
    }

    public function logout(){
        auth()->logout();
    }
}
