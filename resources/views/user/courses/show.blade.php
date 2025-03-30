@extends('layouts.app')

@section('title', $course->name)

@section('content')
    <div class="container py-5">
        <div class="mb-4">
            <h1 class="mb-1">{{ $course->name }}</h1>
            <span class="badge bg-info text-dark">Difficulty: {{ ucfirst($course->difficulty) }}</span>
            <p class="text-muted mt-2">{{ $course->description }}</p>
        </div>

        <hr>

        <div class="mb-4">
            <h4>Lessons</h4>

            @if ($course->lessons->isEmpty())
                <p class="text-muted">No lessons available for this course yet.</p>
            @else
                <div class="list-group">
                    @foreach ($course->lessons->sortBy('order') as $lesson)
                        <a href="{{ route('user.courses.lessons', $lesson->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $lesson->title }}</strong>
                                <p class="mb-0 small text-muted">{{ $lesson->description }}</p>
                            </div>
                            <span class="badge bg-primary">Start</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        <a href="{{ route('user.courses.index') }}" class="btn btn-outline-secondary mt-3">← Back to Courses</a>
    </div>
@endsection
