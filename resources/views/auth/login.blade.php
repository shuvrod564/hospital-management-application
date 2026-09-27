<!-- resources/views/auth/login.blade.php -->
<x-guest-layout>
    <!-- Brand Logo -->
    <div class="mb-4">
        <a href="{{ url('/') }}" class="brand-logo-text d-inline-flex align-items-center gap-2">
            <x-application-logo class="w-8 h-8 fill-current text-primary" />
            <span>Invision</span>
        </a>
    </div>

    <div class="mb-4">
        <h3 class="fw-bold text-dark mb-1">Login</h3>
        <p class="text-muted small">Enter your credentials to login to your account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('user.login.post') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label text-dark fw-medium small mb-1">{{ __('Email') }}</label>
            <x-text-input id="email" class="form-control form-control-custom" type="email" name="email" :value="old('email')" placeholder="example.nazarbecks@gmail.com" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mb-2">
            <label for="password" class="form-label text-dark fw-medium small mb-1">{{ __('Password') }}</label>
            <div class="position-relative">
                <x-text-input id="password" class="form-control form-control-custom pe-5"
                                type="password"
                                name="password"
                                placeholder="••••••••••••••••••••"
                                required
                                autocomplete="current-password" />
                <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-secondary text-decoration-none pe-3 border-0 z-3" onclick="togglePasswordVisibility('password', this)">
                    <i data-lucide="eye" style="width: 18px; height: 18px;"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Forgot Password -->
        <div class="d-flex justify-content-end mb-4">
            @if (Route::has('password.request'))
                <a class="text-link small" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary-custom w-100 mb-4">
            {{ __('Sign In') }}
        </button>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center small text-muted">
                {{ __("Don't have an account?") }} 
                <a href="{{ route('register') }}" class="text-link">{{ __('Sign Up') }}</a>
            </div>
        @endif
    </form>

    <script>
        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('[data-lucide]');
            
            if (input.type === 'password') {
                input.type = 'text';
                if (icon) icon.setAttribute('data-lucide', 'eye-off');
            } else {
                input.type = 'password';
                if (icon) icon.setAttribute('data-lucide', 'eye');
            }
            
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
    </script>
</x-guest-layout>