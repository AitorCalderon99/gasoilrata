<template>
    <form @submit="">

    </form>
</template>
<script>
import { reactive, ref } from '@vue/runtime-core'
export default {
    setup() {
        const userData = ref([]);
        const getVehiculos = async () => {
            let response;
            try {
                response = await axios.get("usuarios/" + id_user);
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
        return{
            userData
        }
    },
}
</script>