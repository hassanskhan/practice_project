<template>
    
<div>
    
</div>

</template>


<script>
export default {
    name : "comment-list",
    props : ['userComments'],
    data(){
        return{
                commentlist : []
        }
    },
    methods : {
        commets(){
            axios.get(`/user/details/{comments}`)
        }
    }    
}
</script>