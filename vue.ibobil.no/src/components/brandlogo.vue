<template>
<div class="brand-section">
	<div class="container">
		<div class="brand-wrapper">
			<div class="brand">
				<div v-for="brand in brands" style="margin-right:30px">
					<img :src="brand.logo" alt="" @click="brandclick(brand.id)" class="pointer width-100">
				</div>				
			</div>
		</div>
	</div>
</div>
</template>

<script>
// import footerCommon from './footerCommon'
// import {mapGetters} from 'vuex';
export default {
	
  data(){
    return{
    	brands:[]
			}
	},
	mounted() {
		
	},
	created() {
		var self=this;
		this.$store.dispatch('getAllBrand')
      .then((data) => {
          if(data){
              self.brands = data.brands;              				                
          }       
      })
      .catch((error)=> {
          console.log('error:',error);           
      }); 
		
	},
	methods:{
		
		brandclick(id){
			
			this.$store.dispatch('getBrandData', id)
				.then((data) => {
	          if(data){
	          	// console.log(data);
							this.$router.push({path :'/merker_caravan'});	                     	               
	          }       
	      })
	      .catch((error)=> {
	          console.log('error:',error);           
	      }); 
		},

	}

}
	
</script>

<style scoped>
	.pointer{
		cursor:pointer;
	}
	.width-100{
		width:200px;
		height:auto;

	}
</style>
