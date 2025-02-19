<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Courses</h1>
                        <a href="{{ route('admin/courses/create') }}" class="btn btn-primary">Add Course</a>
                    </div> 
                    <hr />
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                        </div>
                        @endif
                        <table class="table table-hover">
                        <thead class="table-primary">
                        <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Difficulty</th>
                        <th>Order</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($courses as $course)
                        <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $course->name }}</td>
                        <td class="align-middle">{{ $course->description }}</td>
                        <td class="align-middle">{{ $course->difficulty }}</td>        
                                                    <td class="align-middle">{{ $course->order }}</td>
                        <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin/courses/edit', ['id'=>$course->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('admin/courses/delete', ['id'=>$course->id]) }}" type="button" class="btn btn-danger">Delete</a>
                        <a href="{{ route('admin/courses/show', ['id' => $course->id]) }}" class="btn btn-info">View Details</a>

                        </div>
                        </td>
                        </tr>
                        @empty
                        <tr>
                        <td class="text-center" colspan="5">Course not found</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>