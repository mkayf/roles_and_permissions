 <!-- Responsive Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <!-- Website Logo -->
                        <a href="#" class="flex items-center py-4 px-2">
                            <i class="fas fa-shield-alt text-blue-600 text-2xl mr-2"></i>
                            <span class="font-semibold text-gray-900 text-lg">Roles and Permissions</span>
                        </a>
                    </div>
                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="/" class="py-4 px-2 text-blue-600 border-b-4 border-blue-600 font-semibold">Home</a>
                    </div>
                </div>
                <!-- Secondary Navbar items -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="/login" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-600 hover:text-white transition duration-300">Login</a>
                    <a href="/register" class="py-2 px-2 font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition duration-300">Register</a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-500 hover:text-blue-600"
                            x-show="!showMenu"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="hidden mobile-menu">
            <ul>
                <li class="active"><a href="#" class="block text-sm px-2 py-4 text-white bg-blue-600 font-semibold">Home</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-600 hover:text-white transition duration-300">Features</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-600 hover:text-white transition duration-300">Documentation</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-600 hover:text-white transition duration-300">Pricing</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-600 hover:text-white transition duration-300">Login</a></li>
                <li><a href="#" class="block text-sm px-2 py-4 hover:bg-blue-600 hover:text-white transition duration-300">Register</a></li>
            </ul>
        </div>
    </nav>