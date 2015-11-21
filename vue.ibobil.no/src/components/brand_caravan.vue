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
				<p class="path font-12">Hjem <i class="fa fa-caret-right"></i> Bobil <i class="fa fa-caret-right"></i> Brukte bobiler <i class="fa fa-caret-right"></i><span class="blue-text underlined"> Challenger Sirius 3197 </span></p>
				<div class="display-opt">
					<div class="form-group">
						<select class="form-control" id="sel1"  v-model="usedornew" @change="runallfilters">
							<option value="0">Alle bobiler</option>							
							<option value="1">Brukt bobil</option>
							<option value="2">Nye bobil</option>
						</select>
					</div>
					<!-- <span class="glyphicon glyphicon-th active"></span>
					<span class="glyphicon glyphicon-th-list"></span> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div :class="{'filter-wrapper':true,'show':!show }">
						<div class="sub-section">
							<!-- <button class="accordion active">MERKER</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="merker in MerkerFilter" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" value="">{{merker.title}}</label>
										</div>
										<span>{{merker.number}}</span>
									</div>
								</div>
							</div> -->

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

							<button class="accordion active">KILOMETERSTAND</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra km" v-model="minMileageFilter" @change="runallfilters">
										<span>-</span>
										<input type="text" placeholder="Til km" v-model="maxMileageFilter" @change="runallfilters">
									</div>
								</div>
							</div>

							<button class="accordion active">Pris</button>
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

							<button class="accordion active">HESTEKREFTER</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra hk" v-model="minHPFilter" @change="runallfilters">
										<span>-</span>
										<input type="text" placeholder="Til hk" v-model="maxHPFilter" @change="runallfilters">
									</div>
								</div>
							</div>

							<button class="accordion active">ANTALL SETER</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra" v-model="minSeatFilter" @change="runallfilters">
										<span>-</span>
										<input type="text" placeholder="Til" v-model="maxSeatFilter" @change="runallfilters">
									</div>
								</div>
							</div>

							<button class="accordion active">GIRKASSE</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="(count,name) in transmissions" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" @click="toggleTransmissionFilter($event)" :value="name">{{name}}</label>
										</div>
										<span>{{count}}</span>
									</div>
								</div>
							</div>

						</div>
						
					</div>
				</div>
				<div class="col-md-9 col-sm-12">
					
					<div class="category-wrapper row">
						<div class="col-md-12 col-sm-12">
							<div class="col-md-12 label-instruction">
								<div class="col-md-6 col-sm-6">
									<p class="font-25 title">{{brand.name}}</p>
									<!-- <p class="font-15 title">Med Isabella møter du begeistring!</p>
									<p class="font-12">Tilbake i 1957 startet Søren Odgaard den første produksjonen av Isabella telt – og siden den gang har vi med stort fokus på kvalitet beveget oss hele tiden. ”Hvis ikke du endrer kurs, ender du der, som du er på vei til”. Det legges enormt mye krefter i innovasjon, for vi vil være fremst. Vi streber konstant etter det beste for våre kunder og til deres kunder. Derfor holder vi oss selv oppe på, at vi ikke er bedre enn siste levering.</p>
									<p class="font-12">Hos Isabella møter du stor begeistring for livet, </p> -->
									<p v-html="brand.description"></p>
								</div>
								<div class="col-md-6 col-sm-6">
									<img :src="brand.logo" alt="">
								</div>
							</div>
						</div>
						<div class="product-panel col-md-3 col-sm-6 col-xs-6" v-for="data in filteredproducts" :key="data.adId">
							<div class="col-md-12">
								<div class="product-wrapper row">
									<div class="col-md-12" style="padding:0;">
										<img v-bind:src="data.images[0].url" alt="">
									</div>
									<div class="detail col-md-12">
										<div class="sub-section">
											<p class="product-title font-13">{{data.adata.make}} {{data.adata.model}}</p>
											<p class="property font-12"><span>{{data.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{ data.adata.mileage ? data.adata.mileage : 0 }} km</span></p>
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
		
		<!-- <div class="brand-section">
			<div class="container">
				<div class="brand-wrapper">
					<div class="brand">
						<div>
							<img src="../../img/icons/merker1.png" alt="">
						</div>
						<div>
							<img src="../../img/icons/merker2.png" alt="">
						</div>
						<div>
							<img src="../../img/icons/merker3.png" alt="">
						</div>
						<div>
							<img src="../../img/icons/merker4.png" alt="">
						</div>
						<div>
							<img src="../../img/icons/merker5.png" alt="">
						</div>
						<div>
							<img src="../../img/icons/merker6.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div> -->
  	</div>
</template>


<script>
// import {mapGetters} from 'vuex';

export default {		
    data(){
        return{
        	show:false,
					title: 'CreateSite',
					user:{
						errors:[],
						
						_id: '',
						villa: '',
						email: ''			
					},
					brand:{},
					products:[],
					filteredproducts:[],
					brands:[],
					brandsFilter:[],
					minYear:'',
					maxYear:'',
					minYearFilter:'',
					maxYearFilter:'',
					minMileageFilter:'',
					maxMileageFilter:'',
					minPriceFilter:'',
					maxPriceFilter:'',
					transmissions:[],
					transmissionsFilter:[],
					minSeatFilter:'',
					maxSeatFilter:'',
					minHPFilter:'',
					maxHPFilter:'',
					usedornew:0,
        }
	},
	methods: {  
		toggleShow(){
			this.show = !this.show; 
		}, 			  	
		saveId(id) {  
			this.$router.push({path :'/bobil/'+id});                        
			
			// }, 300);
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
		toggleTransmissionFilter(event){
			if(event.target.checked){
				this.transmissionsFilter.push(event.target.value);
				this.runallfilters();
			} else{
				var index = this.transmissionsFilter.indexOf(event.target.value);
				if (index !== -1) this.transmissionsFilter.splice(index, 1);
				this.runallfilters();
			}
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
			if(this.minMileageFilter && this.maxMileageFilter){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return product.adata.mileage >= this.minMileageFilter && product.adata.mileage <= this.maxMileageFilter;
				});
			}	
			if(this.minPriceFilter && this.maxPriceFilter){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return product.adata.prices.main >= this.minPriceFilter && product.adata.prices.main <= this.maxPriceFilter;
				});
			}	
			if(this.transmissionsFilter.length > 0){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return $.inArray(product.adata.transmission, this.transmissionsFilter) != -1;
				});
			}
			if(this.minSeatFilter && this.maxSeatFilter){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return product.adata.seats >= this.minSeatFilter && product.adata.seats <= this.maxSeatFilter;
				});
			}
			if(this.minHPFilter && this.maxHPFilter){
				this.filteredproducts = this.filteredproducts.filter((product) => {
				  return product.adata.engine.effect >= this.minHPFilter && product.adata.engine.effect <= this.maxHPFilter;
				});
			}
			if(this.usedornew != 0){
				if(this.usedornew == 1){
					this.filteredproducts = this.filteredproducts.filter((product) => {
					  return product.adata.mileage;
					});
				} else{
					this.filteredproducts = this.filteredproducts.filter((product) => {
					  return !product.adata.mileage;
					});
				}
				
			}
		}
	},
	mounted(){
		var self = this;
    this.$store.dispatch('getBrandData', this.$route.params.id)
				.then((data) => {
	            this.brand = this.$store.state.brandData;
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
											  self.products = self.products.filter((product) => {
												  return product.adata.make == self.brand.name;
												});
												self.filteredproducts =self.products ;
												self.transmissions = _.countBy(self.filteredproducts, function(c) {
																        return c.adata.transmission;
																    });
												self.runallfilters();
                    }        
                })
                .catch((error)=> {
                    console.log('error:',error);           
                });   
	      })
	      .catch((error)=> {
	          console.log('error:',error);           
	      }); 
		$(document).ready(function(){
			$("#app").scrollTop(0);
		});		
	},
	watch: {
    '$route.params.id': function (id) {
      var self = this;
    	this.$store.dispatch('getBrandData', id)
				.then((data) => {
	            this.brand = this.$store.state.brandData;
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
											  self.products = self.products.filter((product) => {
												  return product.adata.make == self.brand.name;
												});
												self.filteredproducts =self.products ;
												self.transmissions = _.countBy(self.filteredproducts, function(c) {
																        return c.adata.transmission;
																    });
												self.runallfilters();
                    }        
                })
                .catch((error)=> {
                    console.log('error:',error);           
                });   
	      })
	      .catch((error)=> {
	          console.log('error:',error);           
	      }); 
		$(document).ready(function(){
			$("#app").scrollTop(0);
		});
    }
  },
}
	
</script>

<style scoped>
	.show{
			display:block !important;
	}
	@media only screen and (max-width: 580px){
		.show{
			display:none !important;
		}
	}
</style>
