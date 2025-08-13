@vite('resources/css/app.css');


<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl my-10">
    <div class="p-8">
        <div class="flex items-center justify-center mb-6">
            <i class="fas fa-sign-in-alt text-blue-600 text-4xl mr-3"></i>
            <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
        </div>
        
        <form class="mt-8 space-y-6" method="post" action="{{route('login-user')}}">
        @csrf
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required 
                        class="pl-10 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                        focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="your@email.com">
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                        class="pl-10 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                        focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="••••••••">
                </div>
            </div>

            

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm 
                    text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Sign In
                </button>
            </div>

           

            <!-- Register Link -->
            <div class="text-center text-sm text-gray-600">
                Don't have an account? 
                <a href="/register" class="font-medium text-blue-600 hover:text-blue-500">
                    Register now
                </a>
            </div>
        </form>
    </div>
</div>