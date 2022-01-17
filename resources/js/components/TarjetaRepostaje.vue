<template>
    <div class="caja-display card rounded-top-left rounded-bottom-right">
        <div class="card-header">
            <div class="">28-11-2021</div>
        </div>
        <dov class="card-body">
            <img src="#" alt="logo gasolinera" class="">
            <h3 class="">Plaza Ernesto Ercoreka</h3>
        </dov>
        <div class="card-footer">
            <div class="">{{total}}</div>
            <div class="">30</div>
            <div class="">1.445€</div>
        </div>
    </div>
</template>

<script>
import { onBeforeMount, reactive } from '@vue/runtime-core'

export default {
    setup() {
        const total = reactive();

        const getTotal = () => {
            total = $(".litros") * $(".precio-litros");
        }

        onBeforeMount( () => {
            getTotal();
        })

        return total;
    },
}
</script>

<style lang="scss">
    @import '../../sass/tarjetarespostaje.scss';
</style>