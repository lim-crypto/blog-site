<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.show',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'name'=>'required|max:50|unique:roles',
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.edit',compact('role','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $this->validate($request,[
            'name'=>'required|max:50',
        ]);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'));
    }
}
