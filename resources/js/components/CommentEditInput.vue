<template>
    <div ref="commentor">
     <div class="comment-display d-flex mt-4 border-bottom p-3">
    <a v-bind:href="'/profile/'+user_id">
    <img v-bind:src="profimg"  class="profimg" />
    </a>
    <p class="mt-2 ml-3"> {{ comm }} </p>
     </div> 
     <div class="d-flex mt-1  w-100 justify-content-end">
            <span v-if="deletable==true" class=" mr-3 custom-color" @click="Deleting">Delete</span>
            <span v-if="editable==true" class="custom-color" id="commentEdit" @click="Editing" >Edit</span>
            </div> 
    <div class="input-container"> 
    <input v-model="newComm"  v-on:keyup.enter="editcomment" type="text" style="width:50%;">
    </div>
    </div>
</template>

<script>

export default{
      props:{
          recipe_id:Number,
          comment_id:Number,
          user_id:String,
          editable:Boolean,
          deletable:Boolean,
          comment:String,
          profimg:String
      },
      data:function(){
          return{
          comm :this.comment,
          newComm:this.comment,
          }
      },
      methods:{
          Deleting(){
              if(confirm('Do you really want to delete the comment')){
                  console.log('Deleting the stuff');
                  axios.post('/comment-delete',{
                      commid:this.comment_id
                      
                  })
                  .then(response=>{
                      console.log(response.data);
                       
                  })
                  .catch(errors=>{
                           if(errors.response){
                          console.log(errors.response.data);
                         
                      }
                      
                  });
                  this.$refs.commentor.setAttribute('style','display:none;');
              }
          },
          Editing(){
              document.getElementById('commentor'+this.comment_id).querySelector('.input-container').classList.toggle('edit');
          },
          editcomment(event){
              event.preventDefault();
              if(this.comm.length>0){
                  console.log(this.comm);
                  axios.post('/comment-edit',{
                      commid:this.comment_id,
                      comment:this.newComm
                  })
                  .then(response=>{
                      console.log(response.data);
                      this.comm=this.newComm;
                  })
                  .catch(errors=>{
                      if(errors.response){
                    
                          console.log(errors.response.data);
                      
                      }
                      
                  });

              }else{
                  console.log("There is no data");
              }
          }
      }

}
</script>
<style>
.input-container{
     height:0px;
     overflow:hidden;
     transition:0.3s ease;
     -webkit-transition:0.3s ease;
     -moz-transition:0.3s ease;
}
.edit{
    height:30px;
}
span{
    cursor:pointer;
}
</style>