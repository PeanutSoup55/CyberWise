@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Quiz Details -->
        <h2 class="text-2xl font-bold mb-4">Manage Quiz: {{ $quiz->title }}</h2>

        <form action="{{ route('admin.lessons.quizzes.update', ['lesson' => $lesson->id, 'quiz' => $quiz->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" value="{{ $quiz->title }}" required
                       class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm">{{ $quiz->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>

        <hr class="my-6">

        <!-- Questions Section -->
        <h3 class="text-xl font-bold mb-3">Quiz Questions</h3>

        @if($quiz->questions->count() > 0)
            <table class="table table-striped">
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
                            <form action="{{ route('admin.quizzes.questions.destroy', ['quiz' => $quiz->id, 'question' => $question->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this question?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">No questions added yet.</p>
        @endif

        <!-- Add Question Button -->
        <a href="{{ route('admin.quizzes.questions.create', ['quiz' => $quiz->id]) }}" class="btn btn-primary mt-4">Add Question</a>
    </div>
@endsection
