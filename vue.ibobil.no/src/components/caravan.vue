<template>
  	<div>
		<div class="container">
			<div class="toggle-wrapper row">
				<div class="col-md-12">
					<button :class="{'btn':true, 'blue-btn':true, 'show':!show}" @click="toggleShow">VIS TREFF</button>
					<button :class="{'btn':true, 'show':show}" @click="toggleShow">ENDRE SØK</button>
				</div>
			</div>
			<div class="setting-wrapper">
				<p class="path font-12"><router-link tag="span" to="/" class="pointer">Hjem</router-link> <i class="fa fa-caret-right"></i>  <router-link tag="span" to="/campingvogn" class="blue-text underlined">Campingvogn</router-link"></p>
				<div class="display-opt">
					<!-- <div class="form-group">
						<select class="form-control" id="sel1">
							<option>Brukt bobil</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
					<span class="glyphicon glyphicon-th active"></span>
					<span class="glyphicon glyphicon-th-list"></span> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div :class="{'filter-wrapper':true,'show':!show }">
						<div class="sub-section">
							<button class="accordion active">MERKER</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="(count,name) in brands" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" @click="toggleBrandFilter($event)" :value="name">{{name}}</label>
										</div>
										<span>{{count}}</span>
									</div>
								</div>
							</div>

							<button class="accordion active">ÅRSMODELL</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra" v-model="minYearFilter" @change="runallfilters">
										<span>-</span>
										<input type="text" placeholder="Til" v-model="maxYearFilter" @change="runallfilters">
									</div>
								</div>
							</div>

							<!-- <button class="accordion active">KILOMETERSTAND</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra km">
										<span>-</span>
										<input type="text" placeholder="Til km">
									</div>
								</div>
							</div> -->

							<button class="accordion active">PRIS</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra kr" v-model="minPriceFilter" @change="runallfilters">
										<span>-</span>
										<input type="text" placeholder="Til kr" v-model="maxPriceFilter" @change="runallfilters">
									</div>
								</div>
							</div>

							<!-- <button class="accordion active">DRIVSTOFF</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="driv in DrivFilter" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" value="">{{driv.title}}</label>
										</div>
										<span>{{driv.number}}</span>
									</div>
								</div>
							</div>

							<button class="accordion active">FARGE</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="farge in FargeFilter" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" value="">{{farge.title}}</label>
										</div>
										<span>{{farge.number}}</span>
									</div>
								</div>
							</div> -->

							<!-- <button class="accordion active">HESTEKREFTER</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra hk">
										<span>-</span>
										<input type="text" placeholder="Til hk">
									</div>
								</div>
							</div>

							<button class="accordion active">ANTALL SETER</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra">
										<span>-</span>
										<input type="text" placeholder="Til">
									</div>
								</div>
							</div> -->

							<!-- <button class="accordion active">GIRKASSE</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="girkasse in GirkasseFilter" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" value="">{{girkasse.title}}</label>
										</div>
										<span>{{girkasse.number}}</span>
									</div>
								</div>
							</div> -->

						</div>
						
					</div>
				</div>
				<div class="col-md-9 col-sm-12">
					<div class="category-wrapper row">
						<div class="product-panel col-md-3 col-sm-6 col-xs-6" v-for="data in filteredproducts" :key="data.slug">
							<div class="col-md-12">
								<div class="product-wrapper row pointer" @click="saveId(data.slug)">
									<div class="col-md-12" style="padding:0;">
										<img v-bind:src="data.images[0].url" alt="">
									</div>
									<div class="detail col-md-12">
										<div class="sub-section">
											<p class="product-title font-13">{{data.adata.make}} {{data.adata.model}}</p>
											<p class="property font-12"><span>{{data.adata.year}}</span></p>
										</div>
										<div class="sub-section-gap">
											<div class="sub-section">
												<p class="cost font-16"><span>{{data.adata.prices.main}},-</span></p>
												<p class="sub font-10">{{data.adata.caravan_dealer_segment}}</p>
											</div>
										</div>
										<div class="sub-section-gap">
											<div style="display:flex;align-items:center;padding:10px 20px;margin-bottom:10px;border-bottom: 1px solid #eee;">
												<div>
													<img src="/static/santander.jpg" alt="" class="santander-image">
												</div>												
												<div class="col-xs-6" style="">
													<p style="font-size: 0.7em;margin:0">Vi tilbyr Caravnlån</p>
												</div>
											</div>
										</div>
										<div class="sub-section row">
											<div class="col-md-12">
												<button class="blue-btn shadowed my-btn font-12" v-on:click="saveId(data.slug)">MER INFO</button>
											</div>				
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>		
  	</div>
</template>


<script>

import {mapGetters} from 'vuex';
import axios from 'axios';
import _ from 'lodash';

export default {

	computed: {
		// ...mapGetters({
		// 	caravanList: 'caravanList'
		// })
	},
	metaInfo () {
    return {
      title: this.meta_title,
      meta: [
        { vmid: 'description', name: 'description', content: this.meta_description }
      ]
    }
  },

	data() {
	  return{
      show:false,
			title: 'CreateSite',
			user:{
					errors:[],
					
					_id: '',
					villa: '',
					email: ''			
			},
			MerkerFilter: [
					{
						title: "Eura Mobil",
						number: "53"
					},
					{
						title: "Challenger",
						number: "19"
					},
					{
						title: "Mobilvetta",
						number: "30"
					},
					{
						title: "Concorde",
						number: "46"
					},
					{
						title: "Caravelair",
						number: "65"
					},
					{
						title: "Isabella Camp-let",
						number: "22"
					}
				],
			DrivFilter: [
					{
						title: "Bensin",
						number: "53"
					},
					{
						title: "Diesel",
						number: "19"
					},
					{
						title: "Elektrisitet",
						number: "30"
					},
					{
						title: "Hybrid",
						number: "46"
					},
					{
						title: "Gass",
						number: "65"
					},
					{
						title: "Gass + Bensin",
						number: "22"
					}
				],
			FargeFilter: [
					{
						title: "Blå",
						number: "53"
					},
					{
						title: "Grå",
						number: "19"
					},
					{
						title: "Hvit",
						number: "30"
					},
					{
						title: "Svart",
						number: "46"
					},
					{
						title: "Sølv",
						number: "65"
					}
				],
			GirkasseFilter: [
					{
						title: "Automat",
						number: "53"
					},
					{
						title: "Manuell",
						number: "19"
					}
				],
			filteredproducts:[],
			products:[],
			brands:[],
			brandsFilter:[],
			minYearFilter:'',
			maxYearFilter:'',
			minPriceFilter:'',
			maxPriceFilter:'',
			meta_title:'',
	      	meta_description:''		
		}
	},
	// mounted() {
	// 	this.$store.dispatch('getCaravanList');
	// 	console.log(this.caravanList);
	// },
	methods: {  
		toggleShow(){
			this.show = !this.show; 
		}, 			  	
		saveId(id) {  
			// console.log(id);
			// this.$store.commit('setCategoryId', id);
			this.$router.push({path :'/campingvogn/'+id});                          
       

			// this.$router.push({path :'/single_caravan'});
		},
		toggleBrandFilter(event){
			if(event.target.checked){
				this.brandsFilter.push(event.target.value);
				this.runallfilters();
			} else{
				var index = this.brandsFilter.indexOf(event.target.value);
				if (index !== -1) this.brandsFilter.splice(index, 1);
				this.runallfilters();
			}
		},
		runYearFilter(event){
			this.runallfilters();			
		},
		runallfilters(){
			this.filteredproducts = this.products;
			if(this.brandsFilter.length > 0){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return $.inArray(product.adata.make, this.brandsFilter) != -1;
				});
			}
			if(this.minYearFilter && this.maxYearFilter){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return product.adata.year >= this.minYearFilter && product.adata.year <= this.maxYearFilter;
				});
			}
			if(this.minPriceFilter && this.maxPriceFilter){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return product.adata.prices.main >= this.minPriceFilter && product.adata.prices.main <= this.maxPriceFilter;
				});
			}			
		}
	},
	created() {
		var self=this;
		this.$store.dispatch('getCaravan')
                .then((data)=>{
                    if(data){
                        self.products = data;
                        self.products = self.products.filter((product) => {
																			  return product.active == 1;
																		});
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
    this.$store.dispatch('get_home')
	      .then((data)=>{
	          if(data){
	            self.infos = data.infos;

							self.meta_title = self.infos.filter((product) => {
									  return product.key == 'caravan_meta_title';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'caravan_meta_title';
								})[0].value : '';	

							self.meta_description = self.infos.filter((product) => {
									  return product.key == 'caravan_meta_description';
								})[0] ? self.infos.filter((product) => {
									  return product.key == 'caravan_meta_description';
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
	.category-wrapper .product-panel .product-wrapper .my-btn {
    box-shadow:none;
	}
	.show{
			display:block !important;
	}
	@media only screen and (max-width: 580px){
		.show{
			display:none !important;
		}
	}
</style>
