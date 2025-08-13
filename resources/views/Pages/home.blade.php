@extends('Layout.app')

@section('title', 'Roles and Permissions using Laravel Spatie')

@section('content')
<!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Laravel Roles & Permissions</h1>
            <p class="text-xl md:text-2xl mb-12 max-w-3xl mx-auto">Powerful user access control with Spatie's Laravel Permission package</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#" class="bg-white text-blue-800 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition duration-300">Get Started</a>
                <a href="#" class="border-2 border-white px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-blue-800 transition duration-300">Documentation</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Powerful Access Control Features</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-user-tag text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Role Management</h3>
                    <p class="text-gray-600">Easily create and assign roles to users. Define hierarchical relationships between roles for complex permission structures.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-key text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Permission Control</h3>
                    <p class="text-gray-600">Granular permission system that allows you to control exactly what each user can do within your application.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-code-branch text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Middleware Integration</h3>
                    <p class="text-gray-600">Built-in middleware to protect routes based on roles or permissions. Simple to implement with clean syntax.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Code Example Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Simple Implementation</h2>
            <div class="bg-gray-800 rounded-lg overflow-hidden shadow-xl max-w-4xl mx-auto">
                <div class="bg-gray-700 px-4 py-3 flex items-center">
                    <div class="flex space-x-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <div class="ml-4 text-sm text-gray-300">app/Http/Controllers/UserController.php</div>
                </div>
                <div class="p-6 overflow-x-auto">
                    <pre class="text-gray-300 text-sm md:text-base">
<code><span class="text-blue-400">use</span> Spatie\Permission\Models\Role;
<span class="text-blue-400">use</span> Spatie\Permission\Models\Permission;

<span class="text-green-500">// Create roles and permissions</span>
$role = Role::create(['name' => 'writer']);
$permission = Permission::create(['name' => 'edit articles']);

<span class="text-green-500">// Assign permission to role</span>
$role->givePermissionTo($permission);

<span class="text-green-500">// Assign role to user</span>
$user->assignRole('writer');

<span class="text-green-500">// Check permissions</span>
$user->can('edit articles'); <span class="text-gray-500">// Returns true</span></code></pre>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-blue-700 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to implement secure access control?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Start managing user permissions in your Laravel application today with Spatie's proven package.</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#" class="bg-white text-blue-800 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition duration-300">Register Now</a>
                <a href="#" class="border-2 border-white px-8 py-3 rounded-lg font-bold hover:bg-blue-800 hover:border-blue-800 transition duration-300">Learn More</a>
            </div>
        </div>
    </section>

@endsection