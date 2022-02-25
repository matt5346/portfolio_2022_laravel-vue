<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="logo-login" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" class="form-login__validation-errors"/>

        <form method="POST" action="{{ route('login') }}" class="form-main">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" class="input-label" />

                <x-input id="email" class="input-main" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" class="input-label"/>

                <x-input id="password" class="input-main"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="login-form__extra-labels">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="login-form__bottom">
                @if (Route::has('password.request'))
                    <a class="login-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="main-btn middle round">
                    {{ __('Login') }}
                </x-button>
            </div>

            <!-- REGISTER Me -->
            <div class="block mt-4">
                <div for="remember_me" class="form-main__redirect">
                    <a class="login-link" href="{{ route('register') }}">
                        {{ __('Register me !!!') }}
                    </a>
                </label>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
