<x-app-layout>
    <x-slot name="header">

         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Lesson to Course: ') }} {{ $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Lesson Creation Form -->
                    <form action="{{ route('admin.lessons.store', $course->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="mt-1 block w-full">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                            <input type="number" name="order" id="order" class="mt-1 block w-full" value="{{ old('order') }}">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Create Lesson</button>
                            <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
