import { createStore } from "vuex";

export default createStore({
    state() {
        return {
            prices: {
                g95: 1.23,
                g98: 1.23,
                diesel: 1.23
            },
            id_vehiculo : 1,
        }
    },
    mutations: {
        setg95Price(state, price){
            state.prices.g95 = price;
        },
        setIdVehiculo(state, id_vehiculo) {
            state.id_vehiculo = id_vehiculo;
        }
    }

});