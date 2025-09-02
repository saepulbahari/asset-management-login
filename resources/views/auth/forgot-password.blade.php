@extends('layouts.auth')

@section('title', 'Forgot Password')
@section('header', 'Lupa Password')

@section('content')
<div class="bg-white py-8 px-6 shadow rounded-lg">
    <div class="mb-4 text-sm text-gray-600">
        Lupa password Anda? Tidak masalah. Masukkan alamat email Anda dan kami akan mengirimkan link untuk reset password.
    </div>

    <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
        @csrf
        
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email
            </label>
            <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required
                    value="{{ old('email') }}"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('email') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                    placeholder="Masukkan email Anda">
            </div>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </span>
                Kirim Link Reset Password
            </button>
        </div>

        <div class="text-center">
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                Kembali ke halaman login
            </a>
        </div>
    </form>
</div>
@endsection
