<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;
use App\Group;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class StudentsController extends Controller
{

    public function index()
    {
        $students = Student::with('group','faculty')->get();
//        $faculty_group = Group::with('faculty')->where('id',$id)->first();


        //return response()->json($students, 200);
        return view('admin.students.index', compact('students'));
    }


    public function create()
    {
        $students = Student::with('faculty')->with('group')->get();
        $faculties= Faculty::all();
        $groups= Group::all();
        return view('admin.students.create',compact('students','faculties','groups'));
    }


    public function store(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'group_id' => $request->get('group_id'),
            'fac_id' => $request->get('fac_id')

        ];

        $rules = [
            'name' => 'required|min:5',
            'surname' => 'required|min:8',
            'phone' => 'required|min:8',
            'email' => 'required|email|unique:users',
            'group_id' => 'required',
            'fac_id' => 'required'

        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error','errors' => $validator->errors()],400);
        }

        $students = Student::create($data)->get();
        //return response()->json($students);
        return view('admin.students.index',compact('students'));
    }


    public function show($id)
    {
        $students = Student::with(['group','faculty'])->where('id',$id)->first();
        return response()->json($students,200);
    }

    public function edit($id)
    {
        $student = Student::with(['group','faculty'])->where('id',$id)->first();
        $faculties = Faculty::all();
        $groups = Group::where(['fac_id'=>$student->fac_id])->get();
        return view('admin.students.edit', compact('student','faculties','groups'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'group_id' => $request->get('group_id'),
            'fac_id' => $request->get('fac_id')
        ];

        $rules = [
            'name' => 'required|min:5',
            'surname' => 'required|min:8',
            'phone' => 'required|min:8',
            'email' => 'required|email|unique:users',
            'group_id' => 'required',
            'fac_id' => 'required'

        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error','errors' => $validator->errors()],400);
        }

        Student::where('id',$id)->update($data);
//        $students = Student::find($id);
        
        //return response()->json($students,201);
        return redirect()->to('/api/students');
    }


    public function destroy($id)
    {

        Student::where('id',$id)->delete();
        return redirect()->to('/api/students');
//        return response()->json(['status' => 'success','message'=>'Student deleted!',200]);
    }
    public function getByAjax(Request $request){

        $id = $request->get('id');
        $student = Student::where('id',$id)->first();
        return View::make('admin.students.modals.delete',compact('student'));
    }
    public function getInfoByAjax(Request $request){

        $id = $request->get('id');
        $fac_groups = Group::where(['fac_id'=>$id])->get();
        return View::make('admin.students.select',compact('fac_groups'));
    }
}
