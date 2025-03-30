@extends('layouts.admin')

@section('title', 'Create Quiz for Lesson: ' . $lesson->title)

@section('admin-content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="h5 mb-4">Create Quiz for Lesson: <strong>{{ $lesson->title }}</strong></h1>

                <form action="{{ route('admin.lessons.quizzes.store', $lesson) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Quiz Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Quiz</button>
                </form>
            </div>
        </div>
    </div>
@endsection
