@extends('layouts.admin')

@section('title', 'Course Details')

@section('admin-content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">{{ $course->name }}</h1>
            <a href="{{ route('admin.courses.lessons.create', $course) }}" class="btn btn-primary">Add Lesson</a>
        </div>

        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
        <p><strong>Order:</strong> {{ $course->order }}</p>

        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary mb-4">Back to Courses</a>

        <h2 class="h5 mb-3">Lessons</h2>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
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
                            <td class="align-middle">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.lessons.show', $lesson) }}" class="btn btn-secondary">View</a>
                                    <a href="{{ route('admin.lessons.edit', $lesson) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.lessons.destroy', $lesson) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this lesson?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Lesson</button>
                                    </form>
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
@endsection
