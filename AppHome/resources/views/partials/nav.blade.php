<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Social Network</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link" href="{{ route('homePage') }}">Home</a>
            <a class="nav-link" href="{{ route('profiles.index') }}">Profiles</a>
            {{-- <a class="nav-link" href="/profile">Profile</a> --}}
            <a class="nav-link" href="{{ route('information.index') }}">Information</a>
            <a class="nav-link" href="{{ route('publications.index') }}">Publications</a>
            <a class="nav-link" href="{{ route('profiles.create') }}">Ajouter Profile</a>
            @guest
                <a class="nav-link" href="{{ route('login.show') }}">Se connecter</a>
            @endguest
            @auth
                <a class="nav-link" href="{{ route('publications.create') }}">Ajouter Publication</a>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li> --}}
                        <li><a class="dropdown-item" href="{{ route('login.logout') }}">Deconnexion</a></li>
                    </ul>
                </div>
            @endauth
            </div>
        </div>
    </div>
</nav>