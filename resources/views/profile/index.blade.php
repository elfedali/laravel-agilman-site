    @extends('layouts.app')
    {{-- title --}}
    @section('title', __('label.profile'))
    @section('content')
        <div class="container">
            <div class="row">
                <section class="col-xl-12">
                    @include('profile._menu')
                    <h1>
                        {{ __('label.profile') }}
                    </h1>

                    {{ html()->form('POST', route('profile.update'))->open() }}
                    <div class="form-floating mb-3">
                        {{ html()->text('name')->class('form-control')->placeholder(__('label.name'))->value(auth()->user()->name) }}
                        <label for="name">
                            {{ __('label.name') }}
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        {{ html()->email('email')->class('form-control')->placeholder(__('label.email'))->value(auth()->user()->email) }}
                        <label for="email">
                            {{ __('label.e-mail') }}
                        </label>
                    </div>
                    {{-- first_name --}}
                    <div class="form-floating mb-3">
                        {{ html()->text('first_name')->class('form-control')->placeholder(__('label.first-name'))->value(auth()->user()->first_name) }}
                        <label for="first_name">
                            {{ __('label.first-name') }}
                        </label>
                    </div>
                    {{-- last_name --}}
                    <div class="form-floating mb-3">
                        {{ html()->text('last_name')->class('form-control')->placeholder(__('label.last-name'))->value(auth()->user()->last_name) }}
                        <label for="last_name">
                            {{ __('label.last-name') }}
                        </label>
                    </div>
                    {{-- phone --}}
                    <div class="form-floating mb-3">
                        {{ html()->number('phone')->class('form-control')->placeholder(__('label.phone'))->value(auth()->user()->phone) }}
                        <label for="phone">
                            {{ __('label.phone') }}
                        </label>
                    </div>

                    {{ html()->submit('Modifier')->class('btn btn-primary') }}
                    {{ html()->form()->close() }}
                </section>

            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container -->
    @endsection
