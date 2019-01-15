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
     * @OA\GET(
     *      path="/api/groups",
     *      operationId="getGroupsList",
     *      tags={"groups"},
     *      summary="Get list of groups",
     *      description="Returns list of groups",
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
        $groups = Group::with('faculty')->get();
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
     * @OA\POST(
     *      path="/api/groups",
     *      operationId="addGroup",
     *      tags={"groups"},
     *      summary="Create group",
     *      description="Create the group in store",
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
     *              type="int"
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
        return view('admin.groups.index',compact('groups'));
    }

    /**
     * @OA\GET(
     *      path="/api/groups/{id}",
     *      operationId="getGroupbyId",
     *      tags={"groups"},
     *      summary="Get group by Id",
     *      description="Returns the group by Id",
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
     *         description="Group not found"
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
        $group = Group::with('faculty')->where('id',$id)->first();
        return response()->json($group,200);
    }

    public function edit($id)
    {
        $group = Group::where('id', $id)->first();
        $faculties = Faculty::all();
        return view('admin.groups.edit', compact('group','faculties'));
    }

    /**
     * @OA\PUT(
     *      path="/api/groups/{id}",
     *      operationId="updateGroup",
     *      tags={"groups"},
     *      summary="Update group by Id",
     *      description="Update the group in store",
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
        return redirect()->to('/api/groups');
    }

    /**
     * @OA\DELETE(
     *      path="/api/groups/{id}",
     *      operationId="deleteGroup",
     *      tags={"groups"},
     *      summary="Delete group by Id",
     *      description="Delete the group from store",
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
     *              type="string"
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
        Group::where('id',$id)->delete();
        return redirect()->back();
    }

    public function getByAjax(Request $request)
    {
        $id = $request->get('id');
        $group = Group::where('id',$id)->first();
        return View::make('admin.groups.modals.delete',compact('group'));
    }
}
