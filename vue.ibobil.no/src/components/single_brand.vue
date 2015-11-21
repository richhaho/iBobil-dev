<template>
  	<div style="background-color: #F0F3F4">
		<div class="container">
			<div class="col-md-8 col-sm-12">
				<div class="detail-section">
					<p class="path font-12">Hjem <i class="fa fa-caret-right"></i> Bobil <i class="fa fa-caret-right"></i> Brukte bobiler <i class="fa fa-caret-right"></i><span class="blue-text underlined"> Challenger Sirius 3197 </span></p>
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
				<div class="section row">
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
					<p class="font-15">Årsmodell: {{caravanData.adata.year}}</p>
					<p class="font-15">Km. stand: {{caravanData.adata.distance}} km</p>
					<p class="font-15">Soveplasser: {{caravanData.adata.no_of_sleepers}}</p>
					<p class="font-15">Lengde: {{caravanData.adata.length}} cm</p>
					<p class="font-15 blue-text">Mer informasjon <i class="fa fa-caret-down"></i></p>
					<p class="font-25">kr {{caravanData.adata.prices.main}},-</p>
					<div class="sub-section row">
						<div class="col-md-12">
							<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 full-width">KJØP NÅ</button></div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-6"><button class="shadowed gray-btn my-btn font-12 full-width">FÅ TILBUD</button></div>
							<div class="col-md-6 col-sm-6 col-xs-6"><button class="shadowed gray-btn my-btn font-12 full-width">SPØR OSS</button></div>
						</div>
					</div>
					<p class="font-15 blue-text" style="margin-top:10px">Lånekalkulator <i class="fa fa-caret-right"></i></p>
				</div>
			</div>
		</div>
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
$(document).ready(function(){
	if($("#detail-content").offset())
		var sticky = $("#detail-content").offset().top;
	var stickyPanel = function(){
		var scrollTop = $("body").scrollTop();
		if (scrollTop > sticky) { 
			$('#detail-content').addClass('sticky');
		} else {
			$('#detail-content').removeClass('sticky');
		}
	}
	stickyPanel();
	$("body").scroll(function() {
		stickyPanel();
	});	
});
import {mapGetters} from 'vuex';
export default {	
 		data () {
      return {
      	
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
			caravanData: 'brandData',
			caravanDataTitle: 'brandDataTitle',
			caravanDataDescription: 'brandDataDescription',
		})
	},
	mounted() {
		// this.$store.dispatch('getCategoyData', this.categoryId);		
		var item = $("#myCarousel .item");
		$(item[0]).addClass("active");
	},
}

</script>

<style scoped>

	.video-div{
		width: 100%;
    height: 400px;
	}
	
</style>
