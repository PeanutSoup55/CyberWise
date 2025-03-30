<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Left side: Logo + Navigation -->
            <div class="flex items-center space-x-10">
                <!-- Logo -->
                <a href="{{ route('user.dashboard') }}">
                    <img src="{{ asset('images/cw.jpg') }}" alt="Logo" class="w-10 h-10 object-contain">
                </a>

                <!-- Navigation Links -->
                <div class="flex space-x-6 items-center">
                    <a href="{{ route('user.dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Dashboard</a>
                    <a href="{{ route('user.courses.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Courses</a>
                </div>
            </div>

            <!-- Right side: User info -->
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>
                <a href="{{ route('profile.edit') }}" class="text-sm text-gray-500 hover:text-gray-700">Profile</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
