<template>
<div v-show="issue.show_comments">
  <a href="#" class="list-group-item" v-for="(comment,cindex) in issue.comments">{{cindex+1}}. {{comment.content}}
    <button @click="removeComment(index,cindex)" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </a>
  <div class="input-group">
    <input @keyup.enter="saveComment(index)" type="text" class="form-control" placeholder="new comment" v-model="comment">
    <div @click="saveComment(index)" class="input-group-addon btn">Comment</div>
  </div>
</div>
</template>

<script>

export default {
  name: 'comment',
  props: ['issue','index'],
  data () {
    return {
      comment: '',
    }
  },
  components: {},
  methods: {
    removeComment: function(index,cindex) {
      window.eventHub.$emit('removeComment', {index:index, cindex:cindex});
    },
    saveComment: function(index) {
      window.eventHub.$emit('saveComment', {index: index, comment: this.comment});
      this.comment="";
    }
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
