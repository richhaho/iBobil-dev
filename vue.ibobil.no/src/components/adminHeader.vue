<template>
    <div class="col-md-2 col-sm-12 admin-header sticky-sidebar">
        <div class="col-md-12 col-sm-6 col-xs-6">
            <div class="logo-wrapper"><router-link to="/" class="logo"><img src="../../img/logo.png" alt=""></router-link></div>
        </div>
        <div id="admin-nav" class="col-md-12">
            <div class="nav-wrapper">
                <li class="active font-12" v-for="nav in navs">
                    <router-link 
                        :to="nav.url" 
                        :class="{'active-link':(nav.url == '/admin_sider' && (current_path == '/edit_home' || current_path == '/edit_brands' || current_path == '/edit_about' || current_path == '/edit_finance' || current_path == '/edit_rv' || current_path == '/edit_caravan' || current_path == '/edit_top'))}"
                    >
                        {{nav.title}}
                    </router-link></li>
            </div>
        </div>
        <div class="col-md-12 copyright">
            <p>© 2018 ICARAVAN AS.</p>
            <p>UI/UX DESIGN & WEBUTVIKLING: <span class="blue-text">FANTASYLAB.</span></p>
        </div>
        <div class="col-sm-6 col-xs-6">
            <div class="admin-menu-btn font-20">
                <span>MENY</span>
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </div>
            <div class="admin-menu-btn hidden font-20">
                <span>LUKK</span>
                <i class="fa fa-close"></i>
            </div>
        </div>
        <div class="admin-mobile-menu hidden">
            <div class="nav-wrapper">
                <li class="active font-22" v-for="nav in navs"><router-link v-bind:to="nav.url">{{nav.title}}</router-link></li>
                <button class="blue-btn shadowed my-btn login-btn font-20">FÅ ET TILBUD</button>
            </div>
        </div>
  	</div>
      
</template>

<script>
$(document).ready(function() {
    $(".admin-menu-btn").click(function(){
        $(".admin-menu-btn").toggleClass("hidden");
        $(".admin-mobile-menu").toggleClass("hidden");
        $("body").toggleClass("fixed-screen");
        $(".sider-wrapper").toggleClass("hidden");
    });
});
import {mapGetters} from 'vuex';

export default {
    computed: {
        ...mapGetters({
            current_path: 'current_path',
        })
    },
    data(){
        return{
            navs: [
                    { title:'Sider', url: '/admin_sider'},
                    { title:'Bobiler', url: '/admin_bobiler'},
                    { title:'Campingvogn', url: '/admin_campingvogn'},
                    { title:'Footer', url: '/edit_footer'},
                    { title:'Innstillinger', url: '/admin_innstillinger'},
                    { title:'Logg ut', url: '/logout'}
                ],
            'default_image':require('../../img/icons/avarta1.png'),

        }
    },
    created(){
        var token = localStorage.getItem('token');
        if(!token)
        {
            this.$router.replace('/login');            
        }
        var info = localStorage.getItem('user-info');
        if(info){
            info =JSON.parse(info);
            this.name = info.name;
            this.email = info.email;
            if(info.image){
                this.default_image = info.image;
            }
          }
        this.$store.state.current_path = this.$route.path;
    }
}
</script>

<style>
    .router-link-exact-active{
        /*border-bottom:3px solid #3A8ECA;*/
        color:#3A8ECA !important;        
    }
    .active-link{
        color:#3A8ECA !important;     
    }
    @media (min-width: 768px){
        .sticky-sidebar {
            position:fixed;
            max-width: 20%;
        }
    }

    a:hover, a:focus {
        color: #3A8ECA !important;
        text-decoration: none;
    }
</style>

