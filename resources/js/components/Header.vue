<template>
    <nav class="nav nav-pills nav-justified">
      <button
        type="button"
        class="navbar-toggler"
        data-bs-toggle="collapse"
        data-bs-target="#hamburguesa"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="#" class="nav-item nav-link">GASOIL</a>
      <a href="#" class="nav-item nav-link"><img src="Logo.png" /></a>
      <div id="hamburguesa" class="collapse navbar-collapse">
        <div class="navbar-nav">
          <a href="#" class="nav-item">Inicio</a>
          <a href="#" class="nav-item">Ranking Gasolineras</a>
          <a href="#" class="nav-item">Calculadora Consumos</a>
          <a href="#" class="nav-item">Contacto</a>
          <a href="#" class="nav-item">Login</a>
          <a href="#" class="nav-item">Hacerse miembro</a>
        </div>
      </div>
    </nav>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

<style scoped>
  html * {
    font-family: "Roboto";
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

  img {
    width: 30px;
    height: 30px;
    margin-right: 0%;
  }

  nav {
    background-color: #c5a880;
  }

  .container{
    width: 100%;
    margin: 0%;
    padding: 0%;
  }
</style>