<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            Alpina's Recipes
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="recipesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Recipes Themes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="recipesDropdown">
                        <a class="dropdown-item" href="#">Breakfast</a>
                        <a class="dropdown-item" href="#">Lunch</a>
                        <a class="dropdown-item" href="#">Dinner</a>
                        <a class="dropdown-item" href="#">Dessert</a>
                    </div>
                </li>

                @guest
                    <li class="nav-item ml-2">
                        <a class="nav-link text-primary" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link text-primary" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item ml-2">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                            <input type="hidden" name="_next" value="{{ route('welcome.page') }}">
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
