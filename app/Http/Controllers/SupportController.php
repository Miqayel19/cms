<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Tickets;
use App\Support;

class SupportController extends Controller
{
    public function index()
    {
        $support = Support::with('tickets')->orderBy('id','DESC')->get();
        return view('admin.support.index', compact('support'));
    }

    public function create()
    {
        $tickets = Tickets::orderBy('id', 'DESC')->get();
        return view('admin.support.create', compact('tickets'));
    }

    public function store(Request $request)
    {
        $data = [
            'ticket_id' => $request->get('ticket_id'),
            'message' => $request->get('message'),
            'upload' =>$request->file('upload'),
        ];

        $rules = [
            'ticket_id' => 'required',
            'message' => 'required',
            'upload' =>'required|file|max:2048',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator);
        }
        $ticket = Tickets::where('id',$data['ticket_id'])->first();
        $data['theme']=$ticket['title'];
        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time().$file->getClientOriginalName();
            $file->move(public_path('/images'), $filename);
            $data['upload']=$filename;
        }

        Support::create($data);
        Tickets::where('id',$data['ticket_id'])->update(['answer'=>$data['message'],'file'=>$data['upload']]);
        $support = Support::with('tickets')->orderBy('id', 'DESC')->get();
        return view('admin.support.index', compact('support'));
    }

    public function getTicketsByAjax(Request $request)
    {
        $id = $request->get('id');
        $support = Support::where('id',$id)->first();
        return View::make('admin.support.modals.delete_tickets',compact('support'));
    }

    public function getSupportByAjax(Request $request)
    {
        $data = [
            'ticket_id' => $request->get('ticket_id'),
            'message' => $request->get('message'),
            'upload' =>$request->file('upload'),
        ];
        $rules = [
            'ticket_id' => 'required',
            'message' => 'required',
            'upload' =>'required|file|max:2048',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $ticket = Tickets::where('id',$data['ticket_id'])->first();
        if($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time().$file->getClientOriginalName();
            $file->move(public_path('/images'), $filename);
            $data['upload']=$filename;
        }
        $data['theme']=$ticket['title'];
        $user= Auth::user()->name;
        Support::create($data);
        Tickets::where('id',$data['ticket_id'])->update(['answer'=>$data['message'],'file'=>$data['upload']]);
        $support = Support::with('tickets')->orderBy('id', 'DESC')->get();
        return View::make('admin.support.get_support',compact('support','user'));
    }
    public function destroy($id)
    {
        Support::where('id',$id)->delete();
        return redirect()->back();
    }
    public function answer($id)
    {
        $res = Support::where('id',$id)->with('tickets')->first();
        $support = Support::where('theme',$res['theme'])->with('tickets')->orderBy('id', 'DESC')->get();
        return view('admin.support.create_answer', compact('support','res'));
    }


}

