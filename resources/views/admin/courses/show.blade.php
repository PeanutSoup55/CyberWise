<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>{{ $course->name }}</h1>
                    <p><strong>Description:</strong> {{ $course->description }}</p>
                    <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
                    <p><strong>Order:</strong> {{ $course->order }}</p>
                    <a href="{{ route('admin/courses') }}" class="btn btn-primary">Back to Courses</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>