<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tickets;
use App\Support;


class SupportController extends Controller
{
    public function index()

    {
        $tickets=Support::orderBy('id','DESC')->get();
        return view('admin.support.index',compact('tickets'));
    }
    public function create()

    {
        $tickets=Tickets::orderBy('id','DESC')->get();
        return view('admin.support.create',compact('tickets'));
    }
    public function store(Request $request)

    {
        $data =[

            'theme'=>$request->get('theme'),


        ];
        $rules = [
            'theme' => 'required',

        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){

            return redirect()->back()->withErrors($validator->errors());
        }

        $result = Support::create($data)->get();
        dd($data);
//        dd($tickets);
//        $support = Support::with('');
//        dd($support);
//        return redirect()->to('user/support');;
        return view('admin.support.index',compact('result'));
    }
}

