<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function usersIndex(){
        $users = User::with('roles')->get();
        return view('pages.dashboard.users', ['users' => $users]);
    }   
    public function rolesIndex(){
        $roles = Role::all();
        // fetch permissions to show in the role creation form:
        $permissions = Permission::all()->pluck('name');
        return view('pages.dashboard.roles', ['roles' => $roles, 'permissions' => $permissions]);
    }

    public function editRoleForm($id){
        // Fetch role with their assigned permissions:

        $role = Role::with('permissions')->find($id);

        if(!$role){
            return $this->rolesIndex();
        }

        $assignedPermissions = $role->permissions->pluck('name')->toArray();

        unset($role->permissions);

        // Fetch new permissions to assign
        $permissions = Permission::all()->pluck('name');

        return view('pages.dashboard.edit_role', ['role' => $role, 'assignedPermissions' => $assignedPermissions, 'permissions' => $permissions]);   

    }

    public function updateRole(Request $request, $id){
        $validation = $request->validate([
            'role_name' => 'required|min:3',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role = Role::findById($id);

        $updatedRole = $role->update(['name' => $validation['role_name']]);

        if($validation['permissions'] !== null){
            $role->syncPermissions($validation['permissions']);
        }

        return redirect()->route('roles.index');
    }

    public function permissionsIndex(){
        return view('pages.dashboard.permissions');
    }

    public function storeRole(Request $request){
        $validation = $request->validate([
            'role_name' => ['required', 'min:3'],
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => ['exists:permissions,name']
        ]);

        $role = Role::create(['name' => $validation['role_name']]);

        $role->syncPermissions($validation['permissions']);

        return redirect()->route('roles.index');
    }
}
