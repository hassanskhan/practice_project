<template>
    
    <div>
       
        <h1>Create Post</h1>
        <hr>
 


<p v-if="errors.length">

<ol>
    <li  class="error" v-for="error in errors">{{error}}</li>
</ol>

</p>

<div class="form-group">
<label for="">Title</label>

    <input type="text" class="form-control" id="title" placeholder="Enter Title Here" v-model="createpost.title">
  
    </div>

    <div class="form-group">
    
    <label for="">Description</label>

    <textarea class="form-control"  id="description" rows="3"  placeholder="Enter Description" v-model="createpost.description"></textarea>
    <span class="text-danger" v-if="errors.description"></span>

    </div>
    <button class="btn btn-success" @click="save">create post</button>
    </div>

</template>

<script>

export default {
    name : "create-post",
    data(){
        return{
           
            createpost :
            {
                title : "",
                description : "",   
            },
            errors : [],
           
        }
    },
    methods:{
       save()
       {    
  
                 
                
                       axios.post('/user/createform',{
               
              data:this.createpost
              

           }).then(function(response){

               console.log('Stored-Data',response.data);
               
            
                alert('Post Created Successfully');  
                location.reload();
                
           }).catch((errors)=> {

              console.log(errors);
            
           });
            
        
                         
                
               
                 
         

       },
       

    }
}
</script>

<style scoped>

.error
{

border: 3px;
border-radius: 5px;
background-color: red;
color: white;
font-weight: bold;



}

</style>