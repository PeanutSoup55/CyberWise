<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Take Quiz: ') . $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded-lg">
                <form action="{{ route('admin.quizzes.submit', $quiz->id) }}" method="POST">
                    @csrf
                    @foreach($quiz->questions as $question)
                        <div class="mb-4">
                            <p class="font-semibold">{{ $question->question }}</p>
                            @foreach(json_decode($question->options) as $option)
                                <label class="block">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" required>
                                    {{ $option }}
                                </label>
                            @endforeach
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit Quiz</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>