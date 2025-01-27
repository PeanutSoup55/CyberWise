<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Courses') }}
        </h2>
        <nav class="space-x-4">
            <a href="{{ route('admin/courses') }}" class="text-gray-800 hover:underline">Courses</a>
            <a href="{{ route('admin/courses/create') }}" class="text-gray-800 hover:underline">Add Course</a>
            <a href="{{ route('admin/users')}}" class="text-gray-800 hover:underline">Users</a>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

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
                        <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                        <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>    
                        </td>
                        </tr>
                        @empty
                        <tr>
                        <td class="text-center" colspan="5">User not found</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>