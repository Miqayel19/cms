<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::orderBy('id','DESC')->get();
        return view('admin.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [

            'name' => $request->get('name')
        ];

        $rules = [

            'name' => 'required'
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
           return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        $result = Faculty::create($data);
        $faculties = $result->orderBy('id','DESC')->get()->all();
//        return response()->json($faculty);
        return view('admin.faculties.index',compact('faculties'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $faculties = Faculty::where('id', $id)->first();
        return response()->json($faculties, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::where('id', $id)->first();
        return view('admin.faculties.edit', compact('faculty'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name')
        ];
        $rules = [
            'name' => 'required'
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        Faculty::where('id', $id)->update($data);
//      return response()->json(['status' => 'success', 'message' => 'Faculty updated!'], 200);
        return redirect()->to('/api/faculties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Faculty::where('id', $id)->delete();
        //return response()->json(['status' => 'success', 'message' => 'Faculty deleted!'], 200);
        return redirect()->to('/api/faculties');

    }

    public function show_group($id)
    {

        $faculty_group = Faculty::where('id', $id)->with('group')->get();
        return response()->json(['Faculty_Groups' => $faculty_group, 'message' => 'Group by Faculty showed!'], 200);

    }

    public function getByAjax(Request $request){
        $id = $request->get('id');
        $faculty = Faculty::where('id',$id)->first();
        return View::make('admin.faculties.modals.delete',compact('faculty'));
    }
}
