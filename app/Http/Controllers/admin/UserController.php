<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;

class UserController extends Controller
{
  public function userList()
  {
    $roles = Role::all();
    $users = DB::table('admins')
      ->leftjoin('roles', 'roles.id', '=', 'admins.role')
      ->select('admins.*', 'roles.name')
      ->paginate(10);

    return view('admin.modules.people.users.userList')->with([
      'users' => $users,
      'roles' => $roles,
    ]);
  }
  //save a new user

  public function saveUser(Request $request)
  {
    $request->validate([
      'first_name' => 'required',
      'last_name' => 'required',
      'username' => 'required',
      'email' => 'required',
      'password' => 'confirmed',

    ]);

    $admin = new Admin;
    $admin->first_name = $request->first_name;
    $admin->last_name = $request->last_name;
    $admin->email = $request->email;
    $admin->username = $request->username;
    $admin->role = $request->role;
    $admin->password = Hash::make($request->password);
    try {
      $admin->save();
      $user_id = $admin->id;
      $user = Admin::where('id', $user_id)->first();
      $role = Role::where('id', $request->role)->first();
      $user->assignRole($role);
      Toastr::success('A new user added successfully.');
      return redirect()->route('admin.userList');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  public function viewUser($id)
  {
    $user = Admin::find($id);
    return response()->json([
      'status' => 200,
      'User' => $user,
    ]);
  }

  public function editUser($id)
  {

    $users = Admin::find($id);
    // $role=Role::where('id','=',$users->role)->first('name');

    //  return view('admin.modules.people.users.userList')->with([
    //   'users'=>$users,
    //   'roles'=>$roles,
    // ]);
    return response()->json([
      'status' => 200,
      'user' => $users,
      // 'roles'=> $role,
    ]);
  }

  public function userUpdate(Request $request)
  {
    $request->validate([
      'first_name' => 'required',
      'last_name' => 'required',
      'username' => 'required',
      'email' => 'required',
      'password' => 'confirmed',

    ]);

    $id = $request->user_id;
    $admin = Admin::find($id);
    $admin->first_name = $request->first_name;
    $admin->last_name = $request->last_name;
    $admin->email = $request->email;
    $admin->username = $request->username;
    $admin->role = $request->role;
    try {
      $admin->update();
      $user_id = $admin->id;
      $user = Admin::where('id', $user_id)->first();
      $role = Role::where('id', $request->role)->first();
      $user->assignRole($role);
      Toastr::success('User Updated successfully.');
      return redirect()->route('admin.userList');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  public function deleteUser(Request $request)
  {
    $request->validate(
      [
        'id' => 'required|numeric'
      ]
    );
    try {
      DB::table('admins')->where('id', $request->id)->delete();
      Toastr::success('User deleted successfully');
      return redirect()->route('admin.userList');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }


  //roles list
  public function roles()
  {
    $permission = Permission::where('id', 2)->get();
    $role = Role::where('id', 1)->get();
    $roles = Role::all();
    return view('admin.modules.people.users.rolesList')->with([
      'roles' => $roles,
    ]);
  }
  //save /add new role
  public function saveRole(Request $request)
  {
    $name = $request->name;
    try {
      Role::create(['name' => $name]);
      Toastr::success('A new user role added successfully');
      return redirect()->route('admin.users.roles');
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }
  //permission list
  public function permissions()
  {
    //Permission::create(['name' => 'delete product','admin']);

    $permissions = Permission::paginate(30);
    return view('admin.modules.people.users.permissionsList')->with([
      'permissions' => $permissions,
    ]);
  }
  public function getpermission($role, $permissionid)
  {
    $permission = DB::table('role_has_permissions')
      ->where('permission_id', $permissionid)
      ->where('role_id', $role)
      ->value('role_id');
    if (!empty($permission)) {
      return 1;
    } else {
      return 0;
    }
  }
  //list of roles permission 
  public function RolePermissions($id)
  {
    $roleInfo = Role::where('id', $id)->first();
    $allPermission = DB::table('permissions')
      ->select('id', 'name')->get();
    return view('admin.modules.people.users.changepermissions')->with([
      'allPermission' => $allPermission,
      'roleInfo' => $roleInfo,
    ]);
  }
  //update role permission
  public function updatePermission(Request $request)
  {
    $role = Role::where('id', $request->role_id)->first();
    $role->syncPermissions();
    if (!empty($request->permission)) {
      foreach ($request->permission as $permission) {
        $permissionAdd = Permission::where('id', $permission)->first();
        $role->givePermissionTo($permissionAdd);
      }
    } else {
      $role->syncPermissions();
    }
    Toastr::success('Permission Update Successfully.');
    return redirect()->route('admin.users.roles');
  }


  //admin profile details
  public function profile()
  {
    $id = Auth::user()->id;
    $admin = Admin::where('id', $id)->first();
    return view('admin.modules.setting.profile.profile')->with(['admin' => $admin]);
  }
  //upload image
  protected function imageUpload($request)
  {
    $productImage = $request->file('image');
    $imageName = $productImage->getClientOriginalName();
    $directory = 'public/uploads/profile_image/';
    $imageUrl = $directory . $imageName;

    Image::make($productImage)->resize(80, 80)->save($imageUrl);

    return $imageUrl;
  }
  //update admin profile
  public function updateProfile(Request $request)
  {
    $id = Auth::user()->id;
    if ($request->file('image') !== null) {
      $image = $this->imageUpload($request);
    } else {
      $image = DB::table('admins')->where('id', $request->id)->value('image');
    }
    try {
      DB::table('admins')->where('id', $id)
        ->update([
          'first_name' => $request->first_name,
          'email' => $request->email,
          'last_name' => $request->last_name,
          'username' => $request->username,
          'mobile' => $request->mobile,
          'image' => $image,

        ]);
      Toastr::success('Profile Updated Successfully.');
      return redirect()->route('admin.profile', $request->id);
    } catch (\Exception $e) {
      session()->flash('error-message', $e->getMessage());
      return redirect()->back();
    }
  }

  //update password
  public function updatepassword(Request $request)
  {

    $request->validate([
      'password' => 'confirmed|required',

    ]);
    $id = Auth::user()->id;
    //$old_password=Hash::make($request->old_password);
    $new_password = Hash::make($request->password);
    $oldPassworddb = DB::table('admins')->where('id', $id)->value('password');
    if (Hash::check($request->old_password, $oldPassworddb)) {
      DB::table('admins')->where('id', $id)->update(['password' => $new_password]);
      Toastr::success('Password Updated successfully.');
      return redirect()->route('admin.profile');
    } else {
      Toastr::error('Password is wrong');
      return redirect()->back();
    }
  }
}
