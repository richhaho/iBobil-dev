<template>
  	<div class="col-md-10 col-sm-12 sider-wrapper">
		<div class="title-bar row">
			<span class="font-25">Bobiler</span>
			
      <avatar></avatar>	
		</div>
		<div class="table">
			<div class="row">
				<div class="col-md-3 col-sm-12">
						<div class="input-group" style="margin-bottom:20px">
							<input type="text" class="form-control" placeholder="Search" v-model="query" v-on:keyup.enter="runallfilters">
							<div class="input-group-btn">
								<button class="btn btn-default" type="button" @click.stop="runallfilters">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>							
						</div>
				</div>
				<div class="col-md-3 col-sm-12">
						<div class="input-group" style="margin-bottom:20px">
							<select name="" id="" class="form-control" @change="runallfilters" v-model="brand">
								<option value="">Select Brand</option>
								<option :value="index" v-for="(innerbrand,index) in brands">{{index}}</option>
							</select>
													
						</div>
				</div>
				<!-- <div class="col-md-2 col-sm-12">
					<div class="form-group">
						<select class="form-control" id="sel1">
							<option>Challenger</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
				</div> -->
			</div>
			<div class="table-header col-lg-12 col-md-12">
				<div class="col-md-6 col-sm-12">
					<span>Bobil modell</span>
				</div>
				<div class="col-md-2 col-sm-12">
					<span>Merke</span>
				</div>
				<div class="col-md-2 col-sm-12">
					<span>Arsmodell</span>
				</div>
				<div class="col-md-2 col-sm-12">
					<span>Soveplasser</span>
				</div>
			</div>
			<div class="table-row col-lg-12 col-md-12" v-for="product in filteredproducts">
				<div class="cell col-md-6 col-sm-12">
					<span>{{product.name}}</span>
					<ul class="edit">
						<li @click="editOne(product.adId)">Rediger</li>
						<template v-if="product.active == 1">
							<li @click="deactivated(product.adId)">Deaktivere</li>							
						</template>
						<template v-else>
							<li @click="activated(product.adId)" class="green">Aktivere</li>							
						</template>
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Merke</span>
					<span>{{ product.adata.make}}</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Arsmodell</span>
					<span>{{ product.adata.year}}</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Soveplasser</span>
					<div>{{ product.adata.seats}}</div>
				</div>
				<div class="cell">
				</div>
			</div>			
		</div>
	</div>
</template>


<script>
// import {mapGetters} from 'vuex';
import axios from 'axios';
import avatar from './avatar'


export default {
	components: {
        avatar
    },
  data(){
		return{
			'query':'',
			'products':[],
			'filteredproducts' :[],
			'message':'',
			'showMessage':false,
			brands:[],
			brand:''						
		}
	},
	methods: {
		runallfilters(){
			this.filteredproducts = this.products;
			if(this.brand){
				this.filteredproducts = this.filteredproducts.filter((product) => {
					  return product.adata.make == this.brand;
				});
			}
			
			this.filteredproducts = this.filteredproducts.filter((product)=> {
    		return product.name.toLowerCase().indexOf(this.query.toLowerCase()) !== -1;
			});
		},
		editOne(id) {  
			this.$store.dispatch('getProductData', id);
			this.$router.push({path :'/edit_products'});
		},
		deactivated(id){
			var self = this;
			this.$store.dispatch('deactivated',id)
                .then((data)=>{
                    if(data){
                  		for(var i = 0; i < self.products.length; i++) {
											    if(self.products[i].adId == id) {
											        self.products[i].active = 0;
											        break;
											    }
											}
                    } else{

                    }        
                })
                .catch((error)=> {
                    console.log('error:',error);           
                });
		},
		activated(id){
			var self = this;
			this.$store.dispatch('activated',id)
                .then((data)=>{
                    if(data){
                    	for(var i = 0; i < self.products.length; i++) {
											    if(self.products[i].adId == id) {
											        self.products[i].active = 1;
											        break;
											    }
											}                  		
                    } else{

                    }        
                })
                .catch((error)=> {
                    console.log('error:',error);           
                });
		},
	},

	created() {
    this.$store.state.current_path = this.$route.path;
		var self=this;
		this.$store.dispatch('getRV')
                .then((data)=>{
                    if(data){
                        self.products = data;
                				self.filteredproducts = self.products;
                				self.brands = _.countBy(self.filteredproducts, function(c) {
																						        return c.adata.make;
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
	.green{
		color:green !important;
	}
</style>
