import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import Test from '@/components/Test'
import Register from '@/components/Register'
import Login from '@/components/Login'
import Home from '@/components/Home'

Vue.use(Router)

export default new Router({
    routes: [{
        path: '/',
        name: 'home',
        component: Home
    }, {
        path: '/test',
        name: 'test',
        component: Test
    }, {
        path: '/register',
        name: 'register',
        component: Register
    }, {
        path: '/login',
        name: 'login',
        component: Login
    }, {
        path: '/hello',
        name: 'hello',
        component: Hello
    }]
})
