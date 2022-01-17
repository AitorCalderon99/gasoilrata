<template>
    <div class="caja-display container rounded-top-left rounded-bottom-right">
        <div class="row">
            <div class="col-sm-3">28-11-2021</div>
        </div>
        <dov class="row">
            <img src="#" alt="logo gasolinera" class="col-md-3">
            <h3 class="col-md-6">Plaza Ernesto Ercoreka</h3>
        </dov>
        <div class="row">
            <div class="total col-">{{total}}</div>
            <div class="litros col-3">30</div>
            <div class="precio-litros col-6">1.445€</div>
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