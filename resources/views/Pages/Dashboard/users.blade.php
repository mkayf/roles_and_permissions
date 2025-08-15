@extends('Pages.Dashboard.Layout.layout')

@section('title', 'Users')

@section('dashboard_content')

<div>
    <h1 class="font-bold text-4xl">Users</h1>
    <div class="my-6">
        <div class="modal-placehoder">
            <!-- Trigger Button -->

<!-- Modal Backdrop -->
<div id="role-assign-modal" class="hidden fixed inset-0 bg-[#0000006b] bg-opacity-80 overflow-y-auto h-full w-full">
  <!-- Modal Container -->
  <form action="">
  <div class="relative top-20 mx-auto p-5 w-96 shadow-xl rounded-md bg-white">
    <!-- Modal Header with Close Button -->
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-lg font-semibold text-gray-800">Assign roles</h3>
      <button 
        onclick="document.getElementById('role-assign-modal').classList.add('hidden')"
        class="text-gray-400 hover:text-gray-500"
      >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Modal Content -->
    <div class="mb-6">
      <input type="hidden" class="modal-id-input" name="user_id" value="">
      <p>User: <span class="modal-user-name"></span></p>
      <div class="mt-4">
        <p>Roles:</p>
        <div class="grid grid-cols-3">
            @foreach($rolesList as $role)
                <div>
                    <input type="checkbox" name="roles[]" value="{{$role}}" id="{{$role}}">
                    <label for="{{$role}}">{{$role}}</label>
                </div>
            @endforeach
        </div>
      </div>
    </div>

    <!-- Modal Footer with Action Buttons -->
    <div class="flex justify-end space-x-3">
      <button 
        onclick="document.getElementById('role-assign-modal').classList.add('hidden')"
        class="px-4 py-2 text-gray-600 hover:text-gray-800 font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition"
      >
        Cancel
      </button>
      <button 
        type="submit"
        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition"
      >
        Save
      </button>
    </div>
  </div>
  </form>
</div>
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
                        <button class="role-assign-btn text-indigo-600 hover:text-indigo-900 mr-3" data-user-id="{{$user->id}}">Assign role</button>
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


