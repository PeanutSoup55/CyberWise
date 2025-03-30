@extends('layouts.admin')

@section('title', 'Edit Lesson: ' . $lesson->title)

@section('admin-content')
    <div class="container py-4">

        <div class="mb-4">
            <h1 class="h4">Edit Lesson: <strong>{{ $lesson->title }}</strong></h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Lesson Title</label>
                        <input type="text" id="title" name="title" class="form-control"
                               value="{{ old('title', $lesson->title) }}" required>
                        @error('title')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control"
                                  rows="3">{{ old('description', $lesson->description) }}</textarea>
                        @error('description')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" id="order" name="order" class="form-control"
                               value="{{ old('order', $lesson->order) }}" required>
                        @error('order')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Lesson</button>
                    <a href="{{ route('admin.lessons.show', $lesson->id) }}" class="btn btn-secondary ms-2">Back to Lesson</a>
                </form>
            </div>
        </div>
    </div>
@endsection
