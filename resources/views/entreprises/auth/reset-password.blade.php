<x-entreprises::guest-layout>
    <form method="POST" action="{{ route('entreprises.password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-entreprises::input-label for="email" :value="__('Email')" />
            <x-entreprises::text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-entreprises::input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-entreprises::input-label for="password" :value="__('Password')" />
            <x-entreprises::text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-entreprises::input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-entreprises::input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-entreprises::text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-entreprises::input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-entreprises::primary-button>
                {{ __('Reset Password') }}
            </x-entreprises::primary-button>
        </div>
    </form>
</x-entreprises::guest-layout>
