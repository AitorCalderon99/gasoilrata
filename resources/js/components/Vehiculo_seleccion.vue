<template>
  <div class="select-container">
    <h1 class="mx-auto"><span id="obligatorio">*</span> Seleccione un vehículo</h1>

    <div class="select-agregar row w-100 mx-auto">
      <select @change="cambiarVehiculo()" v-model="vehiculos.value" class="col" name="vehiculo" id="vehiculo">
        <option v-for="v in vehiculos" :key="v.id_vehiculo" :value="v.id_vehiculo">
          {{ v.nombre }}
        </option>
        <option v-if="vehiculos<= 0" disabled selected>No has añadido ningún vehículo</option>
      </select>
      <button
        type="button"
        id="masVehiculo"
        class="btn btn-outline-secondary col-2"
        @click="addVehiculo()"
      >
        +
      </button>
      <button
        type="button"
        id="menosVehiculo"
        class="btn btn-outline-secondary col-2"
        @click="removeVehiculo()"
      >
        -
      </button>
    </div>
  </div>
</template>

<script>
import { onBeforeMount, inject, ref } from "vue";
import axios from "axios";
import Swal from "sweetalert2"
import {useStore} from "vuex";

export default {
  setup() {
    const store = useStore();
    const id_user = inject("id_user");
    const vehiculos = ref([]);

    const cambiarVehiculo = () => {
      const vehiculo_seleccionado = document.getElementById("vehiculo").value;
    
      if (vehiculo_seleccionado) store.commit("setIdVehiculo", vehiculo_seleccionado);
    
      console.log(store.state.id_vehiculo);
    };

    const getVehiculos = async () => {
      let response;
      try {
        response = await axios.get("vehiculos/" + id_user);
      } catch (error) {
        Swal.fire("Ventana "+error.title, error.message, "error");
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

    const deleteVehiculo = async (vehiculo) => {
      let response;

      try {
        response = await axios.post("/vehiculos/{vehiculo}", {
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
        getVehiculos();
      }
    };

    const removeVehiculo = async () => {
      const { value: vehiculo } = await Swal.fire({
        title: "¿Eliminar este vehículo?",
        showDenyButton: true,
        confirmButtonText: 'Eliminar',
        denyButtonText: 'Volver',
        width: "40rem",
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire('Vehículo eliminado!', '', 'success')
        }
      });

      if (vehiculo) {
        // saveVehiculo(vehiculo);
        deleteVehiculo();
        getVehiculos();
      }
    };

    onBeforeMount(() => {
      getVehiculos();
    });

    return {
      getVehiculos,
      addVehiculo,
      removeVehiculo,
      cambiarVehiculo,
      vehiculos,
    };
  },
};
</script>