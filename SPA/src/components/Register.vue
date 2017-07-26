<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="form">
          <h3 class="text-left">Register</h3>
          <div class="form-group">
            <input type="text" class="" placeholder="User name" id="user_name" name="user_name">
          </div>
          <div class="form-group">
            <input type="password" class="" placeholder="Password" id="user_pwd" name="user_pwd">
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-success">OK</button>
            <a href="#/login">Login >></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'register',
  data () {
    return {
      msg: 'Welcome to Your Vue.js register'
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
