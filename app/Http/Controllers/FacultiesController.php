<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Student;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class FacultiesController extends Controller
{
    /**
     * @OA\GET(
     *      path="/api/dashboard",
     *      operationId="getDashboard",
     *      tags={"dashboard"},
     *      summary="Get list of students information",
     *      description="Returns list of information",
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
    public function dashboard()
    {
        $students = Student::with('faculty', 'group')->orderBy('id', 'DESC')->get();
        $faculties = Faculty::all();
        return view('admin.includes.dashboard', compact('students', 'faculties'));
    }


    /**
     * @OA\GET(
     *      path="/api/faculties",
     *      operationId="getFacultiesList",
     *      tags={"faculties"},
     *      summary="Get list of faculties",
     *      description="Returns list of faculties",
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
        $faculties = Faculty::orderBy('id', 'DESC')->get();
        return view('admin.faculties.index', compact('faculties'));
    }


    public function create()
    {
        return view('admin.faculties.create');
    }

    /**
     * @OA\POST(
     *      path="/api/faculties",
     *      operationId="addFaculty",
     *      tags={"faculties"},
     *      summary="Create faculty",
     *      description="Create the faculty in store",
     *      @OA\Parameter(
     *          name="name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
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
            'name' => $request->get('name')
        ];

        $rules = [
            'name' => 'required|unique:faculties',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $result = Faculty::create($data);
        $faculties = $result->orderBy('id', 'DESC')->get()->all();
        return view('admin.faculties.index', compact('faculties'));
    }


    /**
     * @OA\GET(
     *      path="/api/faculties/{id}",
     *      operationId="getFacultybyId",
     *      tags={"faculties"},
     *      summary="Get faculty by Id",
     *      description="Returns the faculty by Id",
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
     *         description="Faculty not found"
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
     * @OA\PUT(
     *      path="/api/faculties/{id}",
     *      operationId="addFaculty",
     *      tags={"faculties"},
     *      summary="Update faculty by Id",
     *      description="Update the faculty in store",
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
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name')
        ];
        $rules = [
            'name' => 'required|unique:faculties'
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Faculty::where('id', $id)->update($data);
        return redirect()->to('/api/faculties');
    }

    /**
     * @OA\DELETE(
     *      path="/api/faculties/{id}",
     *      operationId="deleteFaculty",
     *      tags={"faculties"},
     *      summary="Delete faculty by Id",
     *      description="Delete the faculty from store",
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
        Faculty::where('id', $id)->delete();
        return redirect()->to('/api/faculties');
    }

    public function show_group_json(Request $request, $id)
    {
        $this->searchByAjax($request);
        $faculty_groups = Group::where('fac_id', $id)->with('faculty')->get();
        return View::make('admin.faculties.modals.group_modal', compact('faculty_groups'));
    }

    public function show_group($id)
    {
        $faculty_group = Faculty::where('id', $id)->with('group')->get();
        return response()->json(['Faculty_Groups' => $faculty_group, 'message' => 'Group by Faculty showed!'], 200);
    }

    public function getByAjax(Request $request)
    {
        $id = $request->get('id');
        $faculty = Faculty::where('id', $id)->first();
        return View::make('admin.faculties.modals.delete', compact('faculty'));
    }

    public function searchByAjax(Request $request)
    {
        $name = $request->get('search_name');
        $surname = $request->get('search_surname');
        $phone = $request->get('search_phone');
        $mail = $request->get('search_email');
        $fac_id = $request->get('search_fac');
        $group_id = $request->get('id');

        $students = Student::query();
        if ($name) {
            $students->where('name', 'like', '%' .$name. '%');
        }
        if ($surname) {
            $students->where('surname', 'like', '%' . $surname . '%');
        }
        if ($phone) {
            $students->where('phone', 'like', '%' . $phone . '%');
        }
        if ($mail) {
            $students->where('email', 'like', '%' . $mail . '%');
        }
        if ($fac_id) {
            $students->with('faculty')->where('fac_id', 'like', '%' . $fac_id . '%');
        }

        if ($group_id) {
            $students->with('group')->where('group_id', 'like', '%' . $group_id . '%');
        }
        $students = $students->with('faculty','group')->orderBy('id', 'DESC')->get();
        return View::make('admin.includes.search',compact('students'));
    }

    public function getInfoByAjax(Request $request)
    {
        $id = $request->get('id');
        $fac_groups = Group::where(['fac_id' => $id])->get();
        return View::make('admin.students.select', compact('fac_groups'));
    }


}
