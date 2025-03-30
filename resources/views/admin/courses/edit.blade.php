@extends('layouts.admin')

@section('title', 'Edit Course')

@section('admin-content')
    <div class="container py-4">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Edit Course</h1>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back to Courses</a>
        </div>

        <form action="{{ route('admin.courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $course->name }}">
                    @error('name')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Description" value="{{ $course->description }}">
                    @error('description')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Difficulty</label>
                    <input type="text" name="difficulty" class="form-control" placeholder="Difficulty" value="{{ $course->difficulty }}">
                    @error('difficulty')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label class="form-label">Order</label>
                    <input type="text" name="order" class="form-control" placeholder="Order" value="{{ $course->order }}">
                    @error('order')
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col d-grid">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
