@extends('layouts.admin')

@section('title', 'Analytics Dashboard')

@section('admin-content')
    <div class="container">
        <h2 class="text-2xl font-semibold mb-6">Analytics Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Courses -->
            <div class="bg-white p-6 shadow rounded-lg text-center">
                <h3 class="text-lg font-semibold">Total Courses</h3>
                <p class="text-2xl font-bold">{{ $totalCourses ?? 'N/A' }}</p>
            </div>

            <!-- Total Lessons -->
            <div class="bg-white p-6 shadow rounded-lg text-center">
                <h3 class="text-lg font-semibold">Total Lessons</h3>
                <p class="text-2xl font-bold">{{ $totalLessons ?? 'N/A' }}</p>
            </div>

            <!-- Total Videos -->
            <div class="bg-white p-6 shadow rounded-lg text-center">
                <h3 class="text-lg font-semibold">Total Videos</h3>
                <p class="text-2xl font-bold">{{ $totalVideos ?? 'N/A' }}</p>
            </div>

            <!-- Total Quizzes -->
            <div class="bg-white p-6 shadow rounded-lg text-center">
                <h3 class="text-lg font-semibold">Total Quizzes</h3>
                <p class="text-2xl font-bold">{{ $totalQuizzes ?? 'N/A' }}</p>
            </div>

            <!-- Total Users -->
            <div class="bg-white p-6 shadow rounded-lg text-center">
                <h3 class="text-lg font-semibold">Total Users</h3>
                <p class="text-2xl font-bold">{{ $totalUsers ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
@endsection
