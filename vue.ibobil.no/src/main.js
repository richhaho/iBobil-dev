//import the vue instance
import Vue from 'vue'
//import the App component
import App from './App'
//import the vue router
import VueRouter from 'vue-router'
import Meta from 'vue-meta'

import VueClipboard from 'vue-clipboard2'
Vue.use(VueClipboard)

import  { store }  from './store/';

//tell vue to use the router
Vue.use(VueRouter)
Vue.use(Meta)
/* eslint-disable no-new */

import VueResourse from 'vue-resource';
Vue.use(VueResourse);

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);

import Home from './components/Home'
import finansiering from './components/finansiering'
import brand from './components/brand'
import brand_caravan from './components/brand_caravan'
import about from './components/about'
import login from './components/login'
import logout from './components/logout'
import caravan from './components/caravan'
import RV from './components/RV'
import single_caravan from './components/single_caravan'
import single_RV from './components/single_RV'
import single_brand from './components/single_brand'
import admin_sider from './components/admin_sider'
import admin_bobiler from './components/admin_bobiler'
import admin_campingvogn from './components/admin_campingvogn'
import rediger_side from './components/rediger_side'
import edit_products from './components/editProducts'
import edit_brands from './components/editBrands'
import edit_home from './components/editHome'
import edit_about from './components/editAbout'
import edit_finance from './components/editFinance'
import edit_rv from './components/editRV'
import edit_caravan from './components/editCaravan'
import edit_footer from './components/editFooter'
import edit_top from './components/editTop'
import admin_innstillinger from './components/admin_innstillinger'

import headerCommon from './components/headerCommon'
import footerCommon from './components/footerCommon'
import adminHeader from './components/adminHeader'
//define your routes
const routes = [
	{
		name: 'Home',
		path: '/',
		components: {
			default: Home,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'finansiering',
		path: '/finansiering',
		components: {
			default: finansiering,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'brand',
		path: '/merker',
		components: {
			default: brand,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'about',
		path: '/om-oss',
		components: {
			default: about,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'single_brand',
		path: '/single_brand',
		components: {
			default: single_brand,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'brand_caravan',
		path: '/brand_caravan',
		components: {
			default: brand_caravan,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'brand_caravan1',
		path: '/merker/:id',
		components: {
			default: brand_caravan,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'single_caravan',
		path: '/single_caravan',
		components: {
			default: single_caravan,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'single_RV',
		path: '/single_RV',
		components: {
			default: single_RV,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'login',
		path: '/login',
		component: login
	},
	{
		name: 'logout',
		path: '/logout',
		component: logout
	},
	{
		name: 'caravan',
		path: '/campingvogn',
		components: {
			default: caravan,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'caravanid',
		path: '/campingvogn/:id',
		components: {
			default: single_caravan,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'rvid',
		path: '/bobil/:id',
		components: {
			default: single_RV,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'RV',
		path: '/bobil',
		components: {
			default: RV,
			header: headerCommon,
			footer: footerCommon
		}
	},
	{
		name: 'admin_sider',
		path: '/admin_sider',
		components: {
			default: admin_sider,
			header: adminHeader
		}
	},
	{
		name: 'admin_bobiler',
		path: '/admin_bobiler',
		components: {
			default: admin_bobiler,
			header: adminHeader
		}
	},
	{
		name: 'admin_campingvogn',
		path: '/admin_campingvogn',
		components: {
			default: admin_campingvogn,
			header: adminHeader
		}
	},
	{
		name: 'rediger_side',
		path: '/rediger_side',
		components: {
			default: rediger_side,
			header: adminHeader
		}
	},
	{
		name: 'edit_products',
		path: '/edit_products',
		components: {
			default: edit_products,
			header: adminHeader
		}
	},
	{
		name: 'edit_brands',
		path: '/edit_brands',
		components: {
			default: edit_brands,
			header: adminHeader
		}
	},
	{
		name: 'edit_home',
		path: '/edit_home',
		components: {
			default: edit_home,
			header: adminHeader
		}
	},
	{
		name: 'edit_about',
		path: '/edit_about',
		components: {
			default: edit_about,
			header: adminHeader
		}
	},
	{
		name: 'edit_finance',
		path: '/edit_finance',
		components: {
			default: edit_finance,
			header: adminHeader
		}
	},
	{
		name: 'edit_rv',
		path: '/edit_rv',
		components: {
			default: edit_rv,
			header: adminHeader
		}
	},
	{
		name: 'edit_caravan',
		path: '/edit_caravan',
		components: {
			default: edit_caravan,
			header: adminHeader
		}
	},
	{
		name: 'edit_footer',
		path: '/edit_footer',
		components: {
			default: edit_footer,
			header: adminHeader
		}
	},
	{
		name: 'edit_top',
		path: '/edit_top',
		components: {
			default: edit_top,
			header: adminHeader
		}
	},
	{
		name: 'admin_innstillinger',
		path: '/admin_innstillinger',
		components: {
			default: admin_innstillinger,
			header: adminHeader
		}
	}
]

// Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
	routes, // short for routes: routes
	mode: 'history',
	// scrollBehavior (to, from, savedPosition) {
 //    return { x: 0, y: 0 }
 //  }
})

// router.beforeEach(function (to, from, next) {
//   window.scrollTo(0, 0)
//   next();
// })



//instatinat the vue instance
new Vue({
	//define the selector for the root component
	el: '#app',
	//pass the template to the root component
	template: '<App/>',
	//declare components that the root component can access
	components: { App },
	//pass in the router to the vue instance
	router,
	store
}).$mount('#app')//mount the router on the app
