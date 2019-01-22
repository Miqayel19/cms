<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tickets;


class SupportController extends Controller
{
    public function index()

    {
        $tickets=Tickets::orderBy('id','DESC')->get();
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

            'title'=>$request->get('title'),
            'summary'=>$request->get('summary'),

        ];
        $rules = [
            'title' => 'required',
            'summary' => 'required',

        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){

            return redirect()->back()->withErrors($validator->errors());
        }
        $tickets=Tickets::create($data)->orderBy('id','DESC')->get();
        return view('admin.support.index',compact('tickets'));
    }
}

