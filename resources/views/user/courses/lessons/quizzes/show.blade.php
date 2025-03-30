@extends('layouts.app')

@section('title', 'Quiz: ' . $quiz->title)

@section('content')
    <div class="container py-5">
        <h1 class="text-3xl font-bold mb-4">🧠 {{ $quiz->title }}</h1>
        <p class="text-gray-600 mb-5">{{ $quiz->description }}</p>

        {{-- Progress bar (static for now) --}}
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Progress</label>
            <div class="w-full bg-gray-200 h-3 rounded">
                <div class="bg-green-400 h-3 rounded" style="width: 0%;"></div>
            </div>
        </div>

        <form action="{{ route('user.quizzes.submit', $quiz->id) }}" method="POST">
            @csrf

            @foreach($quiz->questions as $index => $question)
                <div class="bg-white rounded-lg shadow p-4 mb-6 border-l-4 border-indigo-500">
                    <h5 class="font-semibold text-lg mb-2">
                        🔹 Question {{ $index + 1 }}:
                    </h5>
                    <p class="mb-3 text-gray-800">{{ $question->question }}</p>

                    <div class="grid gap-2">
                        @foreach(json_decode($question->options) as $option)
                            <label class="flex items-center gap-2 bg-indigo-50 hover:bg-indigo-100 transition p-2 rounded cursor-pointer border border-indigo-300">
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" required class="form-radio text-indigo-500">
                                <span>{{ $option }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success w-full mt-4 py-2">
                🚀 Submit Quiz
            </button>
        </form>
    </div>
@endsection
