<template>
  	<div>
			<div class="top-banner banner" v-if="home_top_image" v-bind:style="{ backgroundImage: 'url(' + home_top_image + ')' }">
				<div class="gradient-back">
					<div class="container">
						<div class="banner-content">

							<p class="sign_letter" v-if="home_top_sub_headline" style="color:white">{{ home_top_sub_headline }}</p>
							<p class="sign_letter" v-else style="color:white">gode tilbud</p>
							<h1 class="font-33 banner-title" v-if="home_top_headline" style="color:white">{{ home_top_headline }}</h1>
							<h1 class="font-33 banner-title" v-else style="color:white">BOBILEN DU TRENGER</h1>
							<p v-if="home_top_text" v-html="home_top_text" style="color:white"></p>
							<p v-else style="color:white">Skal du kjøpe bobil, lønner det seg å ta turen til oss. Vårt brede utvalg omfatter alt fra populære best-selgere til mer eksklusive modeller.</p>
							<router-link tag="button" to="/bobil"class="blue-btn shadowed my-btn">SE ALLE BOBILER</router-link>
						</div>
					</div>
				</div>				
			</div>
			<div class="top-banner banner" v-else>
				<div class="gradient-back">
					<div class="container">
						<div class="banner-content">

							<p class="sign_letter" v-if="home_top_sub_headline" style="color:white">{{ home_top_sub_headline }}</p>
							<p class="sign_letter" v-else style="color:white">gode tilbud</p>
							<h1 class="font-33 banner-title" v-if="home_top_headline" style="color:white">{{ home_top_headline }}</h1>
							<h1 class="font-33 banner-title" v-else style="color:white">BOBILEN DU TRENGER</h1>
							<p v-if="home_top_text" v-html="home_top_text" style="color:white"></p>
							<p v-else style="color:white">Skal du kjøpe bobil, lønner det seg å ta turen til oss. Vårt brede utvalg omfatter alt fra populære best-selgere til mer eksklusive modeller.</p>
							<router-link tag="button" to="/bobil"class="blue-btn shadowed my-btn">SE ALLE BOBILER</router-link>
						</div>
					</div>
				</div>				
			</div>
			<div class="container">
				<div class="row seller-contact">					
					<div class="col-md-4">
						<a href="https://icaravan.freshsales.io/web_forms/dd43eaec6c0a3de5b4c2ae2cdb33759986c37f3ff9081b128baae352ba6014f7/form.html" target="_blank">
						<div class="seller-contact-panel shadowed blue-btn my-panel" @mouseover="document_image" @mouseleave="document_image2">
							<img src="/static/document.svg" alt="" id="document_image" style="height: 80px;margin-right:10px;margin-left:-10px">
							<div class="panel-content">
								<div>
									<p class="panel-title font-21">Få et tilbud</p>
									<p class="panel-description font-13">Fyll ut et enkelt skjema og vi tar kontakt med deg.</p>
								</div>
								<a class="linkToForm font-13 my-btn-2" href="https://icaravan.freshsales.io/web_forms/dd43eaec6c0a3de5b4c2ae2cdb33759986c37f3ff9081b128baae352ba6014f7/form.html" target="_blank">GÅ TIL SKJEMA <img src="../../img/icons/right-arrow.png" alt=""></a>
							</div>
						</div>
						</a>
					</div>
					<div class="col-md-4">
						<router-link to="/finansiering">
						<div class="seller-contact-panel shadowed blue-btn my-panel" @mouseover="handshake_image" @mouseleave="handshake_image2">
							<img src="/static/handshake.svg" alt="" id="handshake_image" style="height: 80px;margin-right:10px;margin-left:-10px">
							<div class="panel-content">
								<div>
									<p class="panel-title font-21">Søk finansiering</p>
									<p class="panel-description font-13">Vi hjelper deg med finansiering av din bobil.</p>
								</div>
								<router-link to="/finansiering" class="linkToForm font-13 my-btn-2">LÅNEKALKULATOR <img src="../../img/icons/right-arrow.png" alt=""></router-link>
							</div>
						</div>
						</router-link>
					</div>
					<div class="col-md-4">
						<a href="https://icaravan.freshsales.io/web_forms/7a8344bb5bed23ace8f3f49554ac9926a1d3f3bbf62f520f2afd842af76b9b76/form.html" target="_blank">
						<div class="seller-contact-panel shadowed blue-btn my-panel" @mouseover="customer_image" @mouseleave="customer_image2">
							<img src="/static/customer-support.svg" alt="" id="customer_image" style="height: 80px;margin-right:10px;margin-left:-10px">
							<div class="panel-content">
								<div>
									<p class="panel-title font-21">Kundeservice</p>
									<p class="panel-description font-13">Vi er her for deg etter handelen også.</p>
								</div>
								<a class="linkToForm font-13 my-btn-2" href="https://icaravan.freshsales.io/web_forms/7a8344bb5bed23ace8f3f49554ac9926a1d3f3bbf62f520f2afd842af76b9b76/form.html" target="_blank">KONTAKT OSS <img src="../../img/icons/right-arrow.png" alt=""></a>
							</div>
						</div>
						</a>
					</div>
				</div>
				<div class="row m-20-0">
					<div class="product">
						<div class="row">
							<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
							  
							  	<template v-if="width <= 991">
									  <carousel :perPage="1">
											  <slide>
											    <div :class="{ 'col-md-3':true, 'col-sm-12':true, 'item':true, 'active': true}" v-if="weekly_motorhome_product">
														<span class="product-tag"><span class="product-tag-inside">UKENS BOBIL</span></span>							  			

														<div :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}">
															<img v-bind:src="weekly_motorhome_product.images[0].url" alt="" class="img-responsive width100 top-radius">
															<div class="sub-section sub-section1">
																<p class="product-title font-16">{{weekly_motorhome_product.adata.make}} {{weekly_motorhome_product.adata.model}}</p>
																<p class="property font-15"><span>{{weekly_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{weekly_motorhome_product.adata.mileage}} km</span></p>
															</div>
															<div class="sub-section-gap sub-section2">
																<div class="sub-section">
																	<p class="cost font-20"><span>{{weekly_motorhome_product.adata.prices ? weekly_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
																	<p class="sub font-13">{{weekly_motorhome_product.adata.caravan_dealer_segment}}</p>
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
															<div class="sub-section row sub-section3">
																<div class="col-md-12">
																	<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1"  @click="saveId(weekly_motorhome_product.slug)">MER INFO</button></div>
																</div>
															</div>
														</div>
													</div>
											  </slide>
											  <slide>
											  	<div :class="{ 'col-md-3':true, 'col-sm-12':true, 'item':true, 'active': false}" v-if="new_motorhome_product">
														<span class="product-tag"><span class="product-tag-inside">SISTE NYESTE BOBIL</span></span>							  			

														<div  :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}">
															<img v-bind:src="new_motorhome_product.images[0].url" alt="" class="img-responsive width100 top-radius">
															<div class="sub-section sub-section1">
																<p class="product-title font-16">{{new_motorhome_product.adata.make}} {{new_motorhome_product.adata.model}}</p>
																<p class="property font-15"><span>{{new_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{new_motorhome_product.adata.mileage}} km</span></p>
															</div>
															<div class="sub-section-gap sub-section2">
																<div class="sub-section">
																	<p class="cost font-20"><span>{{new_motorhome_product.adata.prices ? new_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
																	<p class="sub font-13">{{new_motorhome_product.adata.caravan_dealer_segment}}</p>
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
															<div class="sub-section row sub-section3">
																<div class="col-md-12">
																	<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1"  @click="saveId(new_motorhome_product.slug)">MER INFO</button></div>
																</div>
															</div>
														</div>
													</div>  
											  </slide>
											  <slide>
											  	<div :class="{ 'col-md-3':true, 'col-sm-12':true, 'item':true, 'active': false}" v-if="used_motorhome_product">
														<span class="product-tag"><span class="product-tag-inside">SISTE BRUKTE BOBIL</span></span>							  			

														<div  :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" >
															<img v-bind:src="used_motorhome_product.images[0].url" alt="" class="img-responsive width100 top-radius">
															<div class="sub-section sub-section1">
																<p class="product-title font-16">{{used_motorhome_product.adata.make}} {{used_motorhome_product.adata.model}}</p>
																<p class="property font-15"><span>{{used_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{used_motorhome_product.adata.mileage}} km</span></p>
															</div>
															<div class="sub-section-gap sub-section2">
																<div class="sub-section">
																	<p class="cost font-20"><span>{{used_motorhome_product.adata.prices ? used_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
																	<p class="sub font-13">{{used_motorhome_product.adata.caravan_dealer_segment}}</p>
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
															<div class="sub-section row sub-section3">
																<div class="col-md-12">
																	<div class="col-md-12"><button href="" class="blue-btn shadowed my-btn font-12 button-1" @click="saveId(used_motorhome_product.slug)">MER INFO</button></div>
																</div>
															</div>
														</div>
													</div>  
											  </slide>
											  <slide>
											  	<div :class="{ 'col-md-3':true, 'col-sm-12':true, 'item':true, 'active': false}" v-if="sale_motorhome_product">
														<span class="product-tag"><span class="product-tag-inside">BOBIL PA TILBUD</span></span>						  			

														<div  :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" >
															<img v-bind:src="sale_motorhome_product.images[0].url" alt="" class="img-responsive width100 top-radius">
															<div class="sub-section sub-section1">
																<p class="product-title font-16">{{sale_motorhome_product.adata.make}} {{sale_motorhome_product.adata.model}}</p>
																<p class="property font-15"><span>{{sale_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{sale_motorhome_product.adata.mileage}} km</span></p>
															</div>
															<div class="sub-section-gap sub-section2">
																<div class="sub-section">
																	<p class="cost font-20"><span>{{ sale_motorhome_product.adata.prices ? sale_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
																	<p class="sub font-13">{{sale_motorhome_product.adata.caravan_dealer_segment}}</p>
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
															<div class="sub-section row sub-section3">
																<div class="col-md-12">
																	<div class="col-md-12"><button href="" class="blue-btn shadowed my-btn font-12 button-1" @click="saveId(sale_motorhome_product.slug)">MER INFO</button></div>
																</div>
															</div>
														</div>
													</div>  
											  </slide>	
										</carousel>
							  	</template>
							  	<template v-else>
							  		<div class="carousel-inner" role="listbox">
								  		<div class="item active">
									  		<div  :class="{ 'col-md-3':true, 'col-sm-12':true}" v-if="weekly_motorhome_product">
													<span class="product-tag"><span class="product-tag-inside">UKENS BOBIL</span></span>								  			
													<div  :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" @click="saveId(weekly_motorhome_product.slug)">
														<img v-bind:src="weekly_motorhome_product.images[0].url" alt="" class="img-responsive top-radius">
														<div class="sub-section sub-section1">
															<p class="product-title font-16">{{weekly_motorhome_product.adata.make}} {{weekly_motorhome_product.adata.model}}</p>
															<p class="property font-15"><span>{{weekly_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{weekly_motorhome_product.adata.mileage}} km</span></p>
														</div>
														<div class="sub-section-gap sub-section2">
															<div class="sub-section">
																<p class="cost font-20"><span>{{weekly_motorhome_product.adata.prices ? weekly_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
																<p class="sub font-13">{{weekly_motorhome_product.adata.caravan_dealer_segment}}</p>
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
														<div class="sub-section row sub-section3">
															<div class="col-md-12">
																<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1">MER INFO</button></div>
															</div>
														</div>
													</div>
												</div>
												<div  :class="{ 'col-md-3':true, 'col-sm-12':true}" v-if="new_motorhome_product">
													<span class="product-tag"><span class="product-tag-inside">SISTE NYESTE BOBIL</span></span>								  			

													<div  :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" @click="saveId(new_motorhome_product.slug)">
													<img v-bind:src="new_motorhome_product.images[0].url" alt="" class="img-responsive top-radius">
													<div class="sub-section sub-section1">
														<p class="product-title font-16">{{new_motorhome_product.adata.make}} {{new_motorhome_product.adata.model}}</p>
														<p class="property font-15"><span>{{new_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{new_motorhome_product.adata.mileage}} km</span></p>
													</div>
													<div class="sub-section-gap sub-section2">
														<div class="sub-section">
															<p class="cost font-20"><span>{{new_motorhome_product.adata.prices ? new_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
															<p class="sub font-13">{{new_motorhome_product.adata.caravan_dealer_segment}}</p>
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
													<div class="sub-section row sub-section3">
														<div class="col-md-12">
															<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1">MER INFO</button></div>
														</div>
													</div>
													</div>
												</div>
												<div  :class="{ 'col-md-3':true, 'col-sm-12':true}" v-if="used_motorhome_product">
													<span class="product-tag"><span class="product-tag-inside">SISTE BRUKTE BOBIL</span></span>				  			

													<div  :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" @click="saveId(used_motorhome_product.slug)">
													<img v-bind:src="used_motorhome_product.images[0].url" alt="" class="img-responsive top-radius">
													<div class="sub-section sub-section1">
														<p class="product-title font-16">{{used_motorhome_product.adata.make}} {{used_motorhome_product.adata.model}}</p>
														<p class="property font-15"><span>{{used_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{used_motorhome_product.adata.mileage}} km</span></p>
													</div>
													<div class="sub-section-gap sub-section2">
														<div class="sub-section">
															<p class="cost font-20"><span>{{used_motorhome_product.adata.prices ? used_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
															<p class="sub font-13">{{used_motorhome_product.adata.caravan_dealer_segment}}</p>
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
													<div class="sub-section row sub-section3">
														<div class="col-md-12">
															<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1">MER INFO</button></div>
														</div>
													</div>
													</div>
												</div>
												<div  :class="{ 'col-md-3':true, 'col-sm-12':true}" v-if="sale_motorhome_product">
													<span class="product-tag"><span class="product-tag-inside">BOBIL PA TILBUD</span></span>								  			

													<div  :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" @click="saveId(sale_motorhome_product.slug)">
													<img v-bind:src="sale_motorhome_product.images[0].url" alt="" class="img-responsive top-radius">
													<div class="sub-section sub-section1">
														<p class="product-title font-16">{{sale_motorhome_product.adata.make}} {{sale_motorhome_product.adata.model}}</p>
														<p class="property font-15"><span>{{sale_motorhome_product.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{sale_motorhome_product.adata.mileage}} km</span></p>
													</div>
													<div class="sub-section-gap sub-section2">
														<div class="sub-section">
															<p class="cost font-20"><span>{{sale_motorhome_product.adata.prices ? sale_motorhome_product.adata.prices.main : 'N/A' }},-</span></p>
															<p class="sub font-13">{{sale_motorhome_product.adata.caravan_dealer_segment}}</p>
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
													<div class="sub-section row sub-section3">
														<div class="col-md-12">
															<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1">MER INFO</button></div>
														</div>
													</div>
													</div>
												</div>
											</div>	
							  		</div>								
							  	</template>					    
							  
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="gallery-banner banner gallery-banner2">
				<div class="gradient-back gradient-back2">
					<div class="container">
						<div class="banner-content banner-content2">
							<p class="sign_letter sign_letter2">iCaravan TV</p>
							<p>Se filmer av 2017 bobiler</p>
							<a href="https://fast.wistia.net/embed/playlists/5ir69n4fbo?bento%5BmenuPosition%5D=bottom&media_0_0%5BautoPlay%5D=true&media_0_0%5BcontrolsVisibleOnLoad%5D=false&plugin%5Bsocialbar-v1%5D%5Bbuttons%5D=embed-twitter-googlePlus-facebook&plugin%5Bsocialbar-v1%5D%5Bposition%5D=bottom&popover=true&theme=bento&version=v1&videoOptions%5BautoPlay%5D=true&videoOptions%5BplayerColor%5D=0c6deb&videoOptions%5BvideoHeight%5D=360&videoOptions%5BvideoWidth%5D=640&videoOptions%5BvolumeControl%5D=true ">
							<button class="blue-btn shadowed circle-btn video-play"><img src="../../img/icons/play.png" alt=""></button></a>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row m-20-0">
					<div class="section-title flex-between">
						<div class="category-sort">
							<Span class="font-25 color-blue">Bobiler</Span>
							<span class="color-grey">- siste brukte bobiler</span>
						</div>
						<div class="link">
							<span class="color-blue pointer" @click="gotoRV(1)">Se alle brukte bobiler >></span>
						</div>
					</div>
					<div class="product">
						<div class="row">
							<div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
							  
							  	<template v-if="width <= 991">							  		
									  <carousel :perPage="1">
									  	<template v-for="(data,index) in oldproducts" v-if="index < 4">
											  <slide>
											    <div v-if="index < 4" :class="{ 'col-md-3':true, 'col-sm-12':true, 'item':true, 'active': index == 0}" >
														<div :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}">
															<img v-bind:src="data.images[0].url" alt="" class="img-responsive top-radius width100">
															<div class="sub-section sub-section1">
																<p class="product-title font-16">{{data.adata.make}} {{data.adata.model}}</p>
																<p class="property font-15"><span>{{data.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{data.adata.mileage ? data.adata.mileage : 0}} km</span></p>
															</div>
															<div class="sub-section-gap sub-section2">
																<div class="sub-section">
																	<p class="cost font-20"><span>{{data.adata.prices ? data.adata.prices.main : 'N/A'}},-</span></p>
																	<p class="sub font-13">{{data.adata.caravan_dealer_segment}}</p>
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
															<div class="sub-section row sub-section3">
																<div class="col-md-12">
																	<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1"  @click="saveId(data.slug)">MER INFO</button></div>
																</div>
															</div>
														</div>
													</div>
											  </slide>										  
										  </template>
										</carousel>
							  	</template>
							  	<template v-else>
							  		<div class="carousel-inner" role="listbox">
								  		<div class="item active">
									  		<div v-for="(data,index) in oldproducts" v-if="index < 4" :class="{ 'col-md-3':true, 'col-sm-12':true}">
												<div :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" @click="saveId(data.slug)">
													<img v-bind:src="data.images[0].url" alt="" class="img-responsive top-radius">
													<div class="sub-section sub-section1">
														<p class="product-title font-16">{{data.adata.make}} {{data.adata.model}}</p>
														<p class="property font-15"><span>{{data.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{data.adata.mileage}} km</span></p>
													</div>
													<div class="sub-section-gap sub-section2">
														<div class="sub-section">
															<p class="cost font-20"><span>{{data.adata.prices ? data.adata.prices.main : 'N/A'}},-</span></p>
															<p class="sub font-13">{{data.adata.caravan_dealer_segment}}</p>
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
													<div class="sub-section row sub-section3">
														<div class="col-md-12">
															<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1">MER INFO</button></div>
														</div>
														
													</div>
												</div>
											</div>
										</div>
									</div>									
							  </template>					    
							  
							</div>
						</div>
					</div>
				</div>
				<div class="row m-20-0">
					<div class="section-title flex-between">
						<div class="category-sort">
							<Span class="font-25 color-blue">Bobiler</Span>
							<span class="color-grey">- siste nye bobiler</span>
						</div>
						<div class="link">
							<span class="color-blue pointer" @click="gotoRV(2)">Se alle nye bobiler >></span>
						</div>
					</div>
					<div class="product">
						<div class="row">
							<div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
							  
							  	<template v-if="width <= 991">						  		

									  <carousel :perPage="1" :autoplay="true">
									  	<template v-for="(data,index) in newproducts" v-if="index < 4">
											  <slide>
											    <div v-if="index < 4" :class="{ 'col-md-3':true, 'col-sm-12':true, 'item':true, 'active': index == 0}" >
														<div :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" >
															<img v-bind:src="data.images[0].url" alt="" class="img-responsive top-radius width100">
															<div class="sub-section sub-section1">
																<p class="product-title font-16">{{data.adata.make}} {{data.adata.model}}</p>
																<p class="property font-15"><span>{{data.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{data.adata.mileage ? data.adata.mileage : 0}} km</span></p>
															</div>
															<div class="sub-section-gap sub-section2">
																<div class="sub-section">
																	<p class="cost font-20"><span>{{data.adata.prices ? data.adata.prices.main : 'N/A'}},-</span></p>
																	<p class="sub font-13">{{data.adata.caravan_dealer_segment}}</p>
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
															<div class="sub-section row sub-section3">
																<div class="col-md-12">
																	<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1" @click="saveId(data.slug)">MER INFO</button></div>
																</div>
															</div>
														</div>
													</div>
											  </slide>										  
										  </template>
										</carousel>
							  	</template>
							  	<template v-else>
							  		<div class="carousel-inner" role="listbox">
								  		<div class="item active">
									  		<div v-for="(data,index) in newproducts" v-if="index < 4" :class="{ 'col-md-3':true, 'col-sm-12':true}">
												<div :class="{ 'product-hover':true, 'myproduct':true,'pointer':true}" @click="saveId(data.slug)">
													<img v-bind:src="data.images[0].url" alt="" class="img-responsive top-radius">
													<div class="sub-section sub-section1">
														<p class="product-title font-16">{{data.adata.make}} {{data.adata.model}}</p>
														<p class="property font-15"><span>{{data.adata.year}}</span>&nbsp;&nbsp;&nbsp;<span>{{data.adata.mileage ? data.adata.mileage : 0}} km</span></p>
													</div>
													<div class="sub-section-gap sub-section2">
														<div class="sub-section">
															<p class="cost font-20"><span>{{data.adata.prices ? data.adata.prices.main : 'N/A'}},-</span></p>
															<p class="sub font-13">{{data.adata.caravan_dealer_segment}}</p>
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
													<div class="sub-section row sub-section3">
														<div class="col-md-12">
															<div class="col-md-12"><button class="blue-btn shadowed my-btn font-12 button-1">MER INFO</button></div>
														</div>														
													</div>
												</div>
											</div>
										</div>	
							  		</div>								
							  	</template>					    
							  
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<p class="font-10" style="font-family: 'Gotham-Medium'">ANNONSE</p>
				<div class="ad-wrapper">
					<p class="font-25">HER KOMMER ANNONSEBILDE</p>
				</div>
			</div>			
			<contactinfo></contactinfo>	

  	</div>
</template>


<script>
// import {mapGetters} from 'vuex';
import contactinfo from './contactinfo'

export default {	
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
					user:{
						errors:[],
						
						_id: '',
						villa: '',
						email: ''			
					},
					contactForm: [
						{
							title: "Få et tilbud",
							description: "Fyll ut et enkelt skjema og vi tar kontakt med deg.",
							icon: require("../../static/document.svg"),
							linkString: "GÅ TIL SKJEMA"
						},
						{
							title: "Søk finansiering",
							description: "Vi hjelper deg med finansiering av din bobil.",
							icon: require("../../static/handshake.svg"),
							linkString: "LÅNEKALKULATOR"
						},
						// {
						// 	title: "Kundeservice",
						// 	description: "Vi er her for deg etter handelen også.",
						// 	icon: require("../../static/customer-support.svg"),
						// 	linkString: "KONTAKT OSS"
						// }
					],
					productData: [
						{
							name: "Challenger SIRIUS 3018",
							productionDate: "2012",
							distance: 36600,
							cost: 719000,
							sub: "Autoriser NCB-forhandler",
							img: require("../../img/motorhome1.png")
						},
						{
							name: "Challenger SIRIUS 3018",
							productionDate: "2012",
							distance: 36600,
							cost: 719000,
							sub: "Autoriser NCB-forhandler",
							img: require("../../img/motorhome2.png")
						},
						{
							name: "Challenger SIRIUS 3018",
							productionDate: "2012",
							distance: 36600,
							cost: 719000,
							sub: "Autoriser NCB-forhandler",
							img: require("../../img/motorhome3.png")
						},
						{
							name: "Challenger SIRIUS 3018",
							productionDate: "2012",
							distance: 36600,
							cost: 719000,
							sub: "Autoriser NCB-forhandler",
							img: require("../../img/motorhome4.png")
						}
					],
					contactInfo: [
						{
							img: require("../../img/icons/contact-icon1.png"),
							title: "Besøk oss i dag  Strandvegen 144B, 9006 Tromsø Google Kart"
						}
					],
					width:0,
					products:[],
					newproducts:[],
					oldproducts:[],
					weekly_motorhome:'',
	      	new_motorhome:'',
	      	used_motorhome:'',
	      	sale_motorhome:'',

	      	weekly_motorhome_product:'',
	      	new_motorhome_product:'',
	      	used_motorhome_product:'',
	      	sale_motorhome_product:'',
	      	infos:[]	,
	      	home_top_sub_headline:'',
	      	home_top_headline:'',
	      	home_top_text:'',
	      	home_top_image:'',
	      	brand_top_headline:'',
	      	brand_top_sub_headline:'',
	      	// brand_top_text:'',
	      	brand_top_image:'',
	      	meta_title:'',
	      	meta_description:''		
        }
	},
	mounted() {
		var self= this;
		this.$store.dispatch('getRV')
        .then((data)=>{
            if(data){
                self.products = data;
                self.oldproducts = self.products.filter((product) => {
								  return product.adata.mileage;
								});
								self.newproducts = self.products.filter((product) => {
								  return !product.adata.mileage;
								});

								this.$store.dispatch('get_home')
							      .then((data)=>{
							          if(data){
							            self.infos = data.infos;
							            self.home_top_headline = self.infos.filter((product) => {
															  return product.key == 'home_top_headline';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'home_top_headline';
														})[0].value : '';
													self.home_top_sub_headline = self.infos.filter((product) => {
															  return product.key == 'home_top_sub_headline';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'home_top_sub_headline';
														})[0].value : '';  
													self.home_top_text = self.infos.filter((product) => {
															  return product.key == 'home_top_text';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'home_top_text';
														})[0].value : '';  
													self.home_top_image = self.infos.filter((product) => {
															  return product.key == 'home_top_image';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'home_top_image';
														})[0].value : '';  
													self.brand_top_headline = self.infos.filter((product) => {
															  return product.key == 'brand_top_headline';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'brand_top_headline';
														})[0].value : '';  
													self.brand_top_sub_headline = self.infos.filter((product) => {
															  return product.key == 'brand_top_sub_headline';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'brand_top_sub_headline';
														})[0].value : '';  
													self.brand_top_image = self.infos.filter((product) => {
															  return product.key == 'brand_top_image';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'brand_top_image';
														})[0].value : ''; 
							            self.weekly_motorhome = self.infos.filter((product) => {
															  return product.key == 'weekly_motorhome';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'weekly_motorhome';
														})[0].value : '';							            
													self.new_motorhome = self.infos.filter((product) => {
															  return product.key == 'new_motorhome';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'new_motorhome';
														})[0].value : '';
													self.used_motorhome = self.infos.filter((product) => {
															  return product.key == 'used_motorhome';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'used_motorhome';
														})[0].value : '';
													self.sale_motorhome = self.infos.filter((product) => {
															  return product.key == 'sale_motorhome';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'sale_motorhome';
														})[0].value : '';

													self.meta_title = self.infos.filter((product) => {
															  return product.key == 'home_meta_title';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'home_meta_title';
														})[0].value : '';	

													self.meta_description = self.infos.filter((product) => {
															  return product.key == 'home_meta_description';
														})[0] ? self.infos.filter((product) => {
															  return product.key == 'home_meta_description';
														})[0].value : '';		

													if(self.weekly_motorhome){
							            	self.weekly_motorhome_product = self.products.filter((product) => {
															  return product.id == self.weekly_motorhome;
														})[0];
							            }	
							            if(self.new_motorhome){
							            	self.new_motorhome_product = self.products.filter((product) => {
															  return product.id == self.new_motorhome;
														})[0];
							            }
							            if(self.used_motorhome){
							            	self.used_motorhome_product = self.products.filter((product) => {
															  return product.id == self.used_motorhome;
														})[0];
							            }
							            if(self.sale_motorhome){
							            	self.sale_motorhome_product = self.products.filter((product) => {
															  return product.id == self.sale_motorhome;
														})[0];
							            }
							          } else{

							          }        
							      })
							      .catch((error)=> {
							          console.log('error:',error);           
							      });
            } else{
            	
            }        
        })
        .catch((error)=> {
            console.log('error:',error);           
        });
        
		this.width = $(window).width();
	},
	created() {
	  window.addEventListener('resize', this.handleResize);
	},
	beforeDestroy() {
	  window.removeEventListener('resize', this.handleResize)
	},
	methods:{
		saveId(id) {  
			this.$router.push({path :'/bobil/'+id});                         
			
		},
		brandclick(id){
			// this.$store.dispatch('getBrandData', id);			
			this.$router.push('/merker_caravan');
		},
		handleResize(){
			this.width = $(window).width();
		},
		gotoRV(id){
			console.log(id);
			this.$store.state.used=id;
			this.$router.push('/bobil');
		},
		document_image(){
      $('#document_image').attr('src','/static/document2.svg'); 
    },
    document_image2(){
      $('#document_image').attr('src','/static/document.svg'); 
    },
    handshake_image(){
      $('#handshake_image').attr('src','/static/handshake2.svg'); 

    },
    handshake_image2(){
      $('#handshake_image').attr('src','/static/handshake.svg'); 

    },
    customer_image(){
      $('#customer_image').attr('src','/static/customer-support2.svg');    
    },
    customer_image2(){
      $('#customer_image').attr('src','/static/customer-support.svg'); 
    },

	}

}
	
</script>

<style scoped>
	.color-blue{
		    /*color: #3A8ECA;*/
		    color:#79c7ff;
	}
	.color-grey{
		color:#ababab;
	}
	.flex-between{
		display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
	}
	.product-title{
		color: #000;
	}
	.product-title:hover{
		color: #2D9EDC;
	}

	.property {
    font-family: 'Gotham-Bold';
	}

	.sub-section-gap {
    padding: 0 10px;
	}

	.sub-section {
	    border-top: 1px solid #D1DBE4;
	    border-bottom: 1px solid #D1DBE4;
	}
	.cost {
    font-family: 'Gotham-Bold';
    margin: 0;
	}
	.sub-section-gap {
    padding: 0 10px;
	}
	.sub-section {
    padding: 10px;
	}
	.product-section .product .col-md-12 .sub-section button {
    width: 100%;
    margin: 5px 0;
	}
	.m-20-0{
		margin:20px 0px;
	}

	.product-hover:hover {
	    border: 1px solid #d1dbe4;
	}
	.button-1{
		width: 100%;
    margin-bottom: 10px;
    box-shadow:none;
    
	}
	.button-2{
		width: 100%;
	}

	.sub-section1 {
	    border-top: 1px solid #D1DBE4;
	    border-bottom: none;
	}
	.sub-section3 {
    border-top: none;
    border-bottom: none;
	}
	.myproduct{
		 border-radius: 20px; 
	}

	.pointer{
		cursor:pointer;
	}
	.width100{
		width:100%;
	}

	.top-radius{
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    max-height: 180px;
    height:180px;
	}
	.product-title{
		min-height: 50px;
	}
	.product-tag{		
    position: relative;    
    font-size: 0.8em;
    display:block;
    text-align:right;
    top: 30px;
    right: 10px;
	}
	.product-tag-inside{
		background: #63bf34;
    color: white;
    padding: 5px 15px; 
    border-radius: 15px;       
	}
	a{
		display:block;
		text-align:center;
		color:white;
	}

  .seller-contact-panel:hover{
		background:#4181b6;
  }

  .gallery-banner2 {
	    margin-bottom: 70px;
	    background-image: url(/static/img/gallery-banner.55d5a77.png);
	    border-radius: 60px; 
	    background-size: cover;
	    background-position-y: center;
	    -webkit-transform: skew(-3deg);
	    -moz-transform: skew(-3deg);
	    -o-transform: skew(-3deg);
	    margin-left: -10px;
	}

	.banner .gradient-back2 {
	  border-radius: 60px;
   	background-color: #00000054;
    background-image:none;
    height: 100%;
    padding-top: 150px;
    background-repeat: no-repeat;
	} 

	.sign_letter2{
		color:white !important;
	}

	.gallery-banner .gradient-back2 .banner-content p {
	  color:white !important;
	}

	.banner .gradient-back {
	  background-image: none;
	  background: #00000075;
	  border-radius: 60px; 

	}

	.banner {
	    border-radius: 60px; 
	    background-size: cover;
	    background-position-y: center;
	    -webkit-transform: skew(-3deg);
	    -moz-transform: skew(-3deg);
	    -o-transform: skew(-3deg);
	    margin-top:15px;
	}

</style>
