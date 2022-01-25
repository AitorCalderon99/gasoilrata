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
        setPrice(type, price){
            switch (type) {
                case 'g95':
                    state.prices.g95 = price;
                    break;
            
                case 'g98':
                    state.prices.g98 = price;
                    break;
            
                case 'diesel':
                    state.prices.diesel = price;
                    break;
            
                default:
                    break;
            }
        }
    }

});