<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Video to Lesson: ') }} {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Add Video</h1>

                    <form action="{{ route('admin/lessons/videos/store', $lesson->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Video Title</label>
                            <input type="text" id="title" name="title" class="form-input mt-1 block w-full" value="{{ old('title') }}" required>
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="video" class="block text-sm font-medium text-gray-700">Upload Video</label>
                            <input type="file" id="video" name="video" class="form-input mt-1 block w-full" accept="video/mp4" required>
                            @error('video') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                            <input type="number" id="order" name="order" class="form-input mt-1 block w-full" value="{{ old('order') }}" required>
                            @error('order') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save Video</button>
                    </form>

                    <a href="{{ route('admin/lessons/show', $lesson->id) }}" class="btn btn-secondary mt-4">Back to Lesson</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>