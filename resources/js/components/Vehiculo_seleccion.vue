<template>
  <div class="select-container">
    <h1 class="ms-5">Seleccione un vehículo</h1>

    <div class="select-agregar row w-50 mx-auto">
      <select @change="getVehiculos()" v-model="vehiculos" class="col-10">
        <option v-for="v in vehiculos" :key="v.id_vehiculo" value="v.id_vehiculo">
          {{ v.nombre }}
        </option>
      </select>
      <button
        type="button"
        class="btn btn-outline-secondary col"
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
    //   console.log(response);
      vehiculos.value = response.data;
      console.log(vehiculos.value);
    };

    const saveVehiculo = async (vehiculo) => {
      let response;

      try {
        response = await axios.post("/vehiculos", {
          vehiculo: vehiculo,
          idUser: id_user,
        });
      } catch (error) {
        Sawl.fire(error.title, "error");
        return;
      }

      if (response.data != 200) {
        //marcar error
        return;
      }
      await getVehiculos();
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
      });

      if (vehiculo) {
        Swal.fire(vehiculo + " se ha añadido al garaje.");
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