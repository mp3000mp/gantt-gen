import Vue from 'vue'
import Router from 'vue-router'


import Home from './pages/Home'
import About from './pages/About'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/home',
            component: Home
        },
        {
            path: '/about',
            component: About
        }
    ]
})
