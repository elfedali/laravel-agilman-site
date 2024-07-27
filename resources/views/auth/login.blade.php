@extends('layouts.auth')

@section('content')
    <section>
        <h1 class="h3">
            Se connecter

        </h1>


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="col-form-label text-md-end">{{ __('label.e-mail') }}</label>

                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password">{{ __('label.password') }}</label>

                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('label.remember-me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div>
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
