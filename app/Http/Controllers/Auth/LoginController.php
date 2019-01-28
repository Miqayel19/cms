<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    {
        $data = [
            'phone' => $request->get('phone'),
            'password' => $request->get('password')
        ];
        $rules = [
            'phone' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }
        $phone = $request->get('phone');
        $password = $request->get('password');
        $hash_password = User::where('phone', $phone)->first()->password;
        if(password_verify($password, $hash_password)) {
            $user = User::where('phone', $phone)->first();
            Auth::loginUsingId($user->id);
            return redirect()->to('/admin');
        } else {
            $error = "Invalid password ,try again";
            return redirect()->back()->withErrors($error);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function error()
    {
        return view('admin.auth.error');
    }
}
