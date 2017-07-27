<template>
  <app-layout>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <h3>Issue List</h3>
          
          <div class="form-group col-sm-10" style="padding-left:0px;">
            <input v-model="issue_desc" type="text" class="form-control" placeholder="Issue Descrition">
          </div>
          <div class="form-group col-sm-2" style="padding-right:0px;">
            <button @click="addIssue" class="btn btn-success" type="button"><span class="glyphicon glyphicon-plus"></span> Add</button>
          </div>

          
          <div class="list-group col-sm-12" v-for="(issue,index) in issue_list">
            <a style="background-color:#5cb85c;font-weight:bold;" href="#" class="list-group-item"><span class="glyphicon glyphicon-star"></span> {{index+1}}. {{issue.issue_desc}}<button @click="removeIssue(index)" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
            <a href="#" class="list-group-item" v-for="(comment,cindex) in issue.comments">{{cindex+1}}. {{comment}} <button @click="removeComment(index,cindex)" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="new comment" v-model="comment">
              <div @click="saveComment(index,cindex)" class="input-group-addon btn">Comment</div>
            </div>
          </div>

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
      issue_desc: '',
      comment: '',
      active_issue_id: 1,
      issue_list: [{issue_id:1, issue_desc:"test issue", comments:['123','123345','22222']}],
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
      },
    issueExists: function () {
      var result = 0;
      for(var i=0;i<this.issue_list.length;i++){
        if(this.issue_list[i].issue_desc==this.issue_desc)
        {
          result = 1;
          break;
        }
      }
      return result;
    },
    addIssue: function() {
      if(this.issue_desc!='' && this.issueExists()==0){
        this.issue_list.push({
          issue_desc: this.issue_desc,
          comments: []
        });
      }
    },
    removeIssue: function(index) {
      var issue = this.issue_list[index];
      console.log(issue);
    },
    removeComment: function(index,cindex) {
      var issue = this.issue_list[index];
      var comment = issue.comments[cindex];
      console.log(comment);
    },
    saveComment: function(index,cindex) {
      console.log('xxx: ',this.comment);
    }
    
  },
  created: function  () {
    //get init data
    console.log('XXXX: ','created')
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
