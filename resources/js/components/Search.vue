<template>
<div class="w-50 inputdiv d-flex mx-auto mt-4 border border-grey shadow-sm" >
    <img src="/png/search.png" class="search-icon mt-2 ml-3">
    <input type=text name="search" class="w-100 custom ml-3" placeholder="search ">
</div>
</template>
<script>
    export default {
        props:['userId','follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data:function(){
                return{
                  
                }
        },
        methods:{
        
        }
    
}
</script>
<style>
.inputdiv{
height:40px;
padding:auto;
border-radius:18px;
overflow:hidden;

}
.search-icon{
    width:22px;
    height:20px;
}
</style>