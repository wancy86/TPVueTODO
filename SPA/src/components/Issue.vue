<template>
<a @click="switchComments(index)" style="background-color:#5cb85c;font-weight:bold;" href="#" class="list-group-item">
  <span class="glyphicon glyphicon-star"></span> {{index+1}}. {{issue.issue_desc}}
  <button @click="removeIssue(index)" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</a>
</template>

<script>

export default {
  name: 'issue',
  props: ['issue','index'],
  data () {
    return {

    }
  },
  components: {},
  methods: {
    switchComments: function (index) {
      this.$emit('switchComments', {index: index});
    },
    removeIssue: function(index) {
      this.$emit('removeIssue',{index:index});
    },
  },
  //hook 
  created: function  () {
    //get init data

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
