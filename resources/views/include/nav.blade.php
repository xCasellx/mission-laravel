<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-white border-bottom border-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class=" navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("cabinet") }}">Cabinet <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("comments") }}">Comment <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route("logout") }}">Logout<span class="sr-only">(current)</span></a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu bg-white " aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-info" href="{{route("login")}}">Login</a>
                            <a class="dropdown-item text-info" href="{{route("register")}}">Register</a>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </nav>
</header>
