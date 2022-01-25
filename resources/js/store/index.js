import { createStore } from "vuex";

export default createStore({
    state: {
        prices: {
            g95: 0,
            g98: 0,
            diesel: 0
        }
    },
    mutations: {
        setg95Price(state, price){
            state.prices.g95 = price;
        }
    }

});