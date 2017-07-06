<template>
  <div class="form">
    <div class="form-group">
      <input type="text" class="" placeholder="User name" id="user_name" name="user_name">
    </div>
    <div class="form-group">
      <input type="text" class="" placeholder="User name" id="user_name" name="user_name">
    </div>
  </div>
</template>

<script>
export default {
  name: 'login',
  data () {
    return {
      msg: 'Welcome to Your Vue.js login'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
