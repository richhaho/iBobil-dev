<template>
  	<div>
		<div class="container">
			<div class="toggle-wrapper row">
				<div class="col-md-12">
					<button class="btn blue-btn toCategory-btn">VIS TREFF</button>
					<button class="btn toFilter-btn">ENDRE SØK</button>
				</div>
			</div>
			<div class="setting-wrapper">
				<p class="path font-12">Hjem <i class="fa fa-caret-right"></i> Bobil <i class="fa fa-caret-right"></i> Brukte bobiler <i class="fa fa-caret-right"></i><span class="blue-text underlined"> Challenger Sirius 3197 </span></p>
				<div class="display-opt">
					<div class="form-group">
						<select class="form-control" id="sel1">
							<option>Brukt bobil</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
					<span class="glyphicon glyphicon-th active"></span>
					<span class="glyphicon glyphicon-th-list"></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="filter-wrapper">
						<div class="sub-section">
							<button class="accordion active">MERKER</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="merker in MerkerFilter" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" value="">{{merker.title}}</label>
										</div>
										<span>{{merker.number}}</span>
									</div>
								</div>
							</div>

							<button class="accordion active">ÅRSMODELL</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra">
										<span>-</span>
										<input type="text" placeholder="Til">
									</div>
								</div>
							</div>

							<button class="accordion active">KILOMETERSTAND</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra km">
										<span>-</span>
										<input type="text" placeholder="Til km">
									</div>
								</div>
							</div>

							<button class="accordion active">Pris</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div class="filter-list">
										<input type="text" placeholder="Fra kr">
										<span>-</span>
										<input type="text" placeholder="Til kr">
									</div>
								</div>
							</div>

							<button class="accordion active">DRIVSTOFF</button>
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
							</div>

							<button class="accordion active">HESTEKREFTER</button>
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
							</div>

							<button class="accordion active">GIRKASSE</button>
							<div class="panel">
								<div style="padding: 10px 0;">
									<div v-for="girkasse in GirkasseFilter" class="filter-list">
										<div class="checkbox">
											<label><input type="checkbox" value="">{{girkasse.title}}</label>
										</div>
										<span>{{girkasse.number}}</span>
									</div>
								</div>
							</div>

						</div>
						
					</div>
				</div>
				<div class="col-md-9 col-sm-12">
					<div class="category-wrapper row">
						<!-- <div class="product-panel col-md-3 col-sm-12" v-for="product in filterData"> -->
						<div class="product-panel col-md-3 col-sm-12" v-for="data in categoryData">
							<div class="col-md-12">
								<div class="product-wrapper row">
									<div class="col-md-12 col-sm-6 col-xs-6" style="padding:0;">
										<!-- <img v-bind:src="product.img" alt=""> -->
										<img v-bind:src="data.images[0].url" alt="">
									</div>
									<div class="detail col-md-12 col-sm-6 col-xs-6">
										<div class="sub-section">
											<!-- <p class="product-title font-13">{{product.name}}</p> -->
											<p class="product-title font-13">{{data.aData.make}} {{data.aData.model}}</p>
											<!-- <p class="property font-12"><span>{{product.productionDate}}</span>&nbsp;&nbsp;&nbsp;<span>{{product.distance}} km</span></p> -->
											<p class="property font-12"><span>{{data.aData.year}}</span></p>
										</div>
										<div class="sub-section-gap">
											<div class="sub-section">
												<!-- <p class="cost font-16"><span>{{product.cost}},-</span></p> -->
												<p class="cost font-16"><span>{{data.aData.prices.main}},-</span></p>
												<!-- <p class="sub font-10">{{product.sub}}</p> -->
												<p class="sub font-10">{{data.aData.caravan_dealer_segment}}</p>
											</div>
										</div>
										<div class="sub-section row">
											<div class="col-md-12">
												<button class="blue-btn shadowed my-btn font-12">MER INFO</button>
											</div>				
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			<!-- <div class="col-md-12 col-sm-12" v-for="data in categoryData">
				<img v-bind:src="data.images[0].url" alt="">
				<p>{{data.aData.make}} {{data.aData.model}}</p>
				<p>{{data.aData.year}}</p>
				<p>{{data.aData.prices.main}} -</p>
				<p>{{data.aData.caravan_dealer_segment}}</p>
				<p>{{data.adId}}</p>
			</div> -->
		</div>

		<div class="brand-section">
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
		</div>
  	</div>
</template>


<script>

$(document).ready(function(){
	// loadProduct();
	var acc = $(".accordion");
	for (var i = 0; i < acc.length; i++) {
		$(acc[i]).click(function(){
			var panel = $(this).next();
			if ($(panel).css("display") === "block") {
				$(panel).css("display", "none");
				$(this).addClass("active");
			} else {
				$(panel).css("display", "block");
				$(this).removeClass("active");
			} 
		});
	}
	$(".toCategory-btn").click(function(){
		if($(window).width() < 580){
			$(this).css("display", "none");
			$(".toFilter-btn").css("display", "block");
			$("#sel1").css("display", "block");
			$(".display-opt").css("width", "100%");
			$(".display-opt").css("display", "block");
			$(".filter-wrapper").css("display", "none");
			$(".category-wrapper").css("display", "block");
		}
	});
	$(".toFilter-btn").click(function(){
		if($(window).width() < 580){
			$(this).css("display", "none");
			$(".toCategory-btn").css("display", "block");
			$("#sel1").css("display", "none");
			$(".display-opt").css("display", "none");
			$(".filter-wrapper").css("display", "block");
			$(".category-wrapper").css("display", "none");
		}
	});
});

import {mapGetters} from 'vuex';
// import {mapGetters} from 'vuex';
export default {

	computed: {
		...mapGetters({
			categoryData: 'categoryData'
		})
	},

    data() {
        return{
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
			]
			// filterData: [
			// 	{
			// 		name: "Challenger SIRIUS 3018",
			// 		productionDate: "2012",
			// 		distance: 36600,
			// 		cost: 719000,
			// 		sub: "Autoriser NCB-forhandler",
			// 		img: require("../../img/motorhome1.png")
			// 	},
			// ],
		}
	},
	mounted() {
		this.$store.dispatch('getCategoyData');
		console.log(this.categoryData);   
	},
	methods: {  		  	
		saveId() {  
			        
		}
	}
}
	
</script>
