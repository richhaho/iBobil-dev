<template>
  	<div class="col-md-10 col-sm-12 sider-wrapper">
		<div class="title-bar row">
			<span class="font-25">Sider</span>
			<avatar></avatar>
		</div>
		<div class="row">
      <div v-if="showSuccess" class="green">{{ successMessage }}</div>
      <div v-if="showError" class="red" v-for="error in errorMessage">{{ error }}</div>

			<div class="col-md-9 col-sm-12">

				<div class="row">
					<div class="col-md-12">					
				
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
      	meta_title:'',
      	meta_description:'',
	    }
		},
		methods: {  		  	
			submit_form() {
	      this.showSuccess = false;

				var self = this;
				this.$store.dispatch('update_finance',{					
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
		},
		created(){
      this.$store.state.current_path = this.$route.path;

			var self=this;
			this.$store.dispatch('get_home')
	                .then((data)=>{
	                    if(data){
	                    		// console.log(data);
	                        self.infos = data.infos;

	                        self.meta_title = self.infos.filter((product) => {
															  return product.key == 'finance_meta_title';
														})[0].value;	
													self.meta_description = self.infos.filter((product) => {
															  return product.key == 'finance_meta_description';
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
		
		.mb-50{
			margin-bottom:50px;
		}

		h3, .h3 {
	    font-size: 14px;
	    font-weight:bold;
	    text-transform:uppercase;
		}
</style>
