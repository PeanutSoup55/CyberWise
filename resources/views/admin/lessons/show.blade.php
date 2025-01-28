<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lesson Details: ') }} {{ $lesson->title }}
        </h2>

        <nav class="space-x-4">
            <a href="{{ route('admin/courses') }}" class="text-gray-800 hover:underline">Courses</a>
            <a href="{{ route('admin/courses/create') }}" class="text-gray-800 hover:underline">Add Course</a>
            <a href="{{ route('admin/users')}}" class="text-gray-800 hover:underline">Users</a>

        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>{{ $lesson->title }}</h1>
                    <p><strong>Description:</strong> {{ $lesson->description }}</p>
                    <p><strong>Order:</strong> {{ $lesson->order }}</p>

                    <h2>Videos:</h2>
                    <ul>
                        @foreach($lesson->videos as $video)
                            <li>{{ $video->title }} - <a href="{{ $video->url }}" target="_blank">Watch</a></li>
                        @endforeach
                    </ul>

                    @if($lesson->quiz)
                        <h2>Quiz:</h2>
                        <p>{{ $lesson->quiz->title }}</p>
                        <a href="{{ route('admin.courses.lessons.quizzes.show', $lesson->quiz->id) }}">Take Quiz</a>
                    @else
                        <p>No quiz available for this lesson.</p>
                    @endif

                    <a href="{{ route('admin/courses/show', $lesson->course->id) }}" class="btn btn-primary">Back to Course</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>