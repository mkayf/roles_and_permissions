@extends('Pages.Dashboard.Layout.layout')

@section('title', 'Users')

@section('dashboard_content')
<div>
    <h1 class="font-bold text-4xl">Users</h1>
    <div class="my-6">
        @if($users)
            <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{$user->id}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{$user->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$user->email}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$user->roles->pluck('name')->implode(', ')}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$user->created_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-00">
                        {{$user->updated_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Assign role</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                    </td>
                 </tr>
                @endforeach
            </tbody>
        </table>

        @else
            <div>
                <h2 class="text-3xl font-semibold text-center">No users to show</h2>
            </div>
        @endif
    </div>
</div>
@endsection
