<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;
use App\Group;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class StudentsController extends Controller
{

    /**
     * @OA\GET(
     *      path="/api/students",
     *      operationId="getStudentssList",
     *      tags={"students"},
     *      summary="Get list of students",
     *      description="Returns list of students",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('group', 'faculty')->get();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $students = Student::with('faculty')->with('group')->get();
        $faculties = Faculty::all();
        $groups = Group::all();
        return view('admin.students.create', compact('students', 'faculties', 'groups'));
    }

    /**
     * @OA\POST(
     *      path="/api/students",
     *      operationId="addStudent",
     *      tags={"students"},
     *      summary="Create student",
     *      description="Create the student in store",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="fac_id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="group_id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful created"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * @return \Illuminate\Http\Response
     */

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
            'phone' => 'required|min:8|numeric',
            'email' => 'required|email|unique:users',
            'group_id' => 'required',
            'fac_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $students = Student::create($data)->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * @OA\GET(
     *      path="/api/students/{id}",
     *      operationId="getStudentbyId",
     *      tags={"students"},
     *      summary="Get student by Id",
     *      description="Returns the student by Id",
     *     @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *
     *     @OA\Response(
     *         response="404",
     *         description="Student not found"
     *     ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $students = Student::with(['group', 'faculty'])->where('id', $id)->first();
        return response()->json($students, 200);
    }

    public function edit($id)
    {
        $student = Student::with(['group', 'faculty'])->where('id', $id)->first();
        $faculties = Faculty::all();
        $groups = Group::where(['fac_id' => $student->fac_id])->get();
        return view('admin.students.edit', compact('student', 'faculties', 'groups'));
    }


    /**
     * @OA\PUT(
     *      path="/api/students/{id}",
     *      operationId="updateStudent",
     *      tags={"students"},
     *      summary="Update student by Id",
     *      description="Update the student in store",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful updated"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * @return \Illuminate\Http\Response
     */

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
            'phone' => 'required|min:8|numeric',
            'email' => 'required|email|unique:users',
            'group_id' => 'required',
            'fac_id' => 'required'
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 400);
        }

        Student::where('id', $id)->update($data);
        return redirect()->to('/api/students');
    }

    /**
     * @OA\DELETE(
     *      path="/api/students/{id}",
     *      operationId="deleteStudent",
     *      tags={"students"},
     *      summary="Delete student by Id",
     *      description="Delete the student from store",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful deleted"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->to('/api/students');
    }

    public function getByAjax(Request $request)
    {
        $id = $request->get('id');
        $student = Student::where('id', $id)->first();
        return View::make('admin.students.modals.delete', compact('student'));
    }

    public function getInfoByAjax(Request $request)
    {
        $id = $request->get('id');
        $fac_groups = Group::where(['fac_id' => $id])->get();
        return View::make('admin.students.select', compact('fac_groups'));
    }
}
