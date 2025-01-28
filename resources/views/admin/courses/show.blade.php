<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Details') }}
        </h2>
        <nav class="space-x-4">
            <a href="{{ route('admin/courses') }}" class="text-gray-800 hover:underline">Courses</a>
            <a href="{{ route('admin/courses/create') }}" class="text-gray-800 hover:underline">Add Course</a>
            <a href="{{ route('admin/users')}}" class="text-gray-800 hover:underline">Users</a>

        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1>{{ $course->name }}</h1>
                        <a href="{{ route('admin/lessons/create', $course->id) }}" class="btn btn-primary">Add Lesson</a>
                    </div> 
                    
                    <p><strong>Description:</strong> {{ $course->description }}</p>
                    <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
                    <p><strong>Order:</strong> {{ $course->order }}</p>

                    <a href="{{ route('admin/courses') }}" class="btn btn-primary">Back to Courses</a>


                    <h2 style="margin-top: 20px">Lessons:</h2>
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($course->lessons as $lesson)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $lesson->title }}</td>
                                    <td class="align-middle">{{ $lesson->description }}</td>
                                    <td class="align-middle">{{ $lesson->order }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin/lessons/show', $lesson->id) }}" class="btn btn-secondary">View</a>
                                            <a href="{{ route('admin/lessons/edit', $lesson->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('admin/lessons/delete', $lesson->id) }}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No lessons available for this course.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

 
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>