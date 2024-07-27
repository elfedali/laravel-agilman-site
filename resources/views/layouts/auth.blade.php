<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">


        <div class="row">
            <div class="col-lg-6">
                <div class="position-relative vh-100 overflow-hidden">
                    <div class="overlay"></div>
                    <img src="{{ url('/assets/images/login_cover.png') }}" alt="AGILMAN" class="img-fluid">
                </div>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6 my-auto">

                @if (session('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                        <span class="font-bold">{{ __('label.error') }}</span>
                        <ul class="mt-2 list-disc list-inside text-sm text-red-700 dark:text-red-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4"
                        role="alert">
                        <span class="font-medium text-md">{{ session('success') }}</span>
                    </div>
                @endif
                <main class="px-5">
                    @include('layouts._logo')
                    @yield('content')
                </main>
            </div>
        </div>
        <!-- /.row -->


    </div>
</body>

</html>
