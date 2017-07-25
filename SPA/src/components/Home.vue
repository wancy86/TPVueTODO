<template>
  <app-layout>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <h3>Home is here</h3>
          <h4>{{name}}</h4>
          <input type="text" :value="name" @change="changeName()">
          <input type="text" v-model="name">
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/components/app-layout'
import axios from 'axios'

export default {
  name: 'home',
  data () {
    return {
      msg: 'Welcome to Your Vue.js home',
      name:'test',      
    }
  },
  components: {AppLayout},
  methods: {
    changeName: function() {
        this.$data.name+='...';
        axios.get('static/data/data.json').then(function  (resp) {
          console.log('XXXX: ',resp)
        }).catch(function  (err) {
          console.log('XXXX: ',err)
        })
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
