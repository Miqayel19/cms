<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('phone', 'password');
        if(Auth::attempt($credentials)){
                $user = Auth::user();
                Auth::login($user);
               return redirect()->to('/admin');
            }

    }

    public function logout()
    {
        return redirect('/login')->with(Auth::logout());
    }

    public function error()
    {
        return view('admin.auth.error');
    }
}
