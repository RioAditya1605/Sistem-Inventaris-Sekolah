@extends('layouts.login')

@section('title', 'Login')

@section('content')

<div class="w-full max-w-md px-4 sm:px-6">

    <!-- CARD LOGIN -->
    <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8">

        <!-- HEADER -->
        <div class="text-center mb-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">
                Login
            </h2>
        </div>

        <!-- SESSION STATUS -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- EMAIL -->
            <div>
                <label for="email"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>

                <div class="relative">
                    <i data-lucide="mail"
                        class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500">
                    </i>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="Masukkan email..."
                        class="w-full pl-10 pr-4 py-2.5 text-sm sm:text-base
                               border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-[#4A70A9]
                               focus:border-[#4A70A9]
                               outline-none transition"
                    >
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- PASSWORD -->
            <div>
                <label for="password"
                    class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>

                <div class="relative">

                    <!-- ICON -->
                    <i data-lucide="lock"
                        class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500">
                    </i>

                    <!-- INPUT -->
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="Masukkan password..."
                        class="w-full pl-10 pr-10 py-2.5 text-sm sm:text-base
                               border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-[#4A70A9]
                               focus:border-[#4A70A9]
                               outline-none transition"
                    >

                    <!-- TOGGLE PASSWORD -->
                    <i data-lucide="eye"
                        onclick="togglePassword('password', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-gray-500 cursor-pointer">
                    </i>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- LUPA PASSWORD -->
            <div class="flex justify-end">
                <a href="{{ route('password.request') }}"
                    class="text-sm text-[#4A70A9] hover:underline">
                    Lupa Password?
                </a>
            </div>

            <!-- BUTTON LOGIN -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-[#4A70A9] text-white font-medium
                           py-2.5 rounded-xl shadow-md
                           hover:bg-[#8FABD4]
                           transition duration-300
                           flex items-center justify-center gap-2">

                    <i data-lucide="log-in" class="w-5 h-5"></i>

                    LOGIN
                </button>
            </div>

        </form>
    </div>
</div>

<!-- LUCIDE -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

<script>
function togglePassword(id, icon) {
    const input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
        icon.setAttribute("data-lucide", "eye-off");
    } else {
        input.type = "password";
        icon.setAttribute("data-lucide", "eye");
    }

    lucide.createIcons();
}
</script>

@endsection