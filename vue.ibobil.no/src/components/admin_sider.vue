<template>
  	<div class="col-md-10 col-sm-12 sider-wrapper">
		<div class="title-bar row">
			<span class="font-25">Sider</span>
			<avatar></avatar>
		</div>
		<div class="table">
			<div class="table-header col-lg-12 col-md-12">
				<div class="col-md-4 col-sm-12">
					<span>Tittel</span>
				</div>
				<div class="col-md-2 col-sm-12">
					<span>Forfatter</span>
				</div>
				<div class="col-md-2 col-sm-12">
					<span>Publisert</span>
				</div>
				<div class="col-md-2 col-sm-12">
					<span>Sist oppdatert</span>
				</div>
				<div class="col-md-2 col-sm-12">
					<span>Status</span>
				</div>
			</div>
			<div class="table-row col-lg-12 col-md-12">
				<div class="cell col-md-4 col-sm-12">
					<span>Hjem</span>
					<ul class="edit">
						<li @click="editHome()" class="pointer">Rediger</li>
						<!-- <li>Slett</li> -->
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Forfatter: </span>
					<span>Jan-Børre H.</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Publisert </span>
					<span>25.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Sist oppdatert: </span>
					<span>28.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<div class="status">PUBLISERT</div>
				</div>
			</div>
			<div class="table-row col-lg-12 col-md-12">
				<div class="cell col-md-4 col-sm-12">
					<span>Merker</span>
					<ul class="edit">
						<li @click="editBrands()" class="pointer">Rediger</li>
						<!-- <li>Slett</li> -->
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Forfatter: </span>
					<span>Jan-Børre H.</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Publisert </span>
					<span>25.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Sist oppdatert: </span>
					<span>28.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<div class="status">PUBLISERT</div>
				</div>
			</div>
			
			<div class="table-row col-lg-12 col-md-12">
				<div class="cell col-md-4 col-sm-12">
					<span>Finansiering</span>
					<ul class="edit">
						<li @click="editFinance()" class="pointer">Rediger</li>
						<!-- <li>Slett</li> -->
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Forfatter: </span>
					<span>Jan-Børre H.</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Publisert </span>
					<span>25.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Sist oppdatert: </span>
					<span>28.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<div class="status">PUBLISERT</div>
				</div>
			</div>
			<div class="table-row col-lg-12 col-md-12">
				<div class="cell col-md-4 col-sm-12">
					<span>Bobil</span>
					<ul class="edit">
						<li @click="editrv()" class="pointer">Rediger</li>
						<!-- <li>Slett</li> -->
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Forfatter: </span>
					<span>Jan-Børre H.</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Publisert </span>
					<span>25.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Sist oppdatert: </span>
					<span>28.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<div class="status">PUBLISERT</div>
				</div>
			</div>
			<div class="table-row col-lg-12 col-md-12">
				<div class="cell col-md-4 col-sm-12">
					<span>Campingvogn</span>
					<ul class="edit">
						<li @click="editcaravan()" class="pointer">Rediger</li>
						<!-- <li>Slett</li> -->
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Forfatter: </span>
					<span>Jan-Børre H.</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Publisert </span>
					<span>25.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Sist oppdatert: </span>
					<span>28.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<div class="status">PUBLISERT</div>
				</div>
			</div>
			<div class="table-row col-lg-12 col-md-12">
				<div class="cell col-md-4 col-sm-12">
					<span>Om oss</span>
					<ul class="edit">
						<li @click="editAbout()" class="pointer">Rediger</li>
						<!-- <li>Slett</li> -->
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Forfatter: </span>
					<span>Jan-Børre H.</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Publisert </span>
					<span>25.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Sist oppdatert: </span>
					<span>28.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<div class="status">PUBLISERT</div>
				</div>
			</div>
			<div class="table-row col-lg-12 col-md-12">
				<div class="cell col-md-4 col-sm-12">
					<span>Top Images and text</span>
					<ul class="edit">
						<li @click="editTop()" class="pointer">Rediger</li>
						<!-- <li>Slett</li> -->
					</ul>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Forfatter: </span>
					<span>Jan-Børre H.</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Publisert </span>
					<span>25.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<span class="field">Sist oppdatert: </span>
					<span>28.01.18</span>
				</div>
				<div class="cell col-md-2 col-sm-12">
					<div class="status">PUBLISERT</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
// import {mapGetters} from 'vuex';
import avatar from './avatar'

export default {
		components: {
        avatar
    },
    data(){
			return{}
		},
		methods: {
			
			editBrands() {  
				console.log('editing brand');
				// this.$store.dispatch('getProductData', id);
				// setTimeout(function(){ 
					this.$router.push({path :'/edit_brands'});
				// }, 300);
			},	
			editHome() {  
				console.log('editing home');
				// this.$store.dispatch('getProductData', id);
				// setTimeout(function(){ 
					this.$router.push({path :'/edit_home'});
				// }, 300);
			},
			editAbout() {  
				console.log('editing about');
				// this.$store.dispatch('getProductData', id);
				// setTimeout(function(){ 
					this.$router.push({path :'/edit_about'});
				// }, 300);
			},
			editFinance() {  
				console.log('editing finance');
				// this.$store.dispatch('getProductData', id);
				// setTimeout(function(){ 
					this.$router.push({path :'/edit_finance'});
				// }, 300);
			},
			editrv() {  
				console.log('editing rv');
				// this.$store.dispatch('getProductData', id);
				// setTimeout(function(){ 
					this.$router.push({path :'/edit_rv'});
				// }, 300);
			},
			editcaravan() {  
				console.log('editing caravan');
				// this.$store.dispatch('getProductData', id);
				// setTimeout(function(){ 
					this.$router.push({path :'/edit_caravan'});
				// }, 300);
			},
			editTop() {  
				console.log('editing brand');
				// this.$store.dispatch('getProductData', id);
				// setTimeout(function(){ 
					this.$router.push({path :'/edit_top'});
				// }, 300);
			},		
		},
		created(){
        this.$store.state.current_path = this.$route.path;			
		}
}
	
</script>

<style scoped>
	.pointer{
		cursor:pointer;
		color:#3D8FCB !important;
	}
</style>
