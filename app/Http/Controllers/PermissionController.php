<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->paginate(5);
        return response()->view('cms.spatie.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.spatie.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), []);

        if (!$validator->fails()) {
            $permissions = new Permission();
            $permissions->guard_name = $request->get('guard_name');
            $permissions->name = $request->get('name');

            $isSaved = $permissions->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => 'Created is successfully'], 200);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions = Permission::findOrFail($id);
        return response()->view('cms.spatie.permission.show', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = permission::findOrFail($id);
        return response()->view('cms.spatie.permission.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), []);

        if (!$validator->fails()) {
            $permissions = Permission::findOrFail($id);
            $permissions->guard_name = $request->get('guard_name');
            $permissions->name = $request->get('name');

            $isUpdate = $permissions->save();
            return ['redirect' => route('permissions.index')];
            if ($isUpdate) {
                return response()->json(['icon' => 'success', 'title' => 'Update is successfully'], 200);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = Permission::destroy($id);
    }
}
