<template>
    <div class="select-container">
        <h1 class="ms-5">Seleccione un vehículo</h1>

        <div class="select-agregar row w-50 mx-auto">
            <select class="col-10">
                <option value="prueba">prueba</option>
            </select>
            <button type="button" class="btn btn-outline-secondary col" @click="showVehiculo">+</button>
        </div>

    </div>
</template>

<script>
export default {
    methods: {
        showVehiculo() {
            const { value: vehiculo } = this.$swal.fire(
                {
                    titleText : 'Añade tu coche al garaje virtual',
                    input : 'text',
                    inputLabel : 'Nombre de su vehiculo',
                    inputPlaceholder : 'Coche rojo, Ibiza etc.',
                    inputValidator : (value) => {
                        if (!value) { return "¡Tienes que escribir un nombre!" }
                    },
                    width : '40rem',
                    showCancelButton : true,
                    cancelButtonColor : '#DC143C',
                }
            )
            console.log(vehiculo);
            if (vehiculo) {this.$swal.fire('${vehiculo} se ha añadido al garaje.')}
        },
    },
}
</script>

<style scoped>
</style>