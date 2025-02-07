<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Question to ') . $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded-lg">
                <form action="{{ route('admin.questions.store', $quiz->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Question</label>
                        <input type="text" name="question_text" class="w-full border p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Options</label>
                        <div id="options-container">
                            <input type="text" name="options[]" class="w-full border p-2 mb-2" required>
                            <input type="text" name="options[]" class="w-full border p-2 mb-2" required>
                        </div>
                        <button type="button" onclick="addOption()" class="btn btn-secondary">Add Option</button>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Correct Answer</label>
                        <input type="text" name="correct_option" class="w-full border p-2" required>
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
            input.classList.add('w-full', 'border', 'p-2', 'mb-2');
            container.appendChild(input);
        }
    </script>
</x-app-layout>