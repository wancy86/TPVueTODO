<template>
  <app-layout>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <h3>Issue List</h3>
          
          <div class="form-group col-sm-10" style="padding-left:0px;">
            <input @keyup.enter="addIssue" v-model="issue_desc" type="text" class="form-control" placeholder="Issue Descrition">
          </div>
          <div class="form-group col-sm-2" style="padding-right:0px;">
            <button @click="addIssue" class="btn btn-success" type="button"><span class="glyphicon glyphicon-plus"></span> Add</button>
          </div>
          
          <div class="list-group col-sm-12" v-for="(issue,index) in issue_list">
            <issue :issue="issue" :index="index" @switchComments="switchComments" @removeIssue="removeIssue"></issue>
            <comment v-show="issue.show_comments" :issue="issue" :index="index" @removeComment="removeComment" @saveComment="saveComment"></comment>
          </div>

      </div>
    </div>
  </app-layout>
</template>

<script>
import axios from 'axios'
import AppLayout from '@/components/app-layout'
import Issue from '@/components/Issue'
import Comment from '@/components/Comment'

export default {
  name: 'home',
  data () {
    return {
      issue_desc: '',
      active_issue_id: 1,
      issue_list: [],
      // issue_list: [{issue_id:1, issue_desc:"test issue", show_comments: 1, comments:[{cid:1,content:"hello"}]}],
    }
  },
  components: {AppLayout, Issue, Comment},
  methods: {
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
      var that = this;
      var issue_desc = this.issue_desc;
      if(issue_desc!='' && this.issueExists()==0){
        axios.post('issue/save', {'title':issue_desc})
        .then(function (resp) {
          that.issue_list.push({
            issue_desc: issue_desc,
            comments: [],
            show_comments: 0
          });
        });
      }
      this.issue_desc='';
    },
    switchComments: function (data) {
      var index = data.index
      var issue = this.issue_list[index];
      issue.show_comments = (issue.show_comments||0)^1;

      if(issue.show_comments && !issue.comments){
        axios.get('comment/index/iid/'+issue.issue_id)
        .then(function (resp) {
          issue.comments = resp.data;
        });
      }
    },
    removeIssue: function(data) {
      var index = data.index
      var that = this;
      var issue = this.issue_list[index];
      axios.get('issue/delete/id/'+issue.issue_id)
      .then(function (resp) {
        that.issue_list.splice(index,1);
      });
    },
    removeComment: function(data) {
      var index = data.index, cindex = data.cindex;
      var issue = this.issue_list[index];
      var comment = issue.comments[cindex];
      axios.get('comment/delete/cid/'+comment.cid)
      .then(function  (resp) {
        issue.comments.splice(cindex,1);
      });
    },
    saveComment: function(data) {
      var index = data.index;
      var comment = data.comment;
      var that = this;
      var issue =that.issue_list[index];
      var data = {
        iid: issue.issue_id,
        content: comment
      };

      axios.post('comment/save/',data)
      .then(function  (resp) {
        issue.comments=issue.comments||[];
        issue.comments.push({
          cid: resp.data,
          content: comment
        });
      });
      
      //clear comment input
      this.comment="";
    }

  },
  //hook 
  created: function  () {
    //get init data
    var that =this;
    axios.get('issue/index')
    .then(function (resp) {
      that.issue_list=resp.data;
    });
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
