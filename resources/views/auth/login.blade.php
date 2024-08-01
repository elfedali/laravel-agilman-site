@extends('layouts.auth')

@section('content')
    <section>
        <h1 class="h3">
            Se connecter
        </h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-floating mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                <label for="email">{{ __('label.e-mail') }}</label>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Password">
                <label for="password">{{ __('label.password') }}</label>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('label.remember-me') }}
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('label.login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('label.forgot-password') }}
                    </a>
                @endif
            </div>
        </form>

        <div class="mt-4">
            <p>
                Vous n'avez pas de compte ?
                <a href="{{ route('register') }}" class="btn btn-link">
                    {{ __('label.register') }}
                </a>
            </p>
        </div>
    </section>
@endsection
