<template>
  	<div style="background-color: #F0F3F4">
	  	<template v-if="caravanData && caravanData.adata">  		

				<div class="container">
					<div class="col-md-8 col-sm-12">
						<div class="detail-section">
							<p class="path font-12"><router-link tag="span" to="/" class="pointer">Hjem</router-link> <i class="fa fa-caret-right"></i> <router-link tag="span" to="/campingvogn" class="pointer">Campingvogn</router-link> <i class="fa fa-caret-right"></i> <router-link tag="span" to="/single_caravan" class="blue-text underlined">{{caravanData.adata.make}} {{caravanData.adata.model}}</router-link"></p>
							<div class="row">
								<div class="col-md-12">
									<div id="myCarousel" class="carousel slide" data-ride="carousel">
										<!-- Wrapper for slides -->
										<div class="carousel-inner">
											<template v-if="caravanData.video">
												<div class="item active">
													<iframe class="video-div" :src="caravanData.video" frameborder="0" allow="autoplay; encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
												</div>
												<template v-for="(image, index) in caravanData.images">										
													<div v-bind:class="{item:true} ">
														<img v-bind:src="image.url" style="width:100%;">
													</div>
												</template>
											</template>
											<template v-else>				
												<template v-for="(image, index) in caravanData.images">										
													<div v-bind:class="{item:true , active:index==0} ">
														<img v-bind:src="image.url" style="width:100%;">
													</div>
												</template>
											</template>

										</div>

										<!-- Left and right controls -->
										<a class="left carousel-control" href="#myCarousel" data-slide="prev">
											<span class="glyphicon glyphicon-chevron-left"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="right carousel-control" href="#myCarousel" data-slide="next">
											<span class="glyphicon glyphicon-chevron-right"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="section row" id="information_div">
							<p class="blue-text font-20">Informasjon</p>
							<div class="col-md-12">
								<div class="data-wrapper row info-section">
									<div class="col-md-6 col-sm-12 column font-15">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<p>Salgsform</p>
												<p>Årsmodell</p>
												<p>Soveplasser</p>
												<p>Lengde</p>
												<p>Bredde</p>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6 value-col">
												<p>{{caravanData.adata.sales_form}}</p>
												<p>{{caravanData.adata.year}}</p>
												<p>{{caravanData.adata.no_of_sleepers}}</p>
												<p>{{caravanData.adata.length}}</p>
												<p>{{caravanData.adata.width}}</p>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 column font-15">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<!-- <p>Reg. sitteplasser</p> -->
												
												<p>Totalvekt</p>
												<p>Egenvekt</p>
												<p>Nyttelast</p>
												<p>Bilen står i</p>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6 value-col">
												<!-- <p>4</p> -->
												
												<p>{{caravanData.adata.weight.total}}kg</p>
												<p>{{caravanData.adata.weight.net}}kg</p>
												<p>{{caravanData.adata.weight.cargo}}kg</p>
												<p>{{caravanData.location.country}}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="section row">
							<p class="blue-text font-20">Utstyr</p>
							<div class="col-md-12">
								<div class="data-wrapper row">
									<template v-for="(data, index) in caravanData.adata.equipment">	
										<div class="col-md-6 col-sm-12 col-xs-12 column font-15">
											<li>{{ data }}</li>
										</div>
									</template>
								</div>
							</div>
						</div>
						<div class="section row">
							<p class="blue-text font-20">Beskrivelse</p>
							<div class="col-md-12">
								<div class="data-wrapper row">
									<div class="column font-15" style="width: 100%; border:none">
										<p v-html="caravanData.adata.description"></p>
									</div>
								</div>			
							</div>
						</div>
					</div>
					<div id="single-detail" class="col-md-4 col-sm-12">
						<div id="detail-content">
							<p class="font-10">TROMSØ</p>
							<p class="font-25 blue-text">{{caravanData.adata.make}} {{caravanData.adata.model}}</p>
							<p class="font-15" v-if="caravanData.vin">VIN: {{caravanData.vin}}</p>							
							<p class="font-15">Årsmodell: {{caravanData.adata.year}}</p>
							<!-- <p class="font-15">Km. stand: {{caravanData.adata.distance}} km</p> -->
							<p class="font-15">Soveplasser: {{caravanData.adata.no_of_sleepers}}</p>
							<p class="font-15">Lengde: {{caravanData.adata.length}} cm</p>
							<a href="#information_div" class="font-15 blue-text" >Mer informasjon <i class="fa fa-caret-down"></i></a>
							<div>
								<img src="/static/santander.jpg" alt="" style="width: 100px;margin-top:30px;margin-bottom:10px">
							</div>
							<div>
								<p style="margin:0">Estimert <span style="font-size: 2em;">{{ Math.floor(additionalInfo.TotalMonthlyCost) }} kr</span> pr. mnd.</p>
								<p style="font-size: 0.8em;">{{Math.round(additionalInfo.EffectiveInterest * 100) / 100}}% eff. / {{Math.round(additionalInfo.NominalInterest * 100) / 100}}% non. rente</p>
								<p>Kjopesum: kr. {{caravanData.adata.prices.main}},-</p>
							</div>
							<p class="font-15 blue-text pointer" style="margin-top:10px" @click="goToFinancePage">Vis Lånekalkulator <i class="fa fa-caret-right"></i></p>

							<div class="sub-section row">
								<div class="col-md-12">
									<div class="col-md-12" style="display:flex;margin-bottom:10px"><a href="https://icaravan.freshsales.io/web_forms/139d2edcc0cc8e7a92707caa15b64dadafc35a38c347453a6d4793ccf7b6bc8d/form.html" class="blue-btn shadowed my-btn font-12 full-width">KJØP NÅ</a></div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:flex">
									<div class="col-md-6 col-sm-6 col-xs-6" style="display:flex"><a href="https://icaravan.freshsales.io/web_forms/dd43eaec6c0a3de5b4c2ae2cdb33759986c37f3ff9081b128baae352ba6014f7/form.html" class="shadowed gray-btn my-btn font-12 full-width">FÅ TILBUD</a></div>
									<div class="col-md-6 col-sm-6 col-xs-6" style="display:flex"><a href="https://icaravan.freshsales.io/web_forms/7a8344bb5bed23ace8f3f49554ac9926a1d3f3bbf62f520f2afd842af76b9b76/form.html" class="shadowed gray-btn my-btn font-12 full-width">SPØR OSS</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</template>
		<div class="subscribe-wrapper">
			<p class="title font-33">BLI KONTAKTET</p>
			<p>Vil du bli kontaktet når vi får inn flere biler?</p>
			<p>Legg igjen din e-postadresse og vi kontakter deg.</p>
			<div class="form-group">
				<input type="text" placeholder="Din e-postadresse">
				<button>KONTAKT MEG</button>
			</div>
		</div>
  	</div>
</template>


<script>
import {mapGetters} from 'vuex';
export default {	
 		data () {
      return {
      	additionalInfo:[]    	
      	
      }
    },	
    metaInfo () {
      return {
        title: this.caravanDataTitle,
        meta: [
          { vmid: 'description', name: 'description', content: this.caravanDataDescription }
        ]
      }
    },
    computed: {
		...mapGetters({
			caravanData: 'caravanData',
			caravanDataTitle: 'caravanDataTitle',
			caravanDataDescription: 'caravanDataDescription',
		})
	},
	mounted() {
		// this.$store.dispatch('getCategoyData', this.categoryId);		
		// console.log(this.$route.params.id);

		var item = $("#myCarousel .item");
		$(item[0]).addClass("active");

		$("#app").on('scroll',function() {
			if($(".subscribe-wrapper").offset()){
				if($(".subscribe-wrapper").offset().top){
					if($("#app").scrollTop() > 199 && $(".subscribe-wrapper").offset().top > 500){
						$("#detail-content").addClass("sticky");
					} else {
						$("#detail-content").removeClass("sticky");				
					}
				}
			}   
		});

  	this.additionalInfo =this.$store.state.additionalInfo;
		
	},
	created(){
		this.$store.dispatch('getCaravanData', this.$route.params.id)
				.then((data)=>{
					// this.$router.push({path :'/single_caravan'});
  				this.additionalInfo = this.$store.state.additionalInfo;		
					                          
        })
        .catch((error)=> {
            console.log('error:',error);           
        });
	},
	methods: {  		  	
		goToFinancePage(id) { 

			this.$store.state.productData = this.$store.state.caravanData;	
			this.$store.state.equity= this.$store.state.productData.adata.prices.main * 0.35;
			this.$store.state.year= 10;					
			this.$store.state.ibobil= false;					
			this.$router.push({path :'/finansiering'});                        
        
			// setTimeout(function(){ 
			// }, 300);
		},
	}
}

</script>

<style scoped>

	.video-div{
		width: 100%;
    height: 400px;
	}
	
</style>
