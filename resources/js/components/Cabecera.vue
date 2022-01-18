<template>
  <nav class="nav nav-pills nav-justified">
    <button
      type="button"
      class="navbar-toggler"
      data-bs-toggle="collapse"
      data-bs-target="#hamburguesa"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
    </button>
    <p class="nav-item my-auto fs-1">GASOIL</p>
    <a href="index.php" class="nav-item nav-link"><img id="Logo" src="Logo.png" /></a>
    <div id="hamburguesa" class="collapse navbar-collapse">
      <div class="navbar-nav">
        <a href="/" class="nav-item">Inicio</a>
        <a href="ranking" class="nav-item">Ranking Gasolineras</a>
        <a href="calculadora" class="nav-item">Calculadora Consumos</a>
        <a href="contacto" class="nav-item">Contacto</a>
        <a href="login" class="nav-item">Login</a>
        <a href="registrarse" class="nav-item">Hacerse miembro</a>
      </div>
    </div>
  </nav>
</template>


<style scoped>
html * {
  font-family: "Roboto";
}
nav{
  font-style: italic;
}

a:not(#hamburguesa a) {
  font-weight: bold;
  color: black;
}

.nav-justified .nav-item,
.nav-justified > .nav-link {
  text-align: end;
}

#hamburguesa a {
  color: white;
  text-decoration: none;
  transition: 0.5s;
  width: fit-content;
  margin: auto;
}

#hamburguesa a:hover {
  color: black;
}

#Logo {
  width: 30px;
  height: 30px;
  margin-right: 0%;
}

nav {
  background-color: #c5a880;
}

.container {
  width: 100%;
  margin: 0%;
  padding: 0%;
}
</style>