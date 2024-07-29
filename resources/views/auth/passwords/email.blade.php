@extends('layouts.auth')

@section('content')
    <h1 class="h3">{{ __('label.reset-password') }}</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="">{{ __('label.e-mail') }}</label>


            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>


        <button type="submit" class="btn btn-primary">
            {{ __('label.send-password-reset-link') }}
        </button>



    </form>
    <p class="mt-4">
        <a href="{{ route('login') }}" class="text-decoration-none me-1">{{ __('label.login') }}</a>
        <span>
            {{ __('label.or') }}
        </span>
        <a href="{{ route('register') }}" class="text-decoration-none ms-1">{{ __('label.register') }}</a>
    </p>
@endsection
