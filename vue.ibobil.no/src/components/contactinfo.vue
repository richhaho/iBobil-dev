<template>  	
		<div class="article-container container">
			<div class="contact-wrapper">
				<p class="section-title font-33">Lurer du på noe?</p>
				<p class="font-15">Vi står klare til å hjelpe deg både i butikk, over e-post og telefon</p>
				<div class="row">
					<div class="col-md-4">
						<div class="contact-panel">
							<img src="../../img/icons/contact-icon1.png" alt="">
							<p class="font-21 ">Besøk oss i dag</p>							
							<p class="font-15" v-if="address">{{ address }}</p>
							<p class="font-15" v-else>Strandvegen 144B, 9006 Tromsø</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-panel">
							<img src="../../img/icons/contact-icon2.png" alt="">
							<p class="font-21">Send oss en e-post</p>
							<a class="cotact-detail font-15" :href="'mailto:'+email" target="_blank" v-if="email">{{ email }}</a>
							<a class="cotact-detail font-15" href="mailto:salg@icaravan.no" target="_blank" v-else>salg@icaravan.no</a>
							<!-- <p class="cotact-detail font-15" v-if="email">{{ email }}</p>
							<p class="cotact-detail font-15" v-else>salg@icaravan.no</p>			 -->				
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-panel">
							<img src="../../img/icons/contact-icon3.png" alt="">
							<p class="font-21 ">Ring kundeservice</p>
							<a class="cotact-detail font-15" :href="'tel:'+phone" target="_blank" v-if="phone">{{ phone }}</a>
							<a class="cotact-detail font-15" href="tel:+47 954 34 356" target="_blank" v-else>+47 954 34 356</a>
							<!-- <p class="cotact-detail font-15" v-if="phone">{{ phone }}</p>
							<p class="cotact-detail font-15" v-else>+47 954 34 356</p> -->

						</div>
					</div>
					
				</div>
			</div>
		</div>
</template>


<script>
// import {mapGetters} from 'vuex';
export default {
  name: 'contactinfo',

  data(){
    return{			
			infos:[],
	    address:'',
	    email:'',
	    phone:'',
    }
	},
	created(){
		var self=this;
		this.$store.dispatch('get_home')
	                .then((data)=>{
	                    if(data){
	                    		// console.log(data);
	                        self.infos = data.infos;	                        
	                        self.address = self.infos.filter((product) => {
															  return product.key == 'address';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'address';
														})[0].value : '';
	                        self.email = self.infos.filter((product) => {
															  return product.key == 'email';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'email';
														})[0].value : '';
	                        self.phone = self.infos.filter((product) => {
															  return product.key == 'phone';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'phone';
														})[0].value : '';

																			                
	                    } else{

	                    }        
	                })
	                .catch((error)=> {
	                    console.log('error:',error);           
	                }); 
	}
}
	
</script>

<style>
	.image-style{
		height: 200px;
    width: auto;
	}
</style>
