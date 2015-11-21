<template>
  	<div>
		<!-- <headerCommon></headerCommon> -->
		<div class="top-banner banner" v-if="brand_top_image" v-bind:style="{ backgroundImage: 'url(' + brand_top_image + ')' }">
			<div class="gradient-back">
				<div class="container">
					<div class="banner-content">
						<p class="sign_letter" v-if="brand_top_sub_headline">{{ brand_top_sub_headline }}</p>
						<p class="sign_letter" v-else>gode tilbud</p>
						<h1 v-if="brand_top_headline">{{ brand_top_headline }}</h1>
						<h1 v-else>SE ALLE VÅRE<br> MERKER</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="brand-banner banner" v-else>
			<div class="gradient-back">
				<div class="container">
					<div class="banner-content">
						<p class="sign_letter" v-if="brand_top_sub_headline">{{ brand_top_sub_headline }}</p>
						<p class="sign_letter" v-else>gode tilbud</p>
						<h1 v-if="brand_top_headline">{{ brand_top_headline }}</h1>
						<h1 v-else>SE ALLE VÅRE<br> MERKER</h1>
					</div>
				</div>
			</div>
		</div>	
		<div class="container">
			<div class="container">
				<p style="text-align:center;width:60%;margin:0 auto;font-weight:bold">iCaravan er Norges største forhandler av bobil / campingbil. Vi fører de ledende mekene Eura Mobil, Challenger,Mobilvetta,Concorde, CaravelAir og Isabella.</p>
				<p style="text-align:center;width:60%;margin:0 auto;font-weight:bold">Ta Turen innom Tromøs - her ligger landets største varehus for mobile ferier.</p>
				<p style="text-align:center;width:60%;margin:0 auto;font-weight:bold">Hos oss finner du helt sikkert en bobil som passer for deg!</p>
			</div>
			<div class="row" style="width:80%;margin:0 auto">	
				<div class="col-md-4 row product-section product-section1 brand-box pointer" v-for="brand in updatedbrands" @click="gotobrand(brand.slug)">				
					<img :src="brand.logo" alt="" style="height: auto;width: 200px;">				
				</div>
			</div>
		</div>		
		<contactinfo></contactinfo>	
  	</div>
</template>


<script>
// import {mapGetters} from 'vuex';
import contactinfo from './contactinfo'


export default {
		components: {
	      contactinfo
	  },
	  metaInfo () {
      return {
        title: this.meta_title,
        meta: [
          { vmid: 'description', name: 'description', content: this.meta_description }
        ]
      }
    },
    data()
    {
        return{
			title: 'CreateSite',
			user:{
				errors:[],
				
				_id: '',
				villa: '',
				email: ''			
			},
			contactForm: [
				{
					title: "Få et tilbud",
					description: "Fyll ut et enkelt skjema og vi tar kontakt med deg.",
					icon: require("../../img/icons/contact-form1.png"),
					linkString: "GÅ TIL SKJEMA"
				},
				{
					title: "Søk finansiering",
					description: "Vi hjelper deg med finansiering av din bobil.",
					icon: require("../../img/icons/contact-form2.png"),
					linkString: "LÅNEKALKULATOR"
				},
				{
					title: "Kundeservice",
					description: "Vi er her for deg etter handelen også.",
					icon: require("../../img/icons/contact-form3.png"),
					linkString: "KONTAKT OSS"
				}
			],
			productData: [
				{
					name: "Challenger SIRIUS 3018",
					productionDate: "2012",
					distance: 36600,
					cost: 719000,
					sub: "Autoriser NCB-forhandler",
					img: require("../../img/motorhome1.png")
				},
				{
					name: "Challenger SIRIUS 3018",
					productionDate: "2012",
					distance: 36600,
					cost: 719000,
					sub: "Autoriser NCB-forhandler",
					img: require("../../img/motorhome2.png")
				},
				{
					name: "Challenger SIRIUS 3018",
					productionDate: "2012",
					distance: 36600,
					cost: 719000,
					sub: "Autoriser NCB-forhandler",
					img: require("../../img/motorhome3.png")
				},
				{
					name: "Challenger SIRIUS 3018",
					productionDate: "2012",
					distance: 36600,
					cost: 719000,
					sub: "Autoriser NCB-forhandler",
					img: require("../../img/motorhome4.png")
				}
			],
			contactInfo: [
				{
					img: require("../../img/icons/contact-icon1.png"),
					title: "Besøk oss i dag  Strandvegen 144B, 9006 Tromsø Google Kart"
				}
			],
			products:[],
			temparray:[],
			brands:[],
			updatedbrands:[],
			challengerProducts:[],
			MobilvettaProducts:[],
			infos:[],
    	home_top_sub_headline:'',
    	home_top_headline:'',
    	home_top_text:'',
    	home_top_image:'',
    	brand_top_headline:'',
    	brand_top_sub_headline:'',
    	// brand_top_text:'',
    	brand_top_image:'',	
    	meta_title:'',
	      	meta_description:''		
			
    }
	},
	methods: { 
		saveId(id) {  
			this.$router.push({path :'/bobil/'+id});                          

			// console.log(id);
			// this.$store.dispatch('getRVData', id)
			// 	.then((data)=>{
			// 		this.$router.push({path :'/single_RV'});                          
   //      })
   //      .catch((error)=> {
   //          console.log('error:',error);           
   //      });
			// }, 300);
		}, 		  	
		gotobrand(id) {  
			this.$router.push({path :'/merker/'+id});                          
			
			// this.$store.dispatch('getBrandData', id)
			// 	.then((data) => {
	  //         if(data){
	  //         	// console.log(data);
			// 				this.$router.push({path :'/merker_caravan'});	                     	               
	  //         }       
	  //     })
	  //     .catch((error)=> {
	  //         console.log('error:',error);           
	  //     }); 
			// setTimeout(function(){ 
			// }, 300);
		},
	},
	created() {
		var self=this;
		this.$store.dispatch('getAllBrand')
	                .then((data) => {
	                    if(data){
	                        self.brands = data.brands;	
	                        this.$store.dispatch('getAll')
						                .then((data)=>{
						                    if(data){
						                    		var chunks = function(array, size) {
																		  var results = [];
																		  while (array.length) {
																		    results.push(array.splice(0, size));
																		  }
																		  return results;
																		};
						                        self.products = data.products;
						                        self.products = self.products.filter((product) => {
																			  return product.active == 1;
																		});
						                        self.brands.forEach(function(brand) {
																		  // console.log(brand);
																		  brand.products = self.products.filter((product) => {
																			  return product.adata.make == brand.name;
																			});
																			brand.products = chunks(brand.products,4);

																		});
																		self.updatedbrands = self.brands;
						                    }        
						                })
						                .catch((error)=> {
						                    console.log('error:',error);           
						                }); 				                
	                    }       
	                })
	                .catch((error)=> {
	                    console.log('error:',error);           
	                });

	   this.$store.dispatch('get_home')
	      .then((data)=>{
	          if(data){
	            self.infos = data.infos;
	            self.home_top_headline = self.infos.filter((product) => {
									  return product.key == 'home_top_headline';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'home_top_headline';
								})[0].value : '';
							self.home_top_sub_headline = self.infos.filter((product) => {
									  return product.key == 'home_top_sub_headline';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'home_top_sub_headline';
								})[0].value : '';  
							self.home_top_text = self.infos.filter((product) => {
									  return product.key == 'home_top_text';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'home_top_text';
								})[0].value : '';  
							self.home_top_image = self.infos.filter((product) => {
									  return product.key == 'home_top_image';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'home_top_image';
								})[0].value : '';  
							self.brand_top_headline = self.infos.filter((product) => {
									  return product.key == 'brand_top_headline';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'brand_top_headline';
								})[0].value : '';  
							self.brand_top_sub_headline = self.infos.filter((product) => {
									  return product.key == 'brand_top_sub_headline';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'brand_top_sub_headline';
								})[0].value : '';  
							self.brand_top_image = self.infos.filter((product) => {
									  return product.key == 'brand_top_image';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'brand_top_image';
								})[0].value : ''; 

							self.meta_title = self.infos.filter((product) => {
									  return product.key == 'brand_meta_title';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'brand_meta_title';
								})[0].value : '';	

							self.meta_description = self.infos.filter((product) => {
									  return product.key == 'brand_meta_description';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'brand_meta_description';
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

<style scoped>
	.product-panel1:hover{
		border:none;
	}
	.product1 {
     width: 25%; 
	}

	.product-section1 {
    margin: 25px 0;
    overflow: hidden;
    height: auto;
	}
	.product-panel1 {
	    width: auto; 
	    margin: 20px 10px;
	    border-radius: 20px;
	    float: left;
	}
	.product-panel1 img {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
	}
	.pointer{
		cursor:pointer;
	}
	.flex-between{
		display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    align-items: baseline;
	}
	.color-blue{
		color:#79c7ff;
	}
	.color-blue{
		    /*color: #3A8ECA;*/
		    color:#79c7ff;
	}
	.color-grey{
		color:#ababab;
	}
	.flex-between{
		display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
	}
	.product-title{
		color: #000;
	}
	.product-title:hover{
		color: #2D9EDC;
	}

	.property {
    font-family: 'Gotham-Bold';
	}

	.sub-section-gap {
    padding: 0 10px;
	}

	.sub-section {
	    border-top: 1px solid #D1DBE4;
	    border-bottom: 1px solid #D1DBE4;
	}
	.cost {
    font-family: 'Gotham-Bold';
    margin: 0;
	}
	.sub-section-gap {
    padding: 0 10px;
	}
	.sub-section {
    padding: 10px;
	}
	.product-section .product .col-md-12 .sub-section button {
    width: 100%;
    margin: 5px 0;
	}
	.m-20-0{
		margin:20px 0px;
	}

	.product-hover:hover {
	    border: 1px solid #d1dbe4;
	}
	.button-1{
		width: 100%;
    margin-bottom: 10px;
    box-shadow:none;
	}
	.button-2{
		width: 100%;
	}

	.sub-section1 {
	    border-top: 1px solid #D1DBE4;
	    border-bottom: none;
	}
	.sub-section3 {
    border-top: none;
    border-bottom: none;
	}
	.myproduct{
		 border-radius: 20px; 
	}

	.pointer{
		cursor:pointer;
	}
	.width100{
		width:100%;
	}

	.top-radius{
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    max-height: 180px;
	}
	.product-title{
		min-height: 50px;
	}
	.product-tag{		
    position: relative;    
    font-size: 0.8em;
    display:block;
    text-align:right;
    top: 30px;
    right: 10px;
	}
	.product-tag-inside{
		background: #63bf34;
    color: white;
    padding: 5px 15px; 
    border-radius: 15px;       
	}
	a{
		display:block;
		text-align:center;
		color:white;
	} 

	.banner-content{
		margin: auto;
    margin-top: 50px !important;
    margin-left: 80px !important;    
	}

	.banner-content h1{
		font-size: 33px;
    font-family: 'Gotham-Black';
    color:white;
	}

	@media only screen and (max-width: 580px) {
    .product1 {
	     width: 100%; 
		}
		.top-radius{
	    max-height: none;
		}
	}
	.banner .gradient-back {
	    background-color: #00000054;
	    background-image:none;
	    height: 100%;
	    padding-top: 150px;
	    padding-left: 30vw;
	    background-repeat: no-repeat;
	    /*-webkit-transform: skew(-3deg);
    	-moz-transform: skew(-3deg);
    	-o-transform: skew(-3deg);*/
	    border-radius: 60px; 

	}
	.brand-banner {
	    border-radius: 60px; 
	    background-size: cover;
	    background-position-y: center;
	    -webkit-transform: skew(-3deg);
	    -moz-transform: skew(-3deg);
	    -o-transform: skew(-3deg);
	    margin-top:15px;
	}
	.sign_letter{
		color:white !important;
	}

	.brand-box{
		padding: 10px 20px;
    text-align: center;
    border-radius: 5px;
    min-height:100px;
    display: flex;
    align-items: center;
    justify-content:center;
    transition: all 250ms cubic-bezier(0.02, 0.01, 0.47, 1);
	}
	.brand-box:hover{
		box-shadow: 0 10px 20px rgba(0,0,0,0.15);
	}
</style>
