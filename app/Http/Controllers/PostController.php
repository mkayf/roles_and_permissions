<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function postsForReaders(){
        return view('pages.posts');
    }

    public function index(Request $request)
    {   
        $user = $request->user();
        // $userRoles = $user->roles->pluck('name')->toArray();

        // Check if user has admin role then fetch all the posts to manage:
        if($user->can(['manage posts', 'view posts'])){
            $posts = Post::with('user')->get();
            return view('pages.dashboard.posts', ['posts' => $posts]);
            // $users = [];
            // foreach($posts as $post){
            //     $users[] = $post->user;
            // }
            // return ['posts' => $posts];
        }

        // Check if user has writer role then fetch his own posts only to manage:
        if($user->can(['create posts', 'delete own posts', 'edit own posts'])){
            return view('pages.dashboard.posts', ['user' => $user, 'posts' => $user->posts]);


            // return ['user' => $user, 'posts' => ];
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
