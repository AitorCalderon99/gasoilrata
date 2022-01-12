<template>
  <div class="container">
    <nav class="nav nav-pills nav-justified">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Messages</a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Inicio</a>
                <a href="#" class="dropdown-item">Ranking Gasolineras</a>
                <a href="#" class="dropdown-item">Calculadora Consumos</a>
                <a href="#" class="dropdown-item">Contacto</a>
                <a href="#" class="dropdown-item">Usuario</a>
                <a href="#" class="dropdown-item">Hacerse miembro</a>
            </div>
        </div>
        <a href="#" class="nav-item nav-link">GASOIL</a>
        <a href="#" class="nav-item nav-link"><img src="Logo.png"></a>
    </nav>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

<style scoped>
img{
  width: 30px;
  height: 30px;
}
</style>