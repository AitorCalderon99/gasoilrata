<nav class="nav nav-pills nav-justified">

    <div class="hamburguer-contenedor contenedor">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburguesa">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list"
                viewBox="0 0 15 15">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
    </div>

    <div class="titulo-contenedor contenedor d-flex align-items-center justify-content-center">
        <p class="nav-item">
            <a id="Inicio" href="/">
                GASOILRATA
            </a>
        </p>
    </div>

    <div class="logo-contenedor contenedor">
        <div href="index.php" class="nav-item mr-2 nav-link d-flex align-items-center justify-content-end">
            <img id="Logo" src="Logo.png" alt="Logo de GasoilRat" />
        </div>
    </div>

    <div id="hamburguesa" class="collapse navbar-collapse">
        <div class="navbar-nav">
            <a href="/" class="nav-item">Inicio</a>
            <a href="ranking" class="nav-item">Ranking Gasolineras</a>
            <a href="calculadora" class="nav-item">Calculadora Consumos</a>
            <a href="contacto" class="nav-item">Contacto</a>

            @guest
            <a href="login" class="nav-item">Login</a>
            <a href="registrarse" class="nav-item">Hacerse miembro</a>
            @endguest

            @auth
            <a href="" class="nav-item">{{ Auth::user()->name }}</a>
            <a href="consumo" class="nav-item">Mis Consumos</a>
            <a href="repostajes" class="nav-item">Mis Repostajes</a>
            <!-- no encuentra el controlador de repostajes ?? -->
            <a href="{{ route('logout') }}" class="nav-item" 
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Cerrar Sesión
            </a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
              @csrf
            </form>
            @endauth
        </div>
    </div>
</nav>