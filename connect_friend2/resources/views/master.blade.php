<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar-nav .nav-link.active {
            color: #ff5733;
            /* Example color */
            background-color: transparent;
            /* Optional: Change background color if needed */
        }

        /* Change the color of the active navbar link on hover */
        .navbar-nav .nav-link.active:hover {
            color: #ff5733;
            /* Example color */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ConnectFriend</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @yield('home')" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link @yield('friends')" href="{{ route('friends') }}">Friends</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('payment')" href="{{ route('payment') }}">Payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('showoff')" href="{{ route('showoff') }}">Show off</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('settings')" href="{{ route('settings') }}">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('avatarshop')" href="{{ route('avatarshop') }}">Avatar Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('logout')" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endauth


                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
