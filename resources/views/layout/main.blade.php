<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/js/app.js')

</head>
<body>
<div>
    <div>
    <nav>
        <ul
            class="nav justify-content-center"
        >
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('main.index')}}" aria-current="page"
                >Main</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('profile.index')}}" aria-current="page"
                    >Profile</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('posts.index')}}" aria-current="page"
                    >Posts</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('contacts.index')}}" aria-current="page"
                    >Contacts</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('authcheck.index')}}" aria-current="page"
                    >AuthStatus</a
                >
            </li>

        </ul>
        </nav>
    </div>
 @yield('content')
</div>
</body>
</html>
