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
						<h3>Top Banner Title</h3>
						<input type="text" class="form-control" v-model="top_banner_title">
						<h3>Top Banner Image</h3>
						<label for="top_banner_image" class="blue-text font-18 label-class" id="brand_image_label">
							<template v-if="top_banner_image">								
								<div class="picture">
									<img :src="top_banner_image" alt="" class="pro-image">						
								</div>
							</template>
							<template v-else>
								<div class="comment">
									Upload top banner image (1 Image)
									<p class="font-13">Maksimum opplastningsstørrelse er 500KB, JPG, PNG, JPEG.</p>

								</div>
							</template>
							<input type="file" name="top_banner_image" id="top_banner_image" @change="onFileChange" ref="top_banner_image">
						</label>
						<h3>Article 1</h3>
						<vue-editor v-model="article_1" id="article_1"></vue-editor>
						<h3>Article 2</h3>
						<vue-editor v-model="article_2" id="article_2"></vue-editor>

						<h3>Side Images</h3>
						<label for="side_images" class="blue-text font-18 label-class" id="brand_image_label">
							<template v-if="side_images.length > 0">
								<div class="label-images">					
									<div class="picture picture-all" v-for="image in side_images">
										<img :src="image" alt="" class="pro-image">						
									</div>
								</div>			
							</template>
							<template v-else>
								<div class="comment">
									Upload side images (4 Images)
									<p class="font-13">Maksimum opplastningsstørrelse er 500KB, JPG, PNG, JPEG.</p>

								</div>
							</template>
							<input type="file" name="side_images" id="side_images" @change="onFileChange2" ref="side_images" multiple>
						</label>

						<h3>Slider Images</h3>
						<label for="slider_images" class="blue-text font-18 label-class" id="brand_image_label">
							<template v-if="slider_images.length > 0">	
								<div class="label-images">			

									<div class="picture picture-all" v-for="image in slider_images">
										<img :src="image" alt="" class="pro-image">						
									</div>
								</div>
							</template>
							<template v-else>
								<div class="comment">
									Upload slider images
									<p class="font-13">Maksimum opplastningsstørrelse er 500KB, JPG, PNG, JPEG.</p>

								</div>
							</template>
							<input type="file" name="slider_images" id="slider_images" @change="onFileChange2" ref="slider_images" multiple>
						</label>

						<h3>Article 3</h3>
						<vue-editor v-model="article_3" id="article_3"></vue-editor>
						<h3>Article 4</h3>
						<vue-editor v-model="article_4" id="article_4"></vue-editor>

						<h3>Middle Banner Image</h3>
						<label for="middle_banner_image" class="blue-text font-18 label-class" id="brand_image_label">
							<template v-if="middle_banner_image">								
								<div class="picture">
									<img :src="middle_banner_image" alt="" class="pro-image">						
								</div>
							</template>
							<template v-else>
								<div class="comment">
									Upload middle banner image (1 Image)									
									<p class="font-13">Maksimum opplastningsstørrelse er 500KB, JPG, PNG, JPEG.</p>

								</div>
							</template>
							<input type="file" name="middle_banner_image" id="middle_banner_image" @change="onFileChange" ref="middle_banner_image">
						</label>

						<h3>Middle Slider Images</h3>
						<label for="middle_slider_images" class="blue-text font-18 label-class" id="brand_image_label">
							<template v-if="middle_slider_images.length > 0">	
								<div class="label-images">		

									<div class="picture picture-all" v-for="image in middle_slider_images">
										<img :src="image" alt="" class="pro-image">						
									</div>
								</div>
							</template>
							<template v-else>
								<div class="comment">
									Upload middle slider images
									<p class="font-13">Maksimum opplastningsstørrelse er 500KB, JPG, PNG, JPEG.</p>

								</div>
							</template>
							<input type="file" name="middle_slider_images" id="middle_slider_images" @change="onFileChange2" ref="middle_slider_images" multiple>
						</label>

						<h3>Address</h3>
						<input type="text" class="form-control" v-model="address">

						<h3>Email</h3>
						<input type="text" class="form-control" v-model="email">

						<h3>Phone</h3>
						<input type="text" class="form-control" v-model="phone">
				
						<div class="mb-50">
							<h3 class="my-heading">Meta tittel</h3>					
							<input type="text" class="form-control" v-model="meta_title">
						</div>
						<div class="mb-50">
							<h3 class="my-heading">Metabeskrivelse</h3>					
							<input type="text" class="form-control" v-model="meta_description">
						</div>

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

      	top_banner_image:'',
        top_banner_title:'',
        article_1:'',
        article_2:'',
        article_3:'',
        article_4:'',
        side_images:[],
        slider_images:[],
        middle_banner_image:'',
        middle_slider_images:[],
        address:'',
        email:'',
        phone:'',        
      	meta_title:'',
      	meta_description:'',
	    }
		},
		methods: {  		  	
			submit_form() {
	      this.showSuccess = false;

				var self = this;
				this.$store.dispatch('update_about',{
						top_banner_image:self.top_banner_image,
						top_banner_title:self.top_banner_title,
						article_1:self.article_1,
						article_2:self.article_2,
						article_3:self.article_3,
						article_4:self.article_4,
						side_images:self.side_images,
						slider_images:self.slider_images,
						middle_banner_image:self.middle_banner_image,
						middle_slider_images:self.middle_slider_images,
						address:self.address,
						email:self.email,
						phone:self.phone,						
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
	    },
	    onFileChange2(e) {
	    	// console.log('uploading image');

	      var self = this;    	
	    	self.invalidImageError  = '.';                                       
	      self.showInvalidImageError  = false;
	      // console.log(e.target.name);
	      var files = e.target.files || e.dataTransfer.files;
	      // console.log(files);
	      // return;
	      // console.log(files[0].size/1024);
	      // console.log(files.length);
	      if (!files.length)
	        return;
	   //    Array.from(files).forEach(function(file) {
	   //    	if(file.size/1024 > 500){
			 //      	self.invalidImageError  = 'Image size should be less than 500kb.';                                       
			 //        self.showInvalidImageError  = true;
			 //      	return;		      
		  //     }		      
				// });

				this.createImage2(files,e.target.name);
	      this.showclosebtn = true;
	      
	      
	      
		  },
	    createImage2(files,name) {
	    	// console.log('creating image');
	    	var index = 0;
		    var vm = this;

		    vm[name]=[];


	    	Array.from(files).forEach(function(file) {

	      	var image = new Image();
		      var reader = new FileReader();

		      reader.onload = (e) => {
		      	// console.log(e);
		        vm[name].push(e.target.result);
		      };
		      reader.readAsDataURL(file);	

		      index++;

				});
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
	                        self.top_banner_image = self.infos.filter((product) => {
															  return product.key == 'top_banner_image';
														})[0].value;

	                        self.top_banner_title = self.infos.filter((product) => {
															  return product.key == 'top_banner_title';
														})[0].value;

	                        self.article_1 = self.infos.filter((product) => {
															  return product.key == 'article_1';
														})[0].value;


	                        self.article_2 = self.infos.filter((product) => {
															  return product.key == 'article_2';
														})[0].value;

	                        self.article_3 = self.infos.filter((product) => {
															  return product.key == 'article_3';
														})[0].value;

	                        self.article_4 = self.infos.filter((product) => {
															  return product.key == 'article_4';
														})[0].value;

	                        self.side_images = self.infos.filter((product) => {
															  return product.key == 'side_images';
														})[0].value;


	                        self.slider_images = self.infos.filter((product) => {
															  return product.key == 'slider_images';
														})[0].value;
	                        
	                        self.middle_banner_image = self.infos.filter((product) => {
															  return product.key == 'middle_banner_image';
														})[0].value;
	                        self.middle_slider_images = self.infos.filter((product) => {
															  return product.key == 'middle_slider_images';
														})[0].value;
	                        self.address = self.infos.filter((product) => {
															  return product.key == 'address';
														})[0].value;
	                        self.email = self.infos.filter((product) => {
															  return product.key == 'email';
														})[0].value;
	                        self.phone = self.infos.filter((product) => {
															  return product.key == 'phone';
														})[0].value;

	                        self.meta_title = self.infos.filter((product) => {
															  return product.key == 'about_meta_title';
														})[0].value;	
													self.meta_description = self.infos.filter((product) => {
															  return product.key == 'about_meta_description';
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
