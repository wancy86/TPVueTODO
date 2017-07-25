<template>
  <app-layout>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <h3>Issue List</h3>
          
          <div class="form-group col-sm-10" style="padding-left:0px;">
            <input v-model="IssueDesc" type="text" class="form-control" placeholder="Issue Descrition">
          </div>
          <div class="form-group col-sm-2" style="padding-right:0px;">
            <button @click="addIssue" class="btn btn-success" type="button"><span class="glyphicon glyphicon-plus"></span> Add</button>
          </div>

          
          <div class="list-group col-sm-12" v-for="(issue,index) in IssueList">
            <a style="background-color:#5cb85c;" href="#" class="list-group-item">{{index+1}}. {{issue.IssueDesc}}</a>
            <a href="#" class="list-group-item" v-for="(comment,index) in issue.comments">{{index+1}}. {{comment}}</a>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="comments">
              <div style="sursor:pointer" class="input-group-addon">Comment</div>
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
      IssueDesc: '',
      IssueList: [{IssueDesc:"test issue",comments:['123','123345','22222']}],
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
    addIssue: function  () {
      console.log('XXXX: ',this.IssueDesc)
      this.IssueList.push({
        IssueDesc:this.IssueDesc,
        comments:[]
      });
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
