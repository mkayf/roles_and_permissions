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
        // Fetch roles to assign to users
        $roles = Role::all()->pluck('name');
        return view('pages.dashboard.users', ['users' => $users, 'rolesList' => $roles]);
    }   

    public function deleteUser($id){
        $user = User::find($id);

        if(!$user){
             return redirect()->route('users.index')->with('failed', 'No user found with this ID');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User data deleted successfully');
        
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

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function assignRoleToUser(Request $request){
        $validation = $request->validate([
            'user_id' => 'required|numeric|min:1',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name'
        ]);

        $user = User::find($validation['user_id']);

        if(!$user){
            return redirect()->route('users.index')->with('failed', 'No user found with this ID');
        }

        $user->assignRole($validation['roles']);

        return redirect()->route('users.index')->with('success', 'Roles: ' . implode(", ", $validation['roles']) . ' assigned successfully to ' . $user->name);
    }

    public function storeRole(Request $request){
        $validation = $request->validate([
            'role_name' => ['required', 'min:3'],
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => ['exists:permissions,name']
        ]);

        $role = Role::create(['name' => $validation['role_name']]);

        $role->syncPermissions($validation['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function deleteRole($id){
        $role = Role::findById($id);

        if(!$role){
            return redirect()->route('roles.index')->with('failed', 'Failed to delete role.')->withInput();
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }

    public function permissionsIndex(){
        $permissions = Permission::all();
        return view('pages.dashboard.permissions', [
            'permissions' => $permissions
        ]);
    }

    public function storePermission(Request $request){
        $validation = $request->validate([
            'permission_name' => 'required|string|min:3'
        ]);

        $permission = Permission::create(['name' => $validation['permission_name']]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
    }

    public function deletePermission($id){
        $permission = Permission::findById($id);

        if(!$permission){
            return redirect()->route('permissions.index')->with('failed', 'Failed to delete permission.')->withInput();
        }

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission  deleted successfully');
    }
}
