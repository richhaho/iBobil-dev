<template>
  	
</template>

<script>
// import {mapGetters} from 'vuex';
import axios from 'axios';

export default {
    name: 'Logout',

    data(){
        return{
            
        }
	},
    beforeCreate(){
        var self=this;
        var token = localStorage.getItem('token');
        if(token){
            this.$store.dispatch('getLogout')
                .then((data)=>{                    
                    this.$router.replace('/login') ;        
                })
                .catch((error)=> {
                    this.$router.replace('/login') ;                 
                });
        }
        this.$router.replace('/login');  
    }
}
	
</script>

<style scoped>
    .red{
        color:red;
    }
    .green{
        color:green;
    }
</style>
