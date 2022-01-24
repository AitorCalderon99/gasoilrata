<template>
    <div class="select-container">
        <h1 class="ms-5">Seleccione un vehículo</h1>

        <div class="select-agregar row w-50 mx-auto">
            <select @change="showVehiculo()" v-model="vehiculo" class="col-10">
                <option v-for="v in vehiculos" :key="v" value="v">{{v}}</option>
            </select>
            <button type="button" class="btn btn-outline-secondary col" @click="showVehiculo()">+</button>
        </div>

    </div>
</template>

<script>
/* import { reactive, onBeforeMount } from '@vue/runtime-core' */
import {reactive ,onBeforeMount} from 'vue';
import axios from 'axios';
export default {
    setup() {
        const vehiculos = reactive([]);
        const vehiculo = ref('');
        const getVehiculos =async()=>{
            let response;
            try {
                response = await axios.get('/vehiculos');
            } catch (error) {
                //marcar error
                return;
            }

            if (response.data != 200) {
                //marcar error
                return;
            }
            vehiculos = response.data;
        }
        const saveVehiculo = async(id)=>{
            let response;
            try {
                response = await axios.post('/vehiculo', id);
            } catch (error) {
                //marcar error
                return;
            }

            if (response.data != 200) {
                //marcar error
                return;
            }
            await getVehiculos();
        }
        const addVehiculo = async()=>{
            vehiculo.value = this.$swal.fire(
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
            if (vehiculo.value != '') {
                this.$swal.fire('${vehiculo} se ha añadido al garaje.')
                return;    
            }
            await saveVehiculo(user.id);
        }

        onBeforeMount(() => {
            getVehiculos();
        });
        return{
            showVehiculo,
            vehiculos,
            addVehiculo
        }
    },
}
</script>


<style lang="scss" scoped>

</style>