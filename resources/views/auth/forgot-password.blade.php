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

<x-guest-layout>

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

</x-guest-layout>
