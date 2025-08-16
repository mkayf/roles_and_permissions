@extends('Pages.Dashboard.Layout.layout')

@section('title', 'Permissions')

@section('dashboard_content')
<div>
    <div>
        @if (session('failed') !== null)
        <div class="bg-red-200 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p class="font-bold">Oh no</p>
            <p>{{session('failed')}}</p>
        </div>
        @elseif(session('success') !== null)
        <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{session('success')}}</p>
        </div>    
        @endif
        <form action="{{route('permissions.store')}}" method="post">
            @csrf
            <h3 class="text-3xl font-semibold">Create new permission</h3>
            <div class="mt-4">
                <div>
                    <label for="role_name" class="text-lg block mb-2">Permission name</label>
                    <input id="role_name" type="text" name="permission_name" class="border-1 border-gray-400 rounded-md p-2" placeholder="Enter permission name here" value="{{old('permission_name')}}">
                    <div>
                        @error('permission_name')
                        <small class="text-red-500">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 px-3 py-2 text-white font-medium rounded-md cursor-pointer hover:bg-blue-700">Create permission</button>
            </div>
        </form>
    </div>
    <h1 class="font-bold text-4xl mt-4">Permissions</h1>
    <div class="my-6">
        @if(isset($permissions))
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guard</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($permissions as $permission)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{$permission->id}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{$permission->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$permission->guard_name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$permission->created_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{$permission->updated_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <form action="{{route('permissions.delete', $permission->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <div>
            <h2 class="text-3xl font-semibold text-center">No permissions to show</h2>
        </div>
        @endif
    </div>
</div>
@endsection
