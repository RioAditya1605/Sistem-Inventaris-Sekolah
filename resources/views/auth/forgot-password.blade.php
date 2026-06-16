{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <input type="email" name="email" placeholder="Masukkan email" required>

        <button type="submit">Kirim Link Reset</button>
    </form>
</x-guest-layout> --}}

{{-- <x-guest-layout>

    <div class="mb-4 text-sm text-gray-600">
        Masukkan email Anda, kami akan mengirimkan link untuk reset password.
    </div>

    <!-- STATUS -->
    @if (session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- EMAIL -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email" required autofocus />
        </div>

        <!-- BUTTON -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Kirim Link Reset
            </x-primary-button>
        </div>
    </form>

</x-guest-layout> --}}

{{-- @extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
    
    <h2 class="text-center text-xl font-semibold mb-4">
        Lupa Password
    </h2>

    <p class="text-sm text-gray-600 text-center mb-5">
        Masukkan email untuk reset password
    </p>

    <!-- STATUS -->
    @if (session('status'))
        <div class="text-green-600 text-sm text-center mb-3">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- EMAIL -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>

            <div class="relative">
                <i data-lucide="mail"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600"></i>

                <input type="email" name="email" required
                    class="w-full pl-10 mt-1 px-3 py-2 border border-gray-300 rounded-md
                    focus:ring-[#4A70A9] focus:border-[#4A70A9]">
            </div>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="bg-[#4A70A9] text-white font-medium py-2 px-6 rounded-full shadow hover:bg-[#8FABD4] transition flex items-center gap-2">
                <i data-lucide="send" class="w-5 h-5"></i>
                Kirim Link
            </button>
        </div>

        <!-- BACK -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-blue-500 text-sm">
                Kembali ke Login
            </a>
        </div>

    </form>
</div>

<!-- Lucide -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
    lucide.createIcons();
</script>

@endsection --}}

@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')

<div class="w-full max-w-md px-4 sm:px-6">

    <!-- CARD -->
    <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8">

        <!-- HEADER -->
        <div class="text-center mb-6">

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">
                Lupa Password
            </h2>

            <p class="text-sm text-gray-500 mt-2">
                Masukkan email untuk menerima link reset password
            </p>

        </div>

        <!-- STATUS -->
        @if (session('status'))
            <div class="mb-4 bg-green-100 border border-green-300
                        text-green-700 text-sm rounded-lg p-3 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('password.email') }}"
              class="space-y-5">
            @csrf

            <!-- EMAIL -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>

                <div class="relative">

                    <!-- ICON -->
                    <i data-lucide="mail"
                        class="absolute left-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-gray-500">
                    </i>

                    <!-- INPUT -->
                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="Masukkan email..."
                        class="w-full pl-10 pr-4 py-2.5 text-sm sm:text-base
                               border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-[#4A70A9]
                               focus:border-[#4A70A9]
                               outline-none transition"
                    >

                </div>

            </div>

            <!-- BUTTON -->
            <div class="pt-2">

                <button type="submit"
                    class="w-full bg-[#4A70A9] text-white font-medium
                           py-2.5 rounded-xl shadow-md
                           hover:bg-[#8FABD4]
                           transition duration-300
                           flex items-center justify-center gap-2">

                    <i data-lucide="send" class="w-5 h-5"></i>

                    Kirim Link Reset

                </button>

            </div>

            <!-- BACK LOGIN -->
            <div class="text-center pt-2">

                <a href="{{ route('login') }}"
                   class="text-sm text-[#4A70A9] hover:underline">
                    Kembali ke Login
                </a>

            </div>

        </form>

    </div>
</div>

<!-- LUCIDE -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

<script>
    lucide.createIcons();
</script>

@endsection
