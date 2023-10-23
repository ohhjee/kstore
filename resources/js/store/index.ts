import axios from "axios";
import { createStore } from "vuex";
const store = createStore({
    state: {
        user: [],
        product: []
    },
    getters: {
        auth: (state) => {
            return state.user
        },
        product: (state) => {
            return state.product
        },
        addFavourite: (id) => {
            localStorage.setItem('favourites', JSON.stringify(id))
        }
    },
    actions: {
        // async getUser({ commit }) {
        //     return await axios.get('').then(res => {

        //         console.log(res.data);
        //         commit('setProduct', res.data)
        //         return res
        //     })


        // }

        async SetUser({ commit }) {
            await axios.get(route('')).then(res => {
                // state.user = res.data
            }).catch(error => {
                console.log(error);

            })
        },
        async product({ commit }) {
            await axios.get('').then(res => {
                console.log(res);

                commit('setProduct')

                // state.product = res.data
            }).catch(error => {
                console.log(error);

            })
        }

    },
    mutations: {
        // setuser({ commit }) {
        //     commit('SetUser')
        // },
        setProduct(state, product) {
            state.product = product
        }
    },
    modules: {},
})

export default store
