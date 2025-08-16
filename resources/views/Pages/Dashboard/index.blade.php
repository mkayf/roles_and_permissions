@extends('Pages.Dashboard.Layout.layout')

@section('title', 'Dashboard')

@section('dashboard_content')
    <div>
        <h1 class="text-4xl font-bold">Dashboard</h1>
        <div class="my-6 flex items-center justify-center gap-6">
            
            @can('manage users')
            <a href="{{route('users.index')}}">
            <div class="w-[300px] h-56 rounded-lg shadow-lg bg-blue-500 flex items-center p-8">
                <div class="flex flex-col gap-4">
                    <h2 class="font-semibold text-white text-3xl">Users</h2>
                    <h2 class="font-semibold text-white text-4xl">{{$total_users ?? 0}}</h2>
                </div>
            </div>
            </a>
            @endcan
            
            @canany(['manage posts', 'create posts', 'delete own posts', 'edit own posts'])
            <a href="{{route('posts.index')}}">
            <div class="w-[300px] h-56 rounded-lg shadow-lg bg-green-500 flex items-center p-8">
                <div class="flex flex-col gap-4">
                    <h2 class="font-semibold text-white text-3xl">Posts</h2>
                    <h2 class="font-semibold text-white text-4xl">{{$total_posts ?? 0}}</h2>
                </div>
            </div>
            </a>
            @endcanany            

            @role('admin')
            <a href="{{route('roles.index')}}">
            <div class="w-[300px] h-56 rounded-lg shadow-lg bg-yellow-500 flex items-center p-8">
                <div class="flex flex-col gap-4">
                    <h2 class="font-semibold text-white text-3xl">Roles</h2>
                    <h2 class="font-semibold text-white text-4xl">{{$total_roles ?? 0}}</h2>
                </div>
            </div>
            </a>
            @endrole

            @role('admin')
            <a href="{{route('permissions.index')}}">
            <div class="w-[300px] h-56 rounded-lg shadow-lg bg-red-500 flex items-center p-8">
                <div class="flex flex-col gap-4">
                    <h2 class="font-semibold text-white text-3xl">Permissions</h2>
                    <h2 class="font-semibold text-white text-4xl">{{$total_permissions ?? 0}}</h2>
                </div>
            </div>
            </a>
            @endrole

        </div>
    </div>
@endsection