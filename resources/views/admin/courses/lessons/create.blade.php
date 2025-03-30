@extends('layouts.admin')

@section('title', 'Add Lesson to Course: ' . $course->name)

@section('admin-content')
    <div class="container py-4">

        <div class="mb-4">
            <h1 class="h4">Add Lesson to: <strong>{{ $course->name }}</strong></h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.courses.lessons.store', $course->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Lesson Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" name="order" id="order" class="form-control" value="{{ old('order') }}">
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary">Create Lesson</button>
                        <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
