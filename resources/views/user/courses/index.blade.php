@extends('layouts.app')

@section('title', 'Browse Courses')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Explore Courses</h1>

        <div class="row g-2">
            @foreach ($courses as $course)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        {{-- Optional thumbnail slot --}}
                        <div class="ratio ratio-16x9 bg-light">
                            {{-- If you have course thumbnails in the future, drop them here --}}
                            {{-- <img src="{{ asset('storage/' . $course->thumbnail) }}" class="card-img-top" alt="{{ $course->name }}"> --}}
                            <div class="d-flex align-items-center justify-content-center text-muted fw-bold">
                                Thumbnail
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge bg-info text-dark">difficulty : {{ ucfirst($course->difficulty) }}</span>
                            </div>

                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text text-muted small">
                                {{ $course->description }}
                            </p>

                            <div class="mt-auto">
                                <a href="{{ route('user.courses.show', $course->id) }}" class="btn btn-primary btn-sm w-100">
                                    View Course
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
