<template>
    <form @submit.prevent="updateUserData()">
        <div id="name">
            <label for="name">Nombre</label><br>
            <input v-model="userData.name" type="text" name="name">
        </div>
        <div id="email">
            <label for="email">Email</label><br>
            <input v-model="userData.email" type="email" name="email">
        </div>
        <div id="ubicacion">
            <label for="ubicacion">Ubicacion</label><br>
            <input v-model="userData.ubicacion" type="text" name="ubicacion">
        </div>
        <button type="submit">Editar</button>
    </form>
</template>
<script>
import { onBeforeMount, reactive, ref, inject } from '@vue/runtime-core'
import axios from 'axios';
import Swal from 'sweetalert2';
export default {
    setup() {
        const userData = ref({});
        const id_user = inject("id_user");
        const getVehiculos = async () => {
            let response;
            try {
                response = await axios.get("usuarios/" + id_user);
            } catch (error) {
                Swal.fire(error.title, error.message, "error");
                return;
            } 
            userData.value = response.data[0];
        };
        const updateUserData = async()=>{
            if (userData.value.name == "" || userData.value.email == "" || userData.value.ubicacion == "") {
                Swal.fire('debe rellenar todos los campos', '', "error");
                return;
            }
            const data = {
                id: id_user,
                name: userData.value.name,
                email: userData.value.email,
                ubicacion: userData.value.ubicacion
            }
            console.log(data);
            let response;
            try {
                response = await axios.put("usuarios/", {
                    data
                });
            } catch (error) {
                Swal.fire(error.title, error.message, "error");
                return;
            } 

        }
        onBeforeMount(()=>{
            getVehiculos();
        })
        return{
            userData,
            updateUserData
        }
    },
}
</script>