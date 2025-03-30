@extends('layouts.admin')

@section('title', 'Take Quiz: ' . $quiz->title)

@section('admin-content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">

                <h1 class="h5 mb-4">Take Quiz: <strong>{{ $quiz->title }}</strong></h1>

                <form action="{{ route('admin.quizzes.submit', $quiz->id) }}" method="POST">
                    @csrf

                    @foreach($quiz->questions as $question)
                        <div class="mb-4">
                            <p class="fw-semibold">{{ $question->question }}</p>
                            @foreach(json_decode($question->options) as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="answers[{{ $question->id }}]"
                                           value="{{ $option }}"
                                           id="q{{ $question->id }}_{{ $loop->index }}" required>
                                    <label class="form-check-label" for="q{{ $question->id }}_{{ $loop->index }}">
                                        {{ $option }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary mt-3">Submit Quiz</button>
                </form>

            </div>
        </div>
    </div>
@endsection
