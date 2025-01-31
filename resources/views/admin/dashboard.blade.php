<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Courses -->
                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Courses</h3>
                    <p class="text-2xl font-bold">{{ $totalCourses }}</p>
                </div>
                
                <!-- Total Lessons -->
                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Lessons</h3>
                    <p class="text-2xl font-bold">{{ $totalLessons }}</p>
                </div>
                
                <!-- Total Videos -->
                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Videos</h3>
                    <p class="text-2xl font-bold">{{ $totalVideos }}</p>
                </div>
                
                <!-- Total Quizzes -->
                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Quizzes</h3>
                    <p class="text-2xl font-bold">{{ $totalQuizzes }}</p>
                </div>


                <div class="bg-white p-6 shadow rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Users</h3>
                    <p class="text-2xl font-bold">{{ $totalUsers }}</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
