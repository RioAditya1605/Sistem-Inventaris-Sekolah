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
                        value="{{ old('email') }}"
                        required
                        placeholder="Masukkan email..."
                        class="w-full pl-10 pr-4 py-2.5 text-sm sm:text-base
                               border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-[#4A70A9]
                               focus:border-[#4A70A9]
                               outline-none transition"
                    >

                </div>

                @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

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
