<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogIn()
    {
        return view('admin.admin-login');
    }
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin-profile-view', compact('profileData'));
    }
    public function AdminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $profileData->username = $request->username;
        $profileData->name = $request->name;
        $profileData->email = $request->email;
        $profileData->phone = $request->phone;
        $profileData->address = $request->address;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin-images/'.$profileData->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin-images'),$filename);
            $profileData['photo'] = $filename;
        }
        $profileData->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function AdminCangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin-change-password', compact('profileData'));
    }
    public function AdminUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        // Hash the old password
        if (!Hash::check($request->old_password, auth::user()->password )) {
            $notification = array(
                'message' => 'Old Password Does Not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        
        $notification = array(
            'message' => ' Password Change Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);


        return view('admin.admin-change-password', compact('profileData'));
    }


    // ////////Admin Manage all Method ////////////////////
    
    public function AllAdmin()
    {
        $allAdmin = User::where('role','admin')->get();
        return view('backend.pages.admin.all-admin', compact('allAdmin'));
    }
    public function AddAdmin()
    {
        $roles = Role::all();
        $permission = Permission::all();
        return view('backend.pages.admin.add-admin', compact('roles'));
    }
    public function StoreAdmin(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->password = Hash::make($request->password);
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin-images/'.$user->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin-images'),$filename);
            $user['photo'] = $filename;
        }
        $user->save();

        if ($request->roles) {
           $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function EditAdmin($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permission = Permission::all();
        return view('backend.pages.admin.edit-admin', compact('roles', 'user'));
    }

    public function UpdateAdmin(Request $request, $id)
    {
        $user = User::findorFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();


        $user->roles()->detach();
        if ($request->roles) {
           $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(!is_null($user)){
            $user->delete();
        }

        $notification = array(
            'message' => ' Admin Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    
    }
    
}
