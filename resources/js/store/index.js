import { createStore } from "vuex";

export default createStore({
    state() {
        return {
            prices: {
                g95: 1.54,
                g98: 1.68,
                diesel: 1.44
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