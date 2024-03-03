@extends('layout.authlayout')

@section('content')

@include('layout.header')

@include('layout.nav')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 shadow-md rounded-md max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6">Admin Registration</h2>
            <form method="POST" action="{{ url('/admin/register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                    <input id="name" type="text" class="mt-1 p-2 w-full border rounded-md" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input id="email" type="email" class="mt-1 p-2 w-full border rounded-md" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input id="password" type="password" class="mt-1 p-2 w-full border rounded-md" name="password" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="mt-1 p-2 w-full border rounded-md" name="password_confirmation" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Register</button>
                </div>
            </form>
        </div>
    </div>
    @include('layout.footer');
    @endsection

