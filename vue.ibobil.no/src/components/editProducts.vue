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
				<div class="edit-wrapper">
					<div class="form-group">
						<input type="text" class="form-control input-lg" :value="ProductData.name" ref="productname">
					</div>
					<!-- <div id="summernote"></div> -->
					<button class="accordion active">Last opp builder(Upload images)</button>
					<div class="panel col-md-12 dropzone-div">
						<vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
						<div class="previous-images-div">
							<template v-for="(image, index) in ProductData.images">
								<img v-bind:src="image.url" style="width:100px;padding: 10px;" class="">
								<span class="remove-btn" @click="removeImage(image.url)">X</span>
							</template>
						</div>						
					</div>
					<button class="accordion active">{{ ProductData.adata.mileage ? 'Reg.nr' : 'VIN' }}</button>
					<div class="panel col-md-12">
						<div class="form-group">							
							<input type="text" class="form-control input-lg" :value="ProductData.vin" ref="vin">
						</div>
					</div>
					<button class="accordion active">Last opp video(Upload video)</button>
					<div class="panel col-md-12">
						<div class="form-group">
							<p class="input-label">
								<label for="">Link to Video</label>
							</p>
							<input type="text" class="form-control input-lg" :value="ProductData.video" ref="video" placeholder="https://www.youtube.com/embed/4KVOuQDIfmw">
						</div>						
					</div>
					<button class="accordion active">Søkemotoroptimalisering</button>
					<div class="panel col-md-12">
						<div class="form-group">
							<p class="input-label">
								<label for="">Meta tittel</label>
								<span>Maximum 60 characters</span>
							</p>
							<input type="text" class="form-control input-lg" :value="ProductData.meta_title" ref="meta_title">
						</div>
						<div class="form-group">
							<p class="input-label">
								<label for="">Metabeskrivelse</label>
								<span>Maximum 300 characters</span>
							</p>
							<input type="text" class="form-control input-lg" :value="ProductData.meta_description" ref="meta_description">
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
	import vue2Dropzone from 'vue2-dropzone'
	import avatar from './avatar'

	import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    $(document).ready(function() {
        $('#summernote').summernote();
    });
	import {mapGetters} from 'vuex';
	export default {
		computed: {
			...mapGetters({
				ProductData: 'ProductData',
			})
		},
		components: {
	    vueDropzone: vue2Dropzone,
	    avatar
	  },
	  data(){
			return {
				successMessage:'',				
				showSuccess:false,		
				errorMessage:'',				
				showError:false,			
	      dropzoneOptions: {
	          url: 'https://localhost:8000/upload_image',
	          thumbnailWidth: 150,
	          thumbnailHeight: 150,
	          maxFilesize: 0.5,
	          addRemoveLinks:true,
	          uploadMultiple:true,
	          dictCancelUploadConfirmation:'Remove this image file?',
	          headers: { "Access-Control-Allow-Origin": "*" },
	          autoProcessQueue:false,
	          dictDefaultMessage:'Drag or click to upload image'
	      }
	    }
		},
		methods: {  		  	
			submit_form() {				
				var self= this;
				self.successMessage = '';
        self.showSuccess = false;
        self.errorMessage = '';
        self.showError = false;
        var token = localStorage.getItem('token');
        this.$store.dispatch('get_rooturl')
        	.then((rooturl)=>{
        			self.$refs.myVueDropzone.setOption('url', rooturl+'update_images/'+self.$store.state.ProductData.adId+'?token='+token);
							self.$refs.myVueDropzone.processQueue();
            })
            .catch((error)=> {
                console.log('error:',error);           
            });
        
				this.$store.dispatch('update_product', { 
							id: this.$store.state.ProductData.adId, 
							meta_title: this.$refs.meta_title.value, 
							meta_description:this.$refs.meta_description.value , 
							video:this.$refs.video.value, 
							vin:this.$refs.vin.value, 
							name:this.$refs.productname.value 
						})
						.then((data)=>{
                if(data){
                	if(data.success){
                		self.successMessage = data.message;
              			self.showSuccess = true;
                	} else{
                		if(data.message == 'Unauthenticated'){
			            		localStorage.removeItem('token');
		                	localStorage.removeItem('user-info');
			            		self.$router.push({ name: 'login' });
			            	}
                		self.errorMessage = data.message;
              			self.showError = true;
                	}
              		
                } else{
                	self.errorMessage = data.message;
              		self.showError = true;
                }        
            })
            .catch((error)=> {
                console.log('error:',error);           
            });


				// var myDropzone = Dropzone.forElement(".dropzone");
	   //  	myDropzone.processQueue();			
			},
			removeImage(url){
				var self= this;
				self.successMessage = '';
        self.showSuccess = false;
        self.errorMessage = '';
        self.showError = false;

				this.$store.dispatch('remove_image', { id: this.$store.state.ProductData.adId, url: url})
						.then((data)=>{
                if(data){
                	if(data.success){
                	// 	self.successMessage = data.message;
              			// self.showSuccess = true;
                	} else{
                		if(data.message == 'Unauthenticated'){
			            		localStorage.removeItem('token');
		                	localStorage.removeItem('user-info');
			            		self.$router.push({ name: 'login' });
			            	}
                	// 	self.errorMessage = data.message;
              			// self.showError = true;
                	}
              		
                } else{
                // 	self.errorMessage = data.message;
              		// self.showError = true;
                }        
            })
            .catch((error)=> {
                console.log('error:',error);           
            });
			}		
		},
		created(){
      this.$store.state.current_path = this.$route.path;
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

  h3, .h3 {
	    font-size: 14px;
	    font-weight:bold;
	    text-transform:uppercase;
	}
</style>
