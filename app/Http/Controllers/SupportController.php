<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'title' => $request->get('title'),
            'summary' => $request->get('summary'),
        ];
        $rules = [
            'title' => 'required',
            'summary' => 'required',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $ticket = Tickets::create($data);
        if (Support::where('theme', $data['title'])->first()) {
            Support::where('theme', $data['title'])->update(['theme' => $data['title'],'ticket_id' => $ticket->id]);
        } else {
            Support::where('theme', $data['title'])->create(['theme' => $data['title'],'ticket_id' => $ticket->id]);
        }
        $support = Support::with('tickets')->get();
        return view('admin.support.index', compact('support'));
    }

    public function getTicketsByAjax(Request $request)
    {
        $id = $request->get('id');
        $support = Support::where('id',$id)->first();
        return View::make('admin.support.modals.delete_tickets',compact('support'));
    }
    public function destroy($id)
    {
        Support::where('id',$id)->delete();
        return redirect()->back();
    }
}

