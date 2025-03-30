{{-- resources/views/layouts/admin.blade.php --}}
@extends('layouts.app')

@section('banner')
    @include('layouts.admin-header')
@endsection

@section('content')
    @yield('admin-content')
@endsection
