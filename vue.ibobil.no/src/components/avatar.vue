<template>
  <div class="avarta">
    <span class="font-10">{{ this.$store.state.name }}</span>
  	<img :src="this.$store.state.image" alt="" class="img-style">
  </div>	
</template>
<script>
// import {mapGetters} from 'vuex';

export default {
  
  data(){
		return{
      'image':require('../../img/icons/avarta1.png'),
      'default_image':require('../../img/icons/avarta1.png'), 
      name:''     
		}
	},
  methods: {
               
  },
  created(){
      var token = localStorage.getItem('token');
      var info = localStorage.getItem('user-info');
      if(info){
      	info =JSON.parse(info);
        this.name = info.name;
        this.email = info.email;
        this.$store.state.name = this.name;
        if(info.image){
        	this.image = info.image;
          this.default_image = info.image;
        	this.$store.state.image = info.image;
        }
      }
  }
}
	
</script>
<style scoped>
	.img-style{
		height:30px;
		width:30px;
		border-radius:50%;
	}
</style>
