<template>
  	<div class="col-md-10 col-sm-12 sider-wrapper">
		<div class="title-bar row">
			<span class="font-25">Sider</span>
			<avatar></avatar>
		</div>
		<div class="row">
      <div v-if="showSuccess" class="green">{{ successMessage }}</div>
      <div v-if="showError" class="red" v-for="error in errorMessage">{{ error }}</div>

			<div class="col-md-10 col-sm-12">

				<div class="row">
					<div class="col-md-12">
						<h3>Home Top Sub Headline</h3>
						<input type="text" class="form-control" v-model="home_top_sub_headline" placeholder="gode tilbud">
						<h3>Home Top Headline</h3>
						<input type="text" class="form-control" v-model="home_top_headline" placeholder="BOBILEN DU TRENGER">
						<h3>Home Top Text</h3>
						<vue-editor v-model="home_top_text" id="article_1"></vue-editor>	
						<h3>Home Top Image</h3>
						<label for="home_top_image" class="blue-text font-18 label-class" id="brand_image_label">
							<template v-if="home_top_image">								
								<div class="picture">
									<img :src="home_top_image" alt="" class="pro-image">						
								</div>
							</template>
							<template v-else>
								<div class="comment">
									Upload Home Top Image (1 Image)
									<p class="font-13">Maksimum opplastningsstørrelse er 500KB, JPG, PNG, JPEG.</p>

								</div>
							</template>
							<input type="file" name="home_top_image" id="home_top_image" @change="onFileChange" ref="home_top_image">
						</label>
						<h3>Brand Top Sub Headline</h3>
						<input type="text" class="form-control" v-model="brand_top_sub_headline" placeholder="gode tilbud">
						<h3>Brand Top Headline</h3>
						<input type="text" class="form-control" v-model="brand_top_headline" placeholder="SE ALLE VÅRE MERKER">
						<!-- <h3>Brand Top Text</h3>
						<vue-editor v-model="brand_top_text" id="article_1"></vue-editor>	 -->
						<h3>Brand Top Image</h3>
						<label for="brand_top_image" class="blue-text font-18 label-class" id="brand_image_label">
							<template v-if="brand_top_image">								
								<div class="picture">
									<img :src="brand_top_image" alt="" class="pro-image">						
								</div>
							</template>
							<template v-else>
								<div class="comment">
									Upload Brand Top Image (1 Image)
									<p class="font-13">Maksimum opplastningsstørrelse er 500KB, JPG, PNG, JPEG.</p>

								</div>
							</template>
							<input type="file" name="brand_top_image" id="brand_top_image" @change="onFileChange" ref="brand_top_image">
						</label>
										

					</div>
				</div>			

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
      	infos:[],

      	home_top_sub_headline:'',
      	home_top_headline:'',
      	home_top_text:'',
      	home_top_image:'',
      	brand_top_headline:'',
      	brand_top_sub_headline:'',
      	// brand_top_text:'',
      	brand_top_image:'',
	    }
		},
		methods: {  		  	
			submit_form() {
	      this.showSuccess = false;

				var self = this;
				this.$store.dispatch('update_top',{
						home_top_headline:self.home_top_headline,
						home_top_sub_headline:self.home_top_sub_headline,
						home_top_text:self.home_top_text,
						home_top_image:self.home_top_image,
						brand_top_headline:self.brand_top_headline,
						brand_top_sub_headline:self.brand_top_sub_headline,
						// brand_top_text:self.brand_top_text,
						brand_top_image:self.brand_top_image					
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
			},
			onFileChange(e) {
	    	// console.log('uploading image');

	      var self = this;    	
	    	self.invalidImageError  = '.';                                       
	      self.showInvalidImageError  = false;
	      // console.log(e.target.name);
	      var files = e.target.files || e.dataTransfer.files;
	      // console.log(files[0].size/1024);
	      // console.log(files.length);
	      if (!files.length)
	        return;
	      if(files.length > 1){
	      	// console.log('multiple files');
	      } else{
	      	// console.log('single files');
	      	// if(files[0].size/1024 > 500){
		      // 	self.invalidImageError  = 'Image size should be less than 500kb.';                                       
		      //   self.showInvalidImageError  = true;
		      // 	return;
		      // }
	      }
	      
	      this.createImage(files[0],e.target.name);
	      this.showclosebtn = true;
		  },
	    createImage(file,name) {
	    	// console.log('creating image');

	      var image = new Image();
	      var reader = new FileReader();
	      var vm = this;

	      reader.onload = (e) => {
	        vm[name] = e.target.result;
	        console.log(vm);
	      };
	      reader.readAsDataURL(file);
	    }
	  },    
		created(){
      this.$store.state.current_path = this.$route.path;

			var self=this;
			this.$store.dispatch('get_home')
	                .then((data)=>{
	                    if(data){
	                    		// console.log(data);
	                        self.infos = data.infos;
	                        self.home_top_headline = self.infos.filter((product) => {
															  return product.key == 'home_top_headline';
														})[0].value;
													self.home_top_sub_headline = self.infos.filter((product) => {
															  return product.key == 'home_top_sub_headline';
														})[0].value;  
													self.home_top_text = self.infos.filter((product) => {
															  return product.key == 'home_top_text';
														})[0].value;  
													self.home_top_image = self.infos.filter((product) => {
															  return product.key == 'home_top_image';
														})[0].value;  
													self.brand_top_headline = self.infos.filter((product) => {
															  return product.key == 'brand_top_headline';
														})[0].value;  
													self.brand_top_sub_headline = self.infos.filter((product) => {
															  return product.key == 'brand_top_sub_headline';
														})[0].value;  
													self.brand_top_image = self.infos.filter((product) => {
															  return product.key == 'brand_top_image';
														})[0].value;                        

																			                
	                    } else{

	                    }        
	                })
	                .catch((error)=> {
	                    console.log('error:',error);           
	                }); 

	   //    $(document).ready(function(){
				// 	$("#app").scrollTop(0);
				// });
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

		.label-images{
			width: 100%;
    	background: #dedede;
    	display: flex;
	    align-items: center;
	    justify-content: center;
	    flex-direction: row;
	    min-height: 150px;
	    overflow: scroll;
		}
		.comment{
			    text-align: center;
		}

		.picture-all{
			margin-left:10px;
			margin-right:10px;
		}

		h3, .h3 {
	    font-size: 14px;
	    font-weight:bold;
	    text-transform:uppercase;
	}
</style>
