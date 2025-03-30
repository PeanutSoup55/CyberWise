@extends('layouts.admin')

@section('title', 'Manage Quiz: ' . $quiz->title)

@section('admin-content')
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- Quiz Details -->
                <h2 class="h5 mb-4">Manage Quiz: <strong>{{ $quiz->title }}</strong></h2>

                <form action="{{ route('admin.lessons.quizzes.update', ['lesson' => $lesson->id, 'quiz' => $quiz->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" value="{{ $quiz->title }}" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" class="form-control" rows="3">{{ $quiz->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>

                <hr class="my-5">

                <!-- Questions Section -->
                <h3 class="h6 mb-3">Quiz Questions</h3>

                @if($quiz->questions->count() > 0)
                    <table class="table table-striped align-middle">
                        <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($quiz->questions as $question)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->text }}</td>
                                <td>
                                    <a href="{{ route('admin.quizzes.questions.edit', ['quiz' => $quiz->id, 'question' => $question->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.quizzes.destroy', $quiz->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">No questions added yet.</p>
                @endif

                <a href="{{ route('admin.quizzes.questions.create', ['quiz' => $quiz->id]) }}" class="btn btn-primary mt-4">Add Question</a>
            </div>
        </div>
    </div>
@endsection
