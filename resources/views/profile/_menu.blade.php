<ul class="nav nav-underline mb-4">
    <li class="nav-item">
        <a class="nav-link
        @if (request()->routeIs('profile')) active @endif
        "
            href="{{ route('profile') }}">
            {{ __('label.profile') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('settings')) active @endif" href="{{ route('settings') }}">
            {{ __('label.settings') }}
        </a>
    </li>


</ul>
