<template>
<div>
<input ref="ingredientTaker" 
    type="text" 
    v-bind:class="'form-control custom mb-1'+err" 
    name="ingredients"   
    autocomplete="ingredient-taker"
    placeholder="ingredient"
    autofocus
    v-on:keydown.enter="addingredient"
    >
<input type="hidden" name="" id="ingredients"     />
<div class="d-flex row" ref="ingredientDisplay"></div>
</div>
</template>

<script>

export default{
      props:{
          error:String,
          oldIngredients:String,
          },
      data:function(){
          return{
                ingredientArray:[],
                ingredientNumber:0,
                allIngredient:""
          }
      },
      methods:{
       addingredient(event){
           event.preventDefault();
           
            let ingredient=this.$refs.ingredientTaker.value;
            let ingredientContainer=this.$refs.ingredientDisplay;
            var that=this;
            console.log('Ingredient is '+ ingredient);
            let divParent=document.createElement('div');
            let divChild=document.createElement('div');
            divParent.setAttribute('style','width:auto');
            divChild.classList.add('p-2');
            divChild.classList.add('mb-1');
            divParent.classList.add('bg-primary');
            divParent.classList.add('mr-2');
            divParent.classList.add('mb-2');
            divParent.classList.add('col3');
            divParent.classList.add('rounded');
            divParent.classList.add('border');
            divParent.classList.add('d-flex');
            divChild.classList.add('ingname');
            let spanCancel=document.createElement('span');
            spanCancel.innerText='x';
            spanCancel.classList.add('mb-3');
            spanCancel.classList.add('mr-2');
            spanCancel.classList.add('font-weight-bold');
            divChild.innerHTML=ingredient;
            divParent.appendChild(divChild);
            divParent.appendChild(spanCancel);
            ingredientContainer.appendChild(divParent);
            this.$refs.ingredientTaker.value='';

            //adding the value to the ingredient array
            this.ingredientArray.push(ingredient);
            this.ingredientNumber=this.ingredientArray.length;
            console.log(this.ingredientArray);
            spanCancel.addEventListener('click',function(){

                ingredientContainer.removeChild(divParent);
                let ingredientName=divChild.innerText;
                that.removeIngredient(ingredientName);
                
             
            });

    
       },
       removeIngredient(element){
           console.log('Removing ingredient of ' +element);
           
           for(var j=this.ingredientArray.length; j>=0; j--){
               if(this.ingredientArray[j]===element){
                   this.ingredientArray.splice(j, 1);
               }
           }
       }
      }

}
</script>