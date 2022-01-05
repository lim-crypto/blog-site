<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Admin;
use App\Model\admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all();
        return view('admin.user.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('users.create')) {
            $roles = Role::all();
            return view('admin.user.create', compact('roles'));
        }
        return redirect(route('admin.home'))->with('error', 'You are not authorized to access this page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->save();
        $user->roles()->sync($request->role);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('users.update')) {
            $user = Admin::find($id);
            $roles = Role::all();
            return view('admin.user.edit', compact('user', 'roles'));
        }
        return redirect(route('admin.home'))->with('error', 'You are not authorized to access this page');
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'phone' => 'required|string|max:255',
            'role' => 'required'
        ]);
        $user = Admin::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status ? $request->status : 0;
        $user->save();
        $user->roles()->sync($request->role);
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete user
        $user = Admin::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
