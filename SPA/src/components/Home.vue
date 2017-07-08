<template>
  <app-layout>
    <div class="row">
      <div class="col-md-12">
          <h3>Home is here</h3>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/components/app-layout'

export default {
  name: 'home',
  data () {
    return {
      msg: 'Welcome to Your Vue.js home'
    }
  },
  components: {AppLayout}
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
