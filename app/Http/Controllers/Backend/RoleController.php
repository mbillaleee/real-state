<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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



    //  Role All Method

    public function AllRole()
    {
        $roles = Role::all();
        return view('backend.pages.role.all-role', compact('roles'));
    }

    public function CreateRole()
    {
        return view('backend.pages.role.add-role');

    }

    public function StoreRole(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.role')->with($notification);
    
    }

    public function EditRole(string $id)
    {
        $role = Role::findOrFail($id);
        return view('backend.pages.role.edit-role', compact('role'));
    }

    public function UpdateRole(Request $request, string $id)
    {
        $rol_id = $request->id;
        Role::findOrFail($rol_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.role')->with($notification);
    
    }

    public function DestroyRole(string $id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    
    }


    // //////////Add Role in Permission 

    public function AddRolePermission()
    {
        $roles = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.role-setup.add-role-permission', compact('roles','permission', 'permission_groups'));

    }
    public function StoreRolePermission(Request $request)
    {
        // dd($request->all());
        $data = array();
        $permissions  = $request->permission;
        // dd($permissions);

        foreach($permissions  as $key => $item){
            $data['role_id'] = $request->id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')
                    ->update($data);
        } //End foreach
        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    
    }

    public function AllRolePermission(Request $request)
    {
        $roles = Role::all();
        return view('backend.pages.role-setup.all-role-permission', compact('roles'));

    }

    public function AdminEditRole($id)
    {
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.role-setup.edit-role-permission', compact('roles', 'permissions','permission_groups'));

    }
    public function AdminUpdateRole(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions  = $request->permission;

        if (!empty($permissions)) {
           $role->syncPermissions($permissions);
        }
        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    
    }


    public function AdminDeleteRole($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }
        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    

    }
}
