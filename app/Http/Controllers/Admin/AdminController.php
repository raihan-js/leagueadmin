<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_users = Admin::latest()->get();
        $roles = Role::latest()->get();
        return view('pages.user.index', [
            'all_users' => $admin_users,
            'type'            => '',
            'all_roles'            => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Fields Validation
        $this->validate($request, [
            'name'      => 'required',
            'username'      => 'required|unique:admins',
            'email'      => 'required|unique:admins',
            'phone'      => 'required|unique:admins',
        ]);

        // Data Store
        Admin::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'username'      => $request->username,
            'phone'         => $request->phone,
            'role_id'       => $request->role,
            'password'      => Hash::make($request->password),
        ]);

        return back()->with('success', 'User created successfully');
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
        $roles = Role::latest()->get();
        $all_users = Admin::latest()->get();
        $per = Admin::findOrFail($id);
        return view('pages.user.index', [
            'edit'            => $per,
            'all_users' => $all_users,
            'type'            => 'edit',
            'all_roles'            => $roles,
        ]);
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
        $update_data = Admin::findOrFail($id);
        $update_data->update([
            'name'      => $request->name,
            'email'      => $request->email,
            'username'      => $request->username,
            'phone'      => $request->phone,
            'role_id'    => $request->role,
            'password'      => Hash::make($request->password),
        ]);
        return redirect()->route('admins.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Admin::findOrFail($id);
        $delete->delete();
        return back()->with('success', 'User deleted successfully');
    }


    public function updateStatus($id){
        $data = Admin::findOrFail($id);

        if($data ->status){
            $data->update([
                'status'    => false,
            ]);
        }else{
            $data->update([
                'status'    => true,
            ]);
        }

        return back()->with('success', 'Status updated successfully');
    }
    
}
