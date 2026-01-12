{{-- @extends('layouts.app')

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- @extends('layouts.login')

@section('title', 'Login')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
    <h2 class="text-center text-xl font-semibold mb-6">Login</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-[#4A70A9] focus:border-[#4A70A9]">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-[#4A70A9] focus:border-[#4A70A9]">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Tombol Login -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="bg-[#4A70A9] text-white font-medium py-2 px-6 rounded-full shadow hover:bg-[#8FABD4] transition">
                LOGIN
            </button>
        </div>
    </form>
</div>
@endsection --}}


@extends('layouts.login')

@section('title', 'Login')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
    <h2 class="text-center text-xl font-semibold mb-6">Login</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Username -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Username</label>

            <div class="relative">
                <i data-lucide="user"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600"></i>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full pl-10 mt-1 px-3 py-2 border border-gray-300 rounded-md 
                    focus:ring-[#4A70A9] focus:border-[#4A70A9]">
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>

            <div class="relative">
                <i data-lucide="lock"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600"></i>

                <input id="password" type="password" name="password" required
                    class="w-full pl-10 mt-1 px-3 py-2 border border-gray-300 rounded-md
                    focus:ring-[#4A70A9] focus:border-[#4A70A9]">
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Tombol Login -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="bg-[#4A70A9] text-white font-medium py-2 px-6 rounded-full shadow hover:bg-[#8FABD4] transition flex items-center gap-2">
                <i data-lucide="log-in" class="w-5 h-5"></i>
                LOGIN
            </button>
        </div>
    </form>
</div>

<!-- Lucide Script -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
    lucide.createIcons();
</script>

@endsection

