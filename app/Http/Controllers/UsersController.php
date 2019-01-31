<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }
    public function show_new_user()
    {
        return view('admin.users.new_user');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'fathername' => $request->get('fathername'),
            'city' => $request->get('city'),
            'company' => $request->get('company'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'image' => $request->file('image')
        ];
        $rules = [
            'name' => 'required|min:5',
            'surname' => 'required',
            'fathername' => 'required',
            'city' => 'required|min:4',
            'company' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users|digits:11',
            'image' => 'required|max:2048|mimes:jpeg,png,jpg,gif,svg'
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $data['image'] = Image::make($request->file('image')->getRealPath());
            $path = ('images/'.$filename);
            $data['image']->save($path);
            $data['image']=$filename;
        }

        $newData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'surname' => $request->get('surname'),
            'fathername' => $request->get('fathername'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'image' => $data['image'],
            'company' => $request->get('company'),
        ];

        $user = User::create($newData);
        Auth::loginUsingId($user->id);
        return redirect()->to('admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::where('id',$id)->first();
        return  view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'fathername' => $request->get('fathername'),
            'city' => $request->get('city'),
            'company' => $request->get('company'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'image' => $request->file('image')
        ];

        $rules = [
            'name' => 'required|min:5',
            'surname' => 'required',
            'fathername' => 'required',
            'city' => 'required|min:4',
            'company' => 'required|min:5',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required|max:2048|mimes:jpeg,png'
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $data['image'] = Image::make($request->file('image')->getRealPath());
            $path = ('images/'.$filename);
            $data['image']->save($path);
        }

        $newData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'surname' => $request->get('surname'),
            'fathername' => $request->get('fathername'),
            'phone' => $request->get('phone'),
            'city' => $request->get('city'),
            'image' => $request->get('image'),
            'company' => $request->get('company'),
        ];
        User::where('id',$id)->update($newData);
        return redirect()->to('/admin/users');
    }
    public function update_data(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'fathername' => $request->get('fathername'),
            'city' => $request->get('city'),
            'company' => $request->get('company'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'image' => $request->file('image')
        ];

        $rules = [
            'name' => 'required|min:5',
            'surname' => 'required',
            'fathername' => 'required',
            'city' => 'required|min:4',
            'company' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required|max:2048|mimes:jpeg,png'
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $data['image'] = Image::make($request->file('image')->getRealPath());
            $path = ('images/'.$filename);
            $data['image']->save($path);
        }
        $id = Auth::user()->id;
        $data['image']=$filename;
        $data['password']=Hash::make($request->get('password'));
        User::where('id',$id)->update($data);
        return redirect()->to('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back();
    }
    public function getByAjax(Request $request)
    {
        $id = $request->get('id');
        $user = User::where('id',$id)->first();
        return View::make('admin.users.modals.delete',compact('user'));
    }
    public function send_sms()
    {
        return view('admin.auth.send');
    }




}
