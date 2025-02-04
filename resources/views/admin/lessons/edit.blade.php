<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lesson: ') }} {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Edit Lesson</h1>

                    <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                            <input type="text" id="title" name="title" class="form-input mt-1 block w-full" value="{{ old('title', $lesson->title) }}" required>
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" class="form-input mt-1 block w-full">{{ old('description', $lesson->description) }}</textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                            <input type="number" id="order" name="order" class="form-input mt-1 block w-full" value="{{ old('order', $lesson->order) }}" required>
                            @error('order') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Lesson</button>
                    </form>

                    <a href="{{ route('admin.lessons.show', $lesson->id) }}" class="btn btn-secondary mt-4">Back to Lesson</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>