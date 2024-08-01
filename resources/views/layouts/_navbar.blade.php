<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex  align-items-center text-decoration-none" href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14">
                <path fill="currentColor" fill-rule="evenodd"
                    d="M1.5 0h4.875v1.158a2.125 2.125 0 1 0 0 4.184v1.033H4.368a.625.625 0 0 0-.466 1.042a.875.875 0 1 1-1.305 0a.625.625 0 0 0-.465-1.042H0V1.5A1.5 1.5 0 0 1 1.5 0M0 7.625V12.5A1.5 1.5 0 0 0 1.5 14h4.875v-2.132a.625.625 0 0 1 1.042-.466a.875.875 0 1 0 0-1.305a.625.625 0 0 1-1.042-.465V7.625H5.342a2.125 2.125 0 1 1-4.184 0zm7.625 0v1.033a2.125 2.125 0 1 1 0 4.184V14H12.5a1.5 1.5 0 0 0 1.5-1.5V7.625h-2.132a.625.625 0 0 1-.466-1.042a.875.875 0 1 0-1.305 0a.625.625 0 0 1-.465 1.042zM14 6.375V1.5A1.5 1.5 0 0 0 12.5 0H7.625v2.132a.625.625 0 0 1-1.042.466a.875.875 0 1 0 0 1.305a.625.625 0 0 1 1.042.465v2.007h1.033a2.125 2.125 0 1 1 4.184 0z"
                    clip-rule="evenodd" />
            </svg>
            <b class="ms-2">agilman</b> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainMenu"
            aria-controls="navbarMainMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMainMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() == 'home') active @endif" href="{{ route('home') }}">
                        {{ __('label.home') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ __('label.my-tasks') }}
                    </a>
                </li>

            </ul>
            <ul class="navbar-nav">

                {{-- switch theme mode --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('label.profile') }}
                            </a>
                        </li>
                        <li>
                        <li>
                            <a class="dropdown-item" href="{{ route('settings') }}">
                                {{ __('label.settings') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 1200 1200">
                                    <path fill="currentColor"
                                        d="M513.94 0v693.97h172.12V0zM175.708 175.708C67.129 284.287 0 434.314 0 600c0 331.371 268.629 600 600 600s600-268.629 600-600c0-165.686-67.13-315.713-175.708-424.292l-120.85 120.85c77.66 77.658 125.684 184.952 125.684 303.442c0 236.981-192.146 429.126-429.126 429.126c-236.981 0-429.126-192.145-429.126-429.126c0-118.49 48.025-225.784 125.684-303.442z" />
                                </svg>
                                <span class="ms-2">
                                    {{ __('label.logout') }}
                                </span>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
