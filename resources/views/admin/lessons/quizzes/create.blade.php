<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Quiz for Lesson: ') . $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded-lg">
                <form action="{{ route('admin.quizzes.store', $lesson->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Quiz Title</label>
                        <input type="text" name="title" class="w-full border p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <input type="text" name="description" class="w-full border p-2" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Quiz</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>