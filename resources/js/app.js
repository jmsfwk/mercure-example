import Vue from 'vue'
import './bootstrap'
import App from './App.vue'

new Vue({
    render: function (h) { return h(App) }
}).$mount('#app')
