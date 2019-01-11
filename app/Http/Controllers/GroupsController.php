<?php

namespace App\Http\Controllers;

use App\Group;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('faculty')->get();


//        return response()->json($groups,200);
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::with('faculty')->get();
        $faculties= Faculty::all();
        return view('admin.groups.create',compact('groups','faculties'));
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
            'fac_id' => $request->get('fac_id')
        ];

        $rules = [
            'name' => 'required',
            'fac_id' => 'required'

        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error','errors' => $validator->errors()],400);
        }

        $groups = Group::create($data)->get();
        //return response()->json($groups);
        return view('admin.groups.index',compact('groups'));
    }

    public function show($id)
    {
        $group = Group::with('faculty')->where('id',$id)->first();
        return response()->json($group,200);
    }


    public function edit($id)
    {
        $group = Group::where('id', $id)->first();
        $faculties = Faculty::all();
        return view('admin.groups.edit', compact('group','faculties'));

    }


    public function update(Request $request, $id)
    {

        $data = [
            'name' => $request->get('name'),
            'fac_id' => $request->get('fac_id')
        ];

        $rules = [
            'name' => 'required',
            'fac_id' => 'required'
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error','errors' => $validator->errors()],400);
        }

        Group::where('id',$id)->update($data);
        //$group = Group::find($id);
        //return response()->json($group,201);
        return redirect()->to('/api/groups');
    }

    public function destroy($id)
    {
        Group::where('id',$id)->delete();
//        return response()->json(['status' => 'success','message' => 'Group deleted!',200]);
        return redirect()->to('/api/groups');
    }

    public function getByAjax(Request $request){
        $id = $request->get('id');
        $group = Group::where('id',$id)->first();
        return View::make('admin.groups.modals.delete',compact('group'));
    }
}
