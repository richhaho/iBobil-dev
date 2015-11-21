<template>
  	<div class="col-md-10 col-sm-12 sider-wrapper">
		<div class="title-bar row">
			<span class="font-25">Sider</span>
			<avatar></avatar>
		</div>
		<div class="row">
      <div v-if="showSuccess" class="green">{{ successMessage }}</div>
      <div v-if="showError" class="red" v-for="error in errorMessage">{{ error }}</div>

			<div class="col-md-10 col-sm-12 mt-50">
				<div class="mb-50">
					<h3 class="my-heading">UKENS BOBIL</h3>
					<select name="weekly_motorhome" id="weekly_motorhome" class="form-control" v-model="weekly_motorhome">
						<option :value="product.id" v-for="product in products" >{{product.name}}</option>
					</select>
				</div>
				<div class="mb-50">
					<h3 class="my-heading">SISTE NYESTE BOBIL</h3>
					<select name="new_motorhome" id="new_motorhome" class="form-control" v-model="new_motorhome">
						<option :value="product.id" v-for="product in products" >{{product.name}}</option>
					</select>
				</div>
				<div class="mb-50">
					<h3 class="my-heading">SISTE BRUKTE BOBIL</h3>
					<select name="used_motorhome" id="used_motorhome" class="form-control" v-model="used_motorhome">
						<option :value="product.id" v-for="product in products" >{{product.name}}</option>
					</select>
				</div>
				<div class="mb-50">
					<h3 class="my-heading">BOBIL PA TILBUD</h3>
					<select name="sale_motorhome" id="sale_motorhome" class="form-control" v-model="sale_motorhome">
						<option :value="product.id" v-for="product in products" >{{product.name}}</option>
					</select>
				</div>

				<div style="height:1px;background-color:#cbcbcb;margin:10px 0px 50px 0px"></div>
				
				<div class="mb-50">
					<h3 class="my-heading">Meta tittel</h3>					
					<input type="text" class="form-control" v-model="meta_title">
				</div>
				<div class="mb-50">
					<h3 class="my-heading">Metabeskrivelse</h3>					
					<input type="text" class="form-control" v-model="meta_description">
				</div>
				<!-- <div class="panel col-md-12">
					<div class="form-group">
						<p class="input-label">
							<label for="">Metabeskrivelse</label>
							<span>Maximum 60 characters</span>
						</p>
						<input type="text" class="form-control input-lg" value="" ref="meta_title">
					</div>
					<div class="form-group">
						<p class="input-label">
							<label for="">Metabeskrivelse</label>
							<span>Maximum 300 characters</span>
						</p>
						<input type="text" class="form-control input-lg" value="" ref="meta_description">
					</div>
				</div> -->						

			</div>					
			<div class="col-md-2 col-sm-12 update-btn">
				<button class="btn btn-lg" @click="submit_form">OPPDATER</button>
			</div>
		</div>
	</div>
</template>


<script>
	import { VueEditor } from 'vue2-editor'
	import avatar from './avatar'


    // $(document).ready(function() {
    //     $('#summernote').summernote();
    // });
	import {mapGetters} from 'vuex';
	export default {
		computed: {
			...mapGetters({
				ProductData: 'ProductData',
			})
		},
		components: {
	    VueEditor,
	    avatar
	  },
	  data(){
			return {
				content: ''  ,
				successMessage:'',				
				showSuccess:false,		
				errorMessage:'',				
				showError:false,
	      brands:[],
      	image:'',
      	showclosebtn:false,
      	products:[],
      	weekly_motorhome:'',
      	new_motorhome:'',
      	used_motorhome:'',
      	sale_motorhome:'',
      	infos:[],
      	meta_title:'',
      	meta_description:'',
	    }
		},
		methods: {  		  	
			submit_form() {
	      this.showSuccess = false;

				var self = this;
				this.$store.dispatch('update_home',{
						weekly_motorhome:self.weekly_motorhome,
						new_motorhome:self.new_motorhome,
						used_motorhome:self.used_motorhome,
						sale_motorhome:self.sale_motorhome,
						meta_title:self.meta_title,
						meta_description:self.meta_description,
					})
	        .then((data)=>{
	            if(data.success){
	            	// console.log(data.message);
	                self.showSuccess = true;
	                self.successMessage = data.message;
	                // console.log(self.successMessage);
	            } else{
	            	if(data.message == 'Unauthenticated'){
	            		localStorage.removeItem('token');
                	localStorage.removeItem('user-info');
	            		self.$router.push({ name: 'login' });
	            	}
	              self.invalidError  = data.message;                                       
	              self.showInvalidError  = true;
	            }        
	        })
	        .catch((error)=> {
	            console.log('error:',error);           
	        });
			} 	
		},
		created(){
        this.$store.state.current_path = this.$route.path;
			
			var self=this;
      this.$store.state.current_path = this.$route.path;

			this.$store.dispatch('getRV')
                .then((data)=>{
                    if(data){
                        self.products = data;
                        self.products = self.products.filter((product) => {
																			  return product.active == 1;
																		});	

												self.$store.dispatch('get_home')
						                .then((data)=>{
						                    if(data){
						                      self.infos = data.infos;
						                      self.weekly_motorhome = self.infos.filter((product) => {
																			  return product.key == 'weekly_motorhome';
																		})[0].value;
																	self.new_motorhome = self.infos.filter((product) => {
																			  return product.key == 'new_motorhome';
																		})[0].value;
																	self.used_motorhome = self.infos.filter((product) => {
																			  return product.key == 'used_motorhome';
																		})[0].value;
																	self.sale_motorhome = self.infos.filter((product) => {
																			  return product.key == 'sale_motorhome';
																		})[0].value;
																	self.meta_title = self.infos.filter((product) => {
																			  return product.key == 'home_meta_title';
																		})[0].value;	
																	self.meta_description = self.infos.filter((product) => {
																			  return product.key == 'home_meta_description';
																		})[0].value;			
						                    } else{

						                    }        
						                })
						                .catch((error)=> {
						                    console.log('error:',error);           
						                }); 			                
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
	.file-label{
    height: 150px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-top: 1px solid #d8d8d8;
	}
	.hide{
		display:none;
	}
	.dropzone-div{
		padding:10px;
	}
	.previous-images-div{
		width:100%;
		padding:10px;
	}
	.green{
      color:green;
      padding: 20px 10px 0px 10px;
  }
  .red{
  		color:red;
      padding: 20px 10px 0px 10px;
  }
  .remove-btn{
  	position: relative;
    top: -25px;
    left: -10px;
    cursor:pointer;
    color:#909090;
  }


 	/*testing*/
    .red{
        color:red;
    }
    .green{
      color: #f2fff2;
	    padding: 10px;
	    background: #3bcb9c;
    }
    input[type="file"] {
		    display: none;
		}
		#brand_image_label{
			cursor:pointer;
		}
		.pro-image{
    	height: 100px;
		}
		.show{
			display:block;
		}
		.label-class{
			width: 100%;
    	background: #dedede;
    	display: flex;
	    align-items: center;
	    justify-content: center;
	    flex-direction: column;
	    min-height: 150px;
		}
		.comment{
			    text-align: center;
		}

		.form-input{
			display: block;
	    width: 100%;
	    padding: .375rem .75rem;
	    font-size: .9rem;
	    line-height: 1.6;
	    color: #495057;
	    background-color: #fff;
	    background-clip: padding-box;
	    border: 1px solid #ced4da;
	    border-radius: .25rem;
	    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
	    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
	    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
		}
		.mt-50{
			margin-top:50px;
			padding-left:25px;
		}
		.mb-50{
			margin-bottom:50px;
		}
		.my-heading{
			font-size:12px;
			color:#fff;
			background:#000;
			padding:10px 20px;
			margin-bottom:0px;
		}

		h3, .h3 {
		    font-size: 14px;
		    font-weight:bold;
		    text-transform:uppercase;
		}
</style>
