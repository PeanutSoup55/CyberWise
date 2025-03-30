{{-- resources/views/layouts/admin-header.blade.php --}}
<div class="bg-gray-800 text-white py-2 px-4 shadow">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <div class="text-sm font-semibold">
            Admin Panel
        </div>
        <nav class="space-x-4 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
            <a href="{{ route('admin.courses.index') }}" class="hover:underline">Courses</a>
            <a href="{{ route('admin.users.index') }}" class="hover:underline">Users</a>
        </nav>
    </div>
</div>
