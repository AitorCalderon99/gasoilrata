<template>
  <div class="select-container">
    <h1 class="ms-5 mx-auto">Seleccione un vehículo</h1>

    <div class="select-agregar row w-100 mx-auto">
      <select v-model="vehiculos" class="col" name="vehiculo">
        <option v-for="v in vehiculos.value" :key="v.id_vehiculo" :value="v.id_vehiculo">
          {{ v.nombre }}
        </option>
        <option v-if="vehiculos.value <= 0" disabled>No has añadido ningún vehículo</option>
      </select>
      <button
        type="button"
        id="masVehiculo"
        class="btn btn-outline-secondary col-2"
        @click="addVehiculo()"
      >
        +
      </button>
    </div>
  </div>
</template>

<script>
/* import { reactive, onBeforeMount } from '@vue/runtime-core' */
import { reactive, onBeforeMount, ref, inject } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
export default {
  setup() {
    const Swal = require("sweetalert2");
    const id_user = inject("id_user");

    const vehiculos = reactive([]);
    const vehiculo = ref("");

    const getVehiculos = async () => {
      let response;
      try {
        response = await axios.get("vehiculos/" + id_user);
      } catch (error) {
        Swal.fire(error.title, error.message, "error");
        return;
      }
      //   if (response.data != 200) {
      //     console.log("que es esto");
      //     return;
      //   }
      
      vehiculos.value = response.data;
    };

    const saveVehiculo = async (vehiculo) => {
      let response;

      try {
        response = await axios.post("/vehiculos", {
        vehiculo: vehiculo,
        idUser: id_user,
        });
      } catch (error) {
        Sawl.fire("Tienes que iniciar sesión para guardar vehículos", "error");
        return;
      }

      Swal.fire(vehiculo + " se ha añadido al garaje.");

      if (response.data != 200) {
        //marcar error
        return;
      }
      getVehiculos();
    };

    const addVehiculo = async () => {
      const { value: vehiculo } = await Swal.fire({
        titleText: "Añade tu coche al garaje virtual",
        input: "text",
        inputLabel: "Nombre de su vehiculo",
        inputPlaceholder: "Coche rojo, Ibiza etc.",
        inputValidator: (value) => {
          if (!value) {
            return "¡Tienes que escribir un nombre!";
          }
        },
        width: "40rem",
        showCancelButton: true,
        cancelButtonColor: "#DC143C",
        confirmButtonText: "Añadir",
        cancelButtonText: "Volver"
      });

      if (vehiculo) {
        saveVehiculo(vehiculo);
      }
    };

    onBeforeMount(() => {
      getVehiculos();
    });

    return {
      getVehiculos,
      vehiculos,
      addVehiculo,
    };
  },
};
</script>


<style lang="scss" scoped>
</style>