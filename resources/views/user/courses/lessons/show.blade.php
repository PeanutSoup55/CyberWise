@extends('layouts.app')

@section('title', $lesson->title)

@section('content')
    <div class="container py-5">
        <a href="{{ route('user.courses.show', $lesson->course->id) }}" class="text-sm text-blue-500 hover:underline mb-4 inline-block">
            ← Back to Course
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left column: Lesson content --}}
            <div class="lg:col-span-2">
                <h1 class="text-3xl font-bold mb-4">{{ $lesson->title }}</h1>

                <div class="prose max-w-none bg-white p-6 rounded-lg shadow">
                    {!! $lessonContent !!}
                </div>

                {{-- Navigation controls for slides/pages (if needed) can go here --}}
            </div>

            {{-- Right column: Sidebar (optional) --}}
            <div class="hidden lg:block space-y-4">
                <div class="bg-white p-4 shadow rounded-lg">
                    <p class="text-sm text-gray-600 mb-2">Lesson Progress</p>
                    <div class="w-full bg-gray-200 h-2 rounded">
                        <div class="bg-blue-500 h-2 rounded" style="width: 45%;"></div>
                    </div>
                </div>

                <div class="bg-white p-4 shadow rounded-lg">
                    <p class="text-sm mb-2">Up Next:</p>
                    <p class="font-medium">{{ $nextLessonTitle ?? 'No next lesson' }}</p>
                    <a href="#" class="text-blue-500 text-sm hover:underline">Jump to Lesson</a>
                </div>

                @if($lesson->quiz)
                    <div class="bg-yellow-100 p-4 rounded-lg">
                        <p class="mb-2 text-sm">Ready to test yourself?</p>
                        <a href="{{ route('user.quizzes.show', $lesson->quiz->id) }}" class="btn btn-warning w-full">Take Quiz</a>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
