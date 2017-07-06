import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import Test from '@/components/Test'
import Register from '@/components/Register'
import Login from '@/components/Login'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Hello',
      component: Hello
    },
    {
      path: '/test',
      name: 'test',
      component: Test
    }
    ,
    {
      path: '/register',
      name: 'register',
      component: Register
    }
    ,
    {
      path: '/login',
      name: 'login',
      component: Login
    }
  ]
})
