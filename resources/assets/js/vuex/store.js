import Vue from 'vue'
import Vuex from 'vuex'


import chart from './modules/charts/charts'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        chart
    }
})

export default store