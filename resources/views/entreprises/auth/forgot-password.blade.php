<x-entreprises::guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-entreprises::auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('entreprises.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-entreprises::input-label for="email" :value="__('Email')" />
            <x-entreprises::text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-entreprises::input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-entreprises::primary-button>
                {{ __('Email Password Reset Link') }}
            </x-entreprises::primary-button>
        </div>
    </form>
</x-entreprises::guest-layout>
