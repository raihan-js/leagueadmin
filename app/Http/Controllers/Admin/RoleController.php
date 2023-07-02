<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->get();
        $permissions = Permission::latest()->get();
        return view('pages.user.role.index', [
            'all_roles' => $roles,
            'type'            => '',
            'permissions'     => $permissions,
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
            'name'      => 'required|unique:roles',
        ]);

        // Data Store
        Role::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'permissions' => json_encode($request->permissions),
        ]);

        return back()->with('success', 'Role added successfully');
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
        $permissions = Permission::latest()->get();
        $per = Role::findOrFail($id);
        return view('pages.user.role.index', [
            'edit'            => $per,
            'all_roles'       => $roles,
            'type'            => 'edit',
            'permissions'     => $permissions,
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
        $update_data = Role::findOrFail($id);
        $update_data->update([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
            'permissions' => json_encode($request->permissions),
        ]);
        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Role::findOrFail($id);
        $delete->delete();
        return back()->with('success', 'Role deleted successfully');
    }
}
