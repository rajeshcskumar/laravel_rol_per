<?php

use Illuminate\Support\Facades\Route;

use App\Models\{
    User,
    Role,
    Permission
};

Route::get('/', function () {

    // !Admin Role
    // $admin = User::whereName('Admin')->first();
    // $admin = User::whereName('Admin')->with('roles')->first();
    // if ($admin->hasRoles('admin')) {
    //     dd('Yes');
    // }
    // $admin_role = Role::whereName('admin')->first();
    // $admin->roles()->attach($admin_role);
    // dd($admin->toArray());
    // !User Roles
    // $user = User::whereName('User')->first();
    // $user = User::whereName('User')->with('roles')->first();
    // if ($user->hasRoles('user')) {
    //     dd('Yes');
    // }
    // $user_role = Role::whereName('user')->first();
    // $user->roles()->attach($user_role);
    // dd($user->toArray());

    // !Permission To Admin
    // $add_user_permission = Permission::where('name', 'view_user')->first();
    // $admin_role = Role::whereName('admin')->with('permissions')->first();
    // $admin_role->permissions()->attach($add_user_permission);
    // dd($admin_role->toArray());
    // !Permission To User
    // $add_user_permission = Permission::where('name', 'view_user')->first();
    // $admin_role = Role::whereName('user')->with('permissions')->first();
    // $admin_role->permissions()->attach($add_user_permission);
    // dd($admin_role->toArray());

    // !Extra Queries
    $user = User::select('id', 'name', 'email')
        ->with(['roles:id,name', 'roles.permissions:id,name'])
        ->get();
    dd($user[1]->roles->flatMap->permissions->toArray());
});
