@extends('layouts.admin')

@section('content')


    <x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lesson Details: ') }} {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1>{{ $lesson->title }}</h1>
                        <a href="{{ route('admin.courses.show', $lesson->course_id) }}" class="btn btn-primary">Back to Course</a>
                    </div>

                    <p><strong>Description:</strong> {{ $lesson->description }}</p>
                    <p><strong>Order:</strong> {{ $lesson->order }}</p>

                    <h2>Videos:</h2>
                    <ul>
                        @foreach($lesson->videos as $video)
                            <li>
                                <strong>{{ $video->title }}</strong> -
                                <video controls width="640" height="480">
                                    <source src="{{ asset('storage/' . $video->url) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('admin.lessons.videos.create', $lesson) }}" class="btn btn-primary">Add Video</a>


                    <div class="mt-8 p-6 bg-white shadow rounded-lg">
                        <h2 class="text-xl font-bold mb-4">Lesson Quiz</h2>

                        @if($lesson->quiz)
                            <div class="border p-4 rounded-lg bg-gray-100">
                                <p class="text-lg font-medium">{{ $lesson->quiz->title }}</p>
                                <p class="text-sm text-gray-600">{{ $lesson->quiz->description ?? 'No description provided.' }}</p>

                                <div class="mt-4 flex space-x-3">
                                    <a href="{{ route('admin.lessons.quizzes.show', [$lesson->id, $lesson->quiz->id]) }}" class="btn btn-secondary">Take Quiz</a>
                                    <a href="{{ route('admin.lessons.quizzes.edit', [$lesson->id, $lesson->quiz->id]) }}" class="btn btn-warning">Manage Quiz</a>

                                    <form action="{{ route('admin.lessons.quizzes.destroy', [$lesson->id, $lesson->quiz->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Quiz</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <p class="text-gray-600">No quiz exists for this lesson.</p>
                            <a href="{{ route('admin.lessons.quizzes.create', $lesson) }}" class="btn btn-primary mt-4">Create Quiz</a>
                        @endif
                    </div>


                    <a href="{{ route('admin.lessons.quizzes.create', $lesson) }}" class="btn btn-primary mt-3">Create Quiz</a>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endsection
