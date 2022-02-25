<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="logo-login" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="form-main">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" class="input-label" />

                <x-input id="name" class="input-main" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" class="input-label" />

                <x-input id="email" class="input-main" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" class="input-label" />

                <x-input id="password" class="input-main"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="input-label" />

                <x-input id="password_confirmation" class="input-main"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="login-form__bottom">
                <a class="login-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="main-btn middle round">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
