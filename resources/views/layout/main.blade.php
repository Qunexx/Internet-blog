<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qunexx's site</title>
    @vite('resources/js/app.js')

</head>
<body>
<div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Ссылки по центру -->
                <div class="collapse navbar-collapse justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('main.index') }}" aria-current="page">Main</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profile.index') }}"
                               aria-current="page">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('posts.index') }}" aria-current="page">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('contacts.index') }}"
                               aria-current="page">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('authcheck.index') }}" aria-current="page">AuthStatus</a>
                        </li>
                        @if (auth()->user() != null and auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.index') }}" aria-current="page">AdminPanel</a>
                            </li>
                        @endif

                    </ul>
                </div>

                <!-- Authentication Links справа -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>


    </div>
    @yield('content')
</div>
</body>
</html>
