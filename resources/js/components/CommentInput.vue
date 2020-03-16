<template>
    <div id="commentor">
    <input v-model="comm"  v-on:keyup.enter="sendcomment" type="text" class="custom "  placeholder="comment" style="width:50%;">
    </div>
</template>

<script>

export default{
      props:['recipe','update'],
      data:function(){
          return{
          comm :''
          }
      },
      methods:{
          sendcomment(event){
              event.preventDefault();
              if(this.comm.length>0){
                  console.log(this.comm);
                  console.log('Recipe is '+ this.recipe);
                  axios.post('/comment',{
                      recipe:this.recipe,
                      comment:this.comm
                  })
                  .then(response=>{
                      console.log(response.data);
                  })
                  .catch(errors=>{
                      if(errors.response.status==401){
                          alert('Only authenticated members can add comments');
                      }else{
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