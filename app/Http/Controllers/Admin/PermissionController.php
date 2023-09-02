<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    // public function __construct()
    // {
    //     // Apply the 'check.role' middleware to specific methods
    //     $this->middleware('check.role:League Admin')->only(['index','edit']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('pages.user.permission.index', [
            'all_permissions' => $permissions,
            'type'            => '',
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
            'name'      => 'required|unique:permissions',
        ]);

        // Data Store
        Permission::create([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
        ]);

        return back()->with('success', 'Permission added successfully');
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
        $permissions = Permission::latest()->get();
        $per = Permission::findOrFail($id);
        return view('pages.user.permission.index', [
            'edit'            => $per,
            'all_permissions' => $permissions,
            'type'            => 'edit',
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
        $update_data = Permission::findOrFail($id);
        $update_data->update([
            'name'      => $request->name,
            'slug'      => Str::slug($request->name),
        ]);
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Permission::findOrFail($id);
        $delete->delete();
        return back()->with('success', 'Permission deleted successfully');
    }
}
