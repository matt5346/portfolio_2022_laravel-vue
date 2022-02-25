<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="logo-login" />
            </a>
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}" class="form-main">
            @csrf


            <div class="form-main__forgot-text">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" class="input-label"/>

                <x-input id="email" class="input-main" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="login-form__bottom">
                <x-button class="main-btn middle round">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
