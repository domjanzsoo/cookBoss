<template>
<div>
    <button class="btn btn-primary mt-3" @click="followUser" v-text="buttonText"></button>
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
                    status:this.follows,
                }
        },
        methods:{
            followUser(){
                axios.post('/follow/'+this.userId)
                .then(response=>{
                    console.log(response.data);
                    this.status= !this.status;
                })
            .catch(errors=>{
                if(errors.response.status==401){
                    alert("Following members is available only for authenticated users.");
                }
            });
        }
        },
        computed:{
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';  
            }
    }
}
</script>
