@extends('layouts.admin')

@section('title', 'Lesson: ' . $lesson->title)

@section('admin-content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h4 mb-0">{{ $lesson->title }}</h1>
            <a href="{{ route('admin.courses.show', $lesson->course_id) }}" class="btn btn-secondary">Back to Course</a>
        </div>

        <p><strong>Description:</strong> {{ $lesson->description }}</p>
        <p><strong>Order:</strong> {{ $lesson->order }}</p>

        <h2 class="h5 mt-4">Videos</h2>
        <ul class="list-unstyled mb-4">
            @foreach($lesson->videos as $video)
                <li class="mb-3">
                    <strong>{{ $video->title }}</strong><br>
                    <video controls width="640" height="360" class="mt-2">
                        <source src="{{ asset('storage/' . $video->url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('admin.lessons.videos.create', $lesson) }}" class="btn btn-primary mb-5">Add Video</a>

        <div class="p-4 bg-light border rounded shadow-sm">
            <h2 class="h5 mb-3">Lesson Quiz</h2>

            @if($lesson->quiz)
                <div class="p-3 border bg-white rounded">
                    <p class="fw-semibold">{{ $lesson->quiz->title }}</p>
                    <p class="text-muted">{{ $lesson->quiz->description ?? 'No description provided.' }}</p>

                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('admin.lessons.quizzes.show', [$lesson->id, $lesson->quiz->id]) }}" class="btn btn-secondary">Take Quiz</a>
                        <a href="{{ route('admin.lessons.quizzes.edit', [$lesson->id, $lesson->quiz->id]) }}" class="btn btn-warning">Manage Quiz</a>

                        <form action="{{ route('admin.lessons.quizzes.destroy', [$lesson->id, $lesson->quiz->id]) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Quiz</button>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-muted mb-3">No quiz exists for this lesson.</p>
                <a href="{{ route('admin.lessons.quizzes.create', $lesson) }}" class="btn btn-primary">Create Quiz</a>
            @endif
        </div>
    </div>
@endsection
