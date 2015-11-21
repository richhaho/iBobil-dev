<template>
  	<div>
		<!-- <headerCommon></headerCommon> -->
		<div class="about-banner banner">
			<template v-if="top_banner_image">
				<div class="parallelogram" v-bind:style="{ backgroundImage: 'url(' + top_banner_image + ')' }">
					<div class="container">
						<div class="banner-content">
							<template v-if="top_banner_title">
								<h1 class="font-33 banner-title">{{ top_banner_title }}</h1>							
							</template>
							<template v-else>
								<h1 class="font-33 banner-title">Nord-Norges største <br>Caravansenter</h1>							
							</template>
						</div>
					</div>
				</div>				
			</template>
			<template v-else>
				<div class="parallelogram">
					<div class="container">
						<div class="banner-content">
							<template v-if="top_banner_title">
								<h1 class="font-33 banner-title">{{ top_banner_title }}</h1>							
							</template>
							<template v-else>
								<h1 class="font-33 banner-title">Nord-Norges største <br>Caravansenter</h1>							
							</template>
						</div>
					</div>
				</div>		
			</template>					
		</div>
		<div class=" article-container container">
			<div class="col-md-6">
				<div class="about-article" v-if="article_1" v-html="article_1">
					
				</div>
				<div class="about-article" v-else>
					<p class="font-25 title">En familiebedrift</p>
					<p class="font-21 sub-title">iCaraven er en familiebedrift som brenner for fritid, ferie go campingliv.</p><br>
					<p class="font-18">Siden starten i 2010 har vi opplevd solid vekst og god mottakelse i markedet. Vi er en av Nord-Norges ledende totalleverandør innen bobil og campingvogn, med landsdelens største caravansenter i Strandvegen i Tromsø.</p><br>
					<p class="font-18">Våre nye flotter lokaler på 2000kvm rommer alt du trenger for et problemfritt bobilhold og enklere campingliv. Fra markedsledende modeller til verksted, delelager og tilbehør. vi har også egen nettbutikk, med landets største utvalg innen deler og rekvisita til ulike firitdskøretøy</p><br>
					<p class="font-18">I samarbeid med kjeden Motorhome har iCaravan også Nord-Norges største senter for bobilutleie lokalisert i Tromsø. Det gir det perfekte utgangspunktet for deg som ønsker å oppleve landsdelens største severdigheter som Lofoten, Nordkapp, Senja og indre Troms. Uansett årstid!</p><br>
					<p class="font-18 foot-title">Søker du gode opplevelser?</p>
					<p class="font-18 foot-title">Start hos oss iCaravan!</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="about-article" v-if="article_2" v-html="article_2">
					
				</div>
				<div class="about-article" v-else>
					<p class="font-25 title">Bobilen du trenger</p>
					<p class="font-21 sub-title">Skal du kjøpe bobil, lønner det seg å ta turen til oss.</p><br>
					<p class="font-18">Vårt brede utvalg omfatter alt fra populære bestselgere til mer eksluksuive modeller. Vi tilbyr markedetsledende fritidskjøretøy som er konkurransedyktige når det gjelder både utstyrsgrad og pris.</p><br>
					<p class="font-18">Hos oss iCaravan har vi helt sikkert det du ser etter! Uansett hva du legger vekt på, vil du finne en bobil som tar hensyn til dine ønsker og behov Fra innovativ design og teknologi, til praktiske løsninger med god plass til både mennesker, utstyr og bagasje.</p><br>
					<p class="font-18">Vi vet hva som er viktig å tenke på når du skal kjøpe bobil - og deler mer enn gjerne vår kompetanse med deg! Våre erfarne kjøpshjelpere står alltid klare til å hjelpe deg med å velge den beste løsningen - med hensyn til både behov og lommebok. Har du spørsmål kan du alltid kontakte oss på live chat, telefon eller e-post.</p><br>
					<p class="font-18 foot-title">Ønsker du å vite mer om riktig valg av bobil?</p>
					<p class="font-18 foot-title"><span class="blue-text">Se tips og råd</span> fra våre kjøpshjelpere .</p>
				</div>
			</div>
			<div class="side-banner side1">
				<img :src="side_images[0]" alt="" v-if="side_images[0]">
				<img src="../../img/main/slide2-2.jpg" alt="" v-else>
			</div>
			<div class="side-banner side2">
				<img :src="side_images[1]" alt="" v-if="side_images[1]">
				<img src="../../img/main/left2.jpg" alt="" v-else>

			</div>
			<div class="side-banner side3">
				<img :src="side_images[2]" alt="" v-if="side_images[2]">
				<img src="../../img/main/right1.jpg" alt="" v-else>

			</div>
			<div class="side-banner side4">
				<img :src="side_images[3]" alt="" v-if="side_images[3]">
				<img src="../../img/main/right2.jpg" alt="" v-else>

			</div>
		</div>
		
		<div class="banner-slide">
			<div class="slide-wrapper row slide-wrapper1">
				<template v-if="slider_images.length > 0">
					<div class="slide-image" v-for="image in slider_images" >
						<img :src="image" alt="" class="image-style" style="width:500px;height:280px">
					</div>
				</template>
				<template v-else>
					<div class="slide-image">
						<img src="../../img/main/slide2-2.jpg" alt="">
					</div>
					<div class="slide-image">
						<img src="../../img/main/slide1-2.jpg" alt="">
					</div>
					<div class="slide-image">
						<img src="../../img/main/slide1-3.jpg" alt="">
					</div>
					<div class="slide-image">
						<img src="../../img/main/slide1-4.jpg" alt="">
					</div>
				</template>
			</div>
		</div>
		<div class="article-container container">
			<div class="col-md-6">
				<div class="about-article" v-html="article_3" v-if="article_3"></div>
				<div class="about-article" v-else>
					<p class="font-25 title">Veien til bedre opplevelser</p>
					<p class="font-21 sub-title">iCaravan har som mål å være best på mer enn bare kjøpshjelp og riktig valg av bobil.</p><br>
					<p class="font-18">Vi ønsker å gi deg tryggheten du trenger når bobilholdet starter for alvor Da slipper du å bekymre deg og kan heller nyte ferien slik den er ment å nytes.</p><br>
					<p class="font-18">Vi har et moderne verksted med stor kapasitet og høy kompetanse. Våre erfarne mekanikere er sertifisert for montering og vedlikehold av utstyr, som gassprodukter, på alle fritidskjøretøy.</p><br>
					<p class="font-18 foot-title">Vi tilbyr også drop-in-timer på testing av<br> fukt og gass.</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="about-article" v-html="article_4"  v-if="article_4"></div>
				<div class="about-article" v-else>
					<p class="font-25 title">Merkeverksted og delelager</p>
					<p class="font-21 sub-title">iCaravan er et sertifisert bransjegodkjent gassverksted i Nord-Norge, Tromsø.</p><br>
					<p class="font-18">iCaravan er merkeverksted og delelager for produsenter som Challenger, Mobilvetta, Euramobil, Concorde, Caravelair og Camp-let. Vi forhandler også alt innen teknisk utstyr som tv, varme og gass så vel som møbler og annet tilbehør for alle typer firitdskjøretøy.</p>					
				</div>
				<div class="stamp" style="text-align: center;">
						<img src="../../img/main/stamp.png" alt="">
				</div>
			</div>
		</div>
		<div class="about-banner2 banner">
			<template v-if="middle_banner_image">
				<div class="parallelogram" v-bind:style="{ backgroundImage: 'url(' + middle_banner_image + ')' }"></div>				
			</template>
			<template v-else>
				<div class="parallelogram"></div>		
			</template>
		</div>
		<div class="banner-slide">
			<div class="slide-wrapper row slide-wrapper2">
				<template v-if="middle_slider_images.length > 0">
					<div class="slide-image" v-for="image in middle_slider_images">
						<img :src="image" alt="">
					</div>
				</template>				
				<template v-else>
					<div class="slide-image" style="display:inline-block">
						<img src="../../img/main/slide1-2.jpg" alt="">
					</div>
					<div class="slide-image" style="display:inline-block">
						<img src="../../img/main/slide2-2.jpg" alt="">
					</div>
					<div class="slide-image" style="display:inline-block">
						<img src="../../img/main/slide2-3.jpg" alt="">
					</div>
					<div class="slide-image" style="display:inline-block">
						<img src="../../img/main/slide1-4.jpg" alt="">
					</div>
				</template>
				
			</div>
		</div>
		<!-- <div class="article-container container">
			<div class="contact-wrapper">
				<p class="section-title font-33">Lurer du på noe?</p>
				<p class="font-15">Vi står klare til å hjelpe deg både i butikk, over e-post og telefon</p>
				<div class="row">
					<div class="col-md-4">
						<div class="contact-panel">
							<img src="../../img/icons/contact-icon1.png" alt="">
							<p class="font-21 ">Besøk oss i dag</p>
							<p class="font-15">{{ address }}</p>
							<p class="cotact-detail font-15">Google Kart</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-panel">
							<img src="../../img/icons/contact-icon2.png" alt="">
							<p class="font-21">Send oss en e-post</p>
							<p class="cotact-detail font-15">{{ email }}</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-panel">
							<img src="../../img/icons/contact-icon3.png" alt="">
							<p class="font-21 ">Ring kundeservice</p>
							<p class="cotact-detail font-15">{{ phone }}</p>
						</div>
					</div>
					
				</div>
			</div>
		</div> -->		
		<contactinfo></contactinfo>	
		<!-- <footerCommon></footerCommon> -->
  	</div>
</template>


<script>
// import {mapGetters} from 'vuex';
import contactinfo from './contactinfo'

export default {
  name: 'about',
  components: {
      contactinfo
  },
  metaInfo () {
    return {
      title: this.meta_title,
      meta: [
        { vmid: 'description', name: 'description', content: this.meta_description }
      ]
    }
  },

  data(){
    return{
			title: 'CreateSite',
			user:{
				errors:[],
				
				_id: '',
				villa: '',
				email: ''			
			},
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
	      	meta_description:''		
    }
	},
	created(){
		$(function(){
	  	$(".slide-wrapper").css('width', '2100px');
	  });
		var self=this;
		this.$store.dispatch('get_home')
	                .then((data)=>{
	                    if(data){
	                    		// console.log(data);
	                        self.infos = data.infos;
	                        self.top_banner_image = self.infos.filter((product) => {
															  return product.key == 'top_banner_image';
														})[0] ? self.top_banner_image = self.infos.filter((product) => {
															  return product.key == 'top_banner_image';
														})[0].value : '';

	                        // self.top_banner_image = 'background-image: '+self.top_banner_image;

	                        self.top_banner_title = self.infos.filter((product) => {
															  return product.key == 'top_banner_title';
														})[0]? self.top_banner_title = self.infos.filter((product) => {
															  return product.key == 'top_banner_title';
														})[0].value : '';

	                        self.article_1 = self.infos.filter((product) => {
															  return product.key == 'article_1';
														})[0] ? self.article_1 = self.infos.filter((product) => {
															  return product.key == 'article_1';
														})[0].value : '';


	                        self.article_2 = self.infos.filter((product) => {
															  return product.key == 'article_2';
														})[0] ? self.article_2 = self.infos.filter((product) => {
															  return product.key == 'article_2';
														})[0].value : '';

	                        self.article_3 = self.infos.filter((product) => {
															  return product.key == 'article_3';
														})[0] ? self.article_3 = self.infos.filter((product) => {
															  return product.key == 'article_3';
														})[0].value : '';

	                        self.article_4 = self.infos.filter((product) => {
															  return product.key == 'article_4';
														})[0] ? self.article_4 = self.infos.filter((product) => {
															  return product.key == 'article_4';
														})[0].value : '';

	                        self.side_images = self.infos.filter((product) => {
															  return product.key == 'side_images';
														})[0] ? self.side_images = self.infos.filter((product) => {
															  return product.key == 'side_images';
														})[0].value : '';


	                        self.slider_images = self.infos.filter((product) => {
															  return product.key == 'slider_images';
														})[0] ? self.slider_images = self.infos.filter((product) => {
															  return product.key == 'slider_images';
														})[0].value : '';
	                        
	                        self.middle_banner_image = self.infos.filter((product) => {
															  return product.key == 'middle_banner_image';
														})[0] ? self.middle_banner_image = self.infos.filter((product) => {
															  return product.key == 'middle_banner_image';
														})[0].value : '';
	                        self.middle_slider_images = self.infos.filter((product) => {
															  return product.key == 'middle_slider_images';
														})[0] ? self.middle_slider_images = self.infos.filter((product) => {
															  return product.key == 'middle_slider_images';
														})[0].value : '';
	                        self.address = self.infos.filter((product) => {
															  return product.key == 'address';
														})[0] ? self.address = self.infos.filter((product) => {
															  return product.key == 'address';
														})[0].value : '';
	                        self.email = self.infos.filter((product) => {
															  return product.key == 'email';
														})[0] ? self.email = self.infos.filter((product) => {
															  return product.key == 'email';
														})[0].value : '';
	                        self.phone = self.infos.filter((product) => {
															  return product.key == 'phone';
														})[0] ? self.phone = self.infos.filter((product) => {
															  return product.key == 'phone';
														})[0].value : '';

													self.meta_title = self.infos.filter((product) => {
															  return product.key == 'about_meta_title';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'about_meta_title';
														})[0].value : '';	

													self.meta_description = self.infos.filter((product) => {
															  return product.key == 'about_meta_description';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'about_meta_description';
														})[0].value : '';		

	                        var length1 = self.slider_images.length;
	                        if(length1){
	                        	var width = length1*525;
	                        	console.log(width);
	  												$(".slide-wrapper1").css('width', width + 'px');
	                        }
	                        

	  											var length2 = self.middle_slider_images.length;
	  											if(length2){
	  												var width = length2*525;
	  												$(".slide-wrapper2").css('width', width + 'px');
	  											}
	                        

																			                
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
	.image-style{
		height: 200px;
    width: auto;
	}
</style>
