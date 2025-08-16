<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index(Request $request){

        $user = $request->user();

        $users = User::count();

        if(!$request->user()->hasRole('admin')){
            $posts = Post::where('user_id', $user->id)->count();
        } else{
            $posts = Post::count();
        }
        $roles = Role::count();
        $permissions = Permission::count();


        // return [
        //     'total_users' => $users,
        //     'total_posts' => $posts,
        //     'total_roles' => $roles,
        //     'total_permissions' => $permissions
        // ];

        return view('pages.dashboard.index', [
            'total_users' => $users,
            'total_posts' => $posts,
            'total_roles' => $roles,
            'total_permissions' => $permissions
        ]);
    }
}
