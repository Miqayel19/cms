<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Tickets;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Tickets::orderBy('id', 'DESC')->get();
        return view('admin.tickets.tickets',compact('tickets'));
    }

    public function create()
    {
        return view('admin.tickets.create', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Tickets::where('id',$id)->first();
        return view('admin.tickets.show',compact('ticket'));
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

        $tickets = Tickets::create($data)->get();
        return view('admin.tickets.tickets', compact('tickets'));
    }
    public function destroy($id)
    {
        Tickets::where('id',$id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $ticket= Tickets::where('id',$id)->first();
        return  view('admin.tickets.edit',compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'title' => $request->get('title'),
            'summary' => $request->get('summary'),
        ];
        $rules = [
            'title' => 'required',
            'summary' => 'required'
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        Tickets::where('id', $id)->update($data);
        return redirect()->to('/admin/tickets');
    }

    public function getTicketsByAjax(Request $request)
    {
        $id = $request->get('id');
        $ticket = Tickets::where('id',$id)->first();
        return View::make('admin.tickets.modals.delete_tickets',compact('ticket'));
    }
}
