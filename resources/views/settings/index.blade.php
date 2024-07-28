    @extends('layouts.app')
    {{-- title --}}
    @section('title', __('label.settings'))
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    @include('profile._menu')
                    <h1>
                        {{ __('label.settings') }}
                    </h1>
                    <section>

                        <p class="text-muted">
                            <small>
                                <small>
                                    ici vous pouvez modifier vos informations personnelles
                                </small>
                            </small>
                        </p>
                    </section>

                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    @endsection
