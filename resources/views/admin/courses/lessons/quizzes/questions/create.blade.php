@extends('layouts.admin')

@section('title', 'Add Question to ' . $quiz->title)

@section('admin-content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">

                <h1 class="h5 mb-4">Add Question to: <strong>{{ $quiz->title }}</strong></h1>

                <form action="{{ route('admin.quizzes.questions.store', $quiz) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="question_text" class="form-label">Question</label>
                        <input type="text" name="question_text" id="question_text" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Options</label>
                        <div id="options-container">
                            <input type="text" name="options[]" class="form-control mb-2" required>
                            <input type="text" name="options[]" class="form-control mb-2" required>
                        </div>
                        <button type="button" onclick="addOption()" class="btn btn-outline-secondary btn-sm mt-2">Add Option</button>
                    </div>

                    <div class="mb-4">
                        <label for="correct_option" class="form-label">Correct Answer</label>
                        <input type="text" name="correct_option" id="correct_option" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Question</button>
                </form>

            </div>
        </div>
    </div>

    <script>
        function addOption() {
            let container = document.getElementById('options-container');
            let input = document.createElement('input');
            input.type = 'text';
            input.name = 'options[]';
            input.className = 'form-control mb-2';
            container.appendChild(input);
        }
    </script>
@endsection
