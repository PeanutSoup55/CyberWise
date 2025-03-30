@extends('layouts.admin')

@section('title', 'All Users')

@section('admin-content')
    <div class="container py-4">
        @if(Session::has('success'))
            <div class="alert alert-success mb-4" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white font-semibold">
                User List
            </div>
            <div class="card-body p-0">
                <table class="table mb-0 table-hover">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.destroy', $user) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No users found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
