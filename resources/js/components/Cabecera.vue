<template>
  <nav class="nav nav-pills nav-justified">

    <div class="hamburguer-contenedor contenedor">
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#hamburguesa">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
      </button>
    </div>

    <div class="titulo-contenedor contenedor">
      <p class="nav-item">GASOILRATA</p>
    </div>

    <div class="logo-contenedor contenedor">
      <a href="index.php" class="nav-item nav-link">
        <img id="Logo" src="Logo.png" alt="Logo de GasoilRat"/>
      </a>
    </div>

    <div id="hamburguesa" class="collapse navbar-collapse">
      <div class="navbar-nav">
        <a href="/" class="nav-item">Inicio</a>
        <a href="ranking" class="nav-item">Ranking Gasolineras</a>
        <a href="calculadora" class="nav-item">Calculadora Consumos</a>
        <a href="contacto" class="nav-item">Contacto</a>
        <a href="login" class="nav-item">Login</a>
        <a href="register" class="nav-item">Hacerse miembro</a>
      </div>
    </div>

  </nav>
</template>


<style scoped>
html * {
  font-family: "Hemi Head";
}

nav {
  background-color: #c5a880;
}

.nav-justified .nav-item,
.nav-justified > .nav-link {
  text-align: center;
}

svg {
  width: 2rem;
  max-height: auto;
}

#hamburguesa a {
  color: black;
  text-decoration: none;
  transition: 0.2s;
  width: fit-content;
  margin: auto;
  font-size: x-large;
}

#hamburguesa a:hover {
  text-decoration: underline;
}

#hamburguesa a:active {
  color: white;
}

#Logo {
  width: 2.5rem;
  max-height: auto;
  text-align: end;
}

.contenedor {
  flex: 1 1 auto;
}

.titulo-contenedor p {
  font-size: xx-large;
}
</style>