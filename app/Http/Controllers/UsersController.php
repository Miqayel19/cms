<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\News;
use App\Tickets;
use Illuminate\Support\Facades\View;

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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->all());
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'fathername' => $request->get('fathername'),
            'city' => $request->get('city'),
            'company' => $request->get('company'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'image' => $request->image->path()
        ];

        $rules = [
            'name' => 'required|min:5',
            'surname' => 'required',
            'fathername' => 'required',
            'city' => 'required|min:4',
            'company' => 'required|min:5',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image' => 'required'

        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
                dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();

        }
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('/images'), $data['image']);
        } else {

            $data['image']='no-image.png';
        }

        $users = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'surname' => $data['surname'],
            'fathername' => $data['fathername'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'image' => $data['image'],
            'company' => $data['company'],
        ])->orderBy('id', 'DESC')->get()->all();;

        return view('admin.users.index',compact('users'));
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
            'image' => $request->image->path()
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
            'image' => 'required'

        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('/images'), $data['image']);
        } else {

            $data['image']='no-image.png';
        }

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

    public function destroy_ticket($id)
    {
        Tickets::where('id',$id)->delete();
        return redirect()->back();
    }

    public function tickets()
    {
        $tickets = Tickets::orderBy('id', 'DESC')->get();
        return view('admin.tickets',compact('tickets'));
    }

    public function getByAjax(Request $request)
    {
        $id = $request->get('id');
        $user = User::where('id',$id)->first();
        return View::make('admin.users.modals.delete',compact('user'));
    }
    public function news()
    {
        $news = News::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.news',compact('news'));
    }

    public function show_news($id)
    {
        $new = News::where('id', $id)->first();
        return view('admin.show_news',compact('new'));

    }
    public function send_sms()
    {
        return view('admin.auth.send');

    }

    public function new_user(Request $request)
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
            'image' => $request->image->path()
        ];

        $rules = [
            'name' => 'required|min:5',
            'surname' => 'required',
            'fathername' => 'required',
            'city' => 'required|min:4',
            'company' => 'required|min:5',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image' => 'required'

        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();

        }
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('/images'), $data['image']);
        } else {

            $data['image']='no-image.png';
        }

            $users = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'surname' => $data['surname'],
                'fathername' => $data['fathername'],
                'city' => $data['city'],
                'phone' => $data['phone'],
                'image' => $data['image'],
                'company' => $data['company'],
            ])->orderBy('id', 'DESC')->get()->all();;

        return view('admin.users.index',compact('users'));

    }
    public function getTicketsByAjax(Request $request)
    {
        $id = $request->get('id');
        $ticket = Tickets::where('id',$id)->first();
//        dd($ticket);
        return View::make('admin.users.modals.delete_tickets',compact('ticket'));
    }


}
