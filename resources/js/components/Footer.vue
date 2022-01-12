<template>
    <footer class="bg-light text-cente">
        <div class="container p-4">
            <section class="mb-4">
                @Copyright
            </section>

            <section class="mb-4">
                Contacto - Aviso legal - Tecnologia
            </section>

            <section class="mb-4">
                <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>
            </section>
        </div>
    </footer>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>