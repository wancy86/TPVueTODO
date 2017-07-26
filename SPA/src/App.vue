<template>
  <div id="app">
    <router-view></router-view>
    <!-- <div class="col-md-8 col-md-offset-2">
    </div> -->
  </div>
</template>

<script>
import VueRouter from 'vue-router'
import Vue from 'vue'
Vue.use(VueRouter)

export default {
  name: 'app'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /*text-align: center;*/
  color: #2c3e50;
  margin-top: 5px;
}
</style>
