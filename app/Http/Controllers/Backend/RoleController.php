<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all-permission', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function CreatePermission()
    {
        return view('backend.pages.permission.add-permission');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function EditPermission(string $id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit-permission', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function UpdatePermission(Request $request, string $id)
    {
        $per_id = $request->id;
        $permission = Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function DestroyPermission(string $id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    
    }
    public function ImportPermission()
    {
        
        return view('backend.pages.permission.import-permission');
    
    }
    public function ExportPermission()
    {
        
        return Excel::download(new PermissionExport, 'permission.xlsx');    
    }
    public function ImportStorePermission(Request $request,)
    {
        
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
