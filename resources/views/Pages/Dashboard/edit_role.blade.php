@extends('Pages.Dashboard.Layout.layout')

@section('title', 'Edit role')

@section('dashboard_content')
    <div>
        <div>            
        <form action="{{route('roles.update', $role->id)}}" method="post">
            @csrf
            @method('put')
        <h3 class="text-3xl font-semibold">Edit role</h3>
        <div class="mt-4">
            <div>
                <label for="role_name" class="text-lg block mb-2">Role name</label>
                <input id="role_name" type="text" name="role_name" class="border-1 border-gray-400 rounded-md p-2" placeholder="Enter role name here" value="{{$role->name}}">
                <div>
                @error('role_name')
                    <small class="text-red-500">{{$message}}</small>
                @enderror
                </div>
            </div>
            <div class="w-full mt-4">
                <span class="text-lg">Assign permissions</span>
                <div class="mt-2 border-1 border-gray-400 rounded-md p-4 w-[600px] grid grid-cols-3">
                    @if($permissions)
                        @foreach ($permissions as $permission)
                            <div>
                                <input type="checkbox" name="permissions[]" id="{{$permission}}" value="{{$permission}}" 
                                {{in_array($permission, $assignedPermissions) ? 'checked' : ''}}
                                >
                                <label for="{{$permission}}">{{$permission}}</label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div>
            @error('permissions.*')
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 px-3 py-2 text-white font-medium rounded-md cursor-pointer hover:bg-blue-700">Update role</button>
        </div>
     </form>
    </div>
    </div>
@endsection