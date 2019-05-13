<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/products">Shop <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Blog</a>
        </li>
        </ul>

        <div>
            @if(Auth::guest())
                <a class="text-white nav-link d-inline" href="/login">Login</a>
                <a class="text-white nav-link d-inline" href="/register">Register</a>
            @else
            <span class="dropdown">
                <a class="nav-link dropdown-toggle text-white" style="display:inline" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome! {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu text-left" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/users/{{Auth::user()->id}}/cart">Cart</a>
                    <a class="dropdown-item" href="#">Account</a>
                    <hr>
                    <div class="dropdown-item">
                        <form class="form-inline" action="/logout" method="POST">
                            <button class="btn-logout">Logout</button>
                            @csrf
                        </form>
                    </div>
                </div>
            <span>
            @endif
        </div>
    </div>
</nav>
