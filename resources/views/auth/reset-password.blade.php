{{-- @extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">

    <h2 class="text-center text-xl font-semibold mb-4">
        Reset Password
    </h2>

    <p class="text-sm text-gray-600 text-center mb-5">
        Masukkan password baru Anda
    </p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- TOKEN -->
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <!-- EMAIL -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>

            <div class="relative">
                <i data-lucide="mail"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600"></i>

                <input type="email" name="email"
                    value="{{ old('email', request()->email) }}"
                    class="w-full pl-10 mt-1 px-3 py-2 border border-gray-300 rounded-md
                    focus:ring-[#4A70A9] focus:border-[#4A70A9]"
                    required>
            </div>

            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- PASSWORD -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Password Baru</label>

            <div class="relative">
                <!-- ICON KUNCI -->
                <i data-lucide="lock"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600"></i>

                <!-- INPUT -->
                <input type="password" id="password" name="password"
                    class="w-full pl-10 pr-10 mt-1 px-3 py-2 border border-gray-300 rounded-md
                    focus:ring-[#4A70A9] focus:border-[#4A70A9]"
                    required>

                <!-- ICON MATA -->
                <i data-lucide="eye"
                    onclick="togglePassword('password', this)"
                    class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600 cursor-pointer"></i>
            </div>
        </div>

        <!-- KONFIRMASI -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>

            <div class="relative">
                <i data-lucide="lock"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600"></i>

                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full pl-10 pr-10 mt-1 px-3 py-2 border border-gray-300 rounded-md"
                    required>

                <i data-lucide="eye"
                    onclick="togglePassword('password_confirmation', this)"
                    class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-600 cursor-pointer"></i>
            </div>
        </div>

        <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">
            Password tidak sama!
        </p>

        <!-- BUTTON -->
        <div class="flex justify-center mt-6">
            <button type="submit"
                class="bg-[#4A70A9] text-white font-medium py-2 px-6 rounded-full shadow hover:bg-[#8FABD4] transition flex items-center gap-2">
                <i data-lucide="key" class="w-5 h-5"></i>
                Reset Password
            </button>
        </div>

    </form>
</div>

<!-- Lucide -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
    lucide.createIcons();
</script>

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

    lucide.createIcons(); // refresh icon
}
</script>

<script>
let timer;

const password = document.getElementById('password');
const confirmPassword = document.getElementById('password_confirmation');
const errorText = document.getElementById('passwordError');

function validatePassword() {
    if (confirmPassword.value === "") {
        errorText.classList.add('hidden');
        return;
    }

    if (password.value !== confirmPassword.value) {
        errorText.classList.remove('hidden');

        password.classList.add('border-red-500');
        confirmPassword.classList.add('border-red-500');
    } else {
        errorText.classList.add('hidden');

        password.classList.remove('border-red-500');
        confirmPassword.classList.remove('border-red-500');
    }
}

// delay 1 detik setelah berhenti ngetik
function delayedCheck() {
    clearTimeout(timer);
    timer = setTimeout(validatePassword, 1000); // 1000ms = 1 detik
}

// trigger saat user ngetik
password.addEventListener('keyup', delayedCheck);
confirmPassword.addEventListener('keyup', delayedCheck);
</script>

@endsection --}}

@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')

<div class="w-full max-w-sm sm:max-w-md mx-auto px-4">

    <!-- CARD -->
    <div class="bg-white shadow-xl rounded-2xl p-6 sm:p-8 w-full">

        <!-- HEADER -->
        <div class="text-center mb-6">

            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800">
                Reset Password
            </h2>

            <p class="text-sm text-gray-500 mt-2">
                Masukkan password baru Anda
            </p>

        </div>

        <!-- FORM -->
        <form method="POST"
              action="{{ route('password.store') }}"
              class="space-y-5">

            @csrf

            <!-- TOKEN -->
            <input type="hidden"
                   name="token"
                   value="{{ request()->route('token') }}">

            <!-- EMAIL -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>

                <div class="relative">

                    <i data-lucide="mail"
                        class="absolute left-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-gray-500">
                    </i>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', request()->email) }}"
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

            <!-- PASSWORD BARU -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password Baru
                </label>

                <div class="relative">

                    <!-- ICON -->
                    <i data-lucide="lock"
                        class="absolute left-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-gray-500">
                    </i>

                    <!-- INPUT -->
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="Masukkan password baru..."
                        class="w-full pl-10 pr-10 py-2.5 text-sm sm:text-base
                               border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-[#4A70A9]
                               focus:border-[#4A70A9]
                               outline-none transition"
                    >

                    <!-- TOGGLE -->
                    <i data-lucide="eye"
                        onclick="togglePassword('password', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-gray-500 cursor-pointer">
                    </i>

                </div>

            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Password
                </label>

                <div class="relative">

                    <!-- ICON -->
                    <i data-lucide="lock"
                        class="absolute left-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-gray-500">
                    </i>

                    <!-- INPUT -->
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        placeholder="Konfirmasi password..."
                        class="w-full pl-10 pr-10 py-2.5 text-sm sm:text-base
                               border border-gray-300 rounded-lg
                               focus:ring-2 focus:ring-[#4A70A9]
                               focus:border-[#4A70A9]
                               outline-none transition"
                    >

                    <!-- TOGGLE -->
                    <i data-lucide="eye"
                        onclick="togglePassword('password_confirmation', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2
                               w-5 h-5 text-gray-500 cursor-pointer">
                    </i>

                </div>

            </div>

            <!-- ERROR -->
            <p id="passwordError"
               class="text-red-500 text-sm hidden">
                Password tidak sama!
            </p>

            <!-- BUTTON -->
            <div class="pt-2">

                <button type="submit"
                    class="w-full bg-[#4A70A9] text-white font-medium
                           py-3 rounded-xl shadow-md
                           hover:bg-[#8FABD4]
                           transition duration-300
                           flex items-center justify-center gap-2">

                    <i data-lucide="key" class="w-5 h-5"></i>

                    Reset Password

                </button>

            </div>

        </form>

    </div>

</div>

<!-- LUCIDE -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

<script>
    lucide.createIcons();
</script>

<!-- SHOW PASSWORD -->
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

<!-- VALIDASI PASSWORD -->
<script>
let timer;

const password = document.getElementById('password');
const confirmPassword = document.getElementById('password_confirmation');
const errorText = document.getElementById('passwordError');

function validatePassword() {

    if (confirmPassword.value === "") {
        errorText.classList.add('hidden');
        return;
    }

    if (password.value !== confirmPassword.value) {

        errorText.classList.remove('hidden');

        password.classList.add('border-red-500');
        confirmPassword.classList.add('border-red-500');

    } else {

        errorText.classList.add('hidden');

        password.classList.remove('border-red-500');
        confirmPassword.classList.remove('border-red-500');
    }
}

function delayedCheck() {
    clearTimeout(timer);
    timer = setTimeout(validatePassword, 1000);
}

password.addEventListener('keyup', delayedCheck);
confirmPassword.addEventListener('keyup', delayedCheck);
</script>

@endsection