<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index()
    {
        return view('admin.auth.register');
    }

    public function show_user()
    {
        return view('admin.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'surname' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', 'max:255'],
            'image' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'surname' => $data['surname'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'image' => $data->image->path(),
            'company' => $data['company']
        ]);
    }

    public function verify()
    {

        return view('admin.auth.verify');
    }

    public function check_verify(Request $request)
    {
        $phone = $request->get('phone');
        $verify_code = $request->get('verify_code');
        $user = User::where('phone',$phone)->first();
        $code = $user->verify_code;
        if($verify_code == $code){
            Auth::loginUsingId($user->id);
            return redirect()->to('/admin/users/profile');
        }
        else
            $error = 'Please fill the correct Verification code';
            return redirect()->back()->withErrors($error);
    }
}