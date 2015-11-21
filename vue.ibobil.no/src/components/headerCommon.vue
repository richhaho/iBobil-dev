<template>
    <header>
        <div class="nav-bar">
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <div class="logo-wrapper"><router-link to="/" class="logo"><img src="../../img/logo.png" alt=""></router-link></div>
                </div>
                <div id="nav" class="col-md-8 col-sm-12">
                    <div class="nav-wrapper">
                        <template v-for="nav in navs">
                            <template v-if="nav.title == 'KUNDESERVICE'">
                                <li class="active font-12"><a :href="nav.url" target="_blank">{{nav.title}}</a></li>
                            </template>
                            <template v-else>
                                <router-link tag="li" :to="nav.url" class="active font-12"><a>{{nav.title}}</a></router-link>                               
                            </template>
                        </template>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <div :class="{'mobile-menu-btn':true,'hide':!hide, 'font-20':true}" @click="closeMenu">
                        <span>MENY</span>
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </div>
                    <div :class="{'mobile-menu-btn':true, 'hide':hide, 'font-20':true}" @click="closeMenu">
                        <span>LUKK</span>
                        <i class="fa fa-close"></i>
                    </div>
                    <a href="https://icaravan.freshsales.io/web_forms/dd43eaec6c0a3de5b4c2ae2cdb33759986c37f3ff9081b128baae352ba6014f7/form.html"  class="blue-btn shadowed my-btn login-btn font-12 my-btn-2" >FÅ ET TILBUD</a>
                </div>
            </div>
        </div>
        <div class="market-info-bar">
            <div class="row full-width">
                <div class="col-md-1"></div>
                <div class="col-md-10 col-sm-12">
                    <div class="market-info-wrapper row">
                        <li class="market-info" v-for="info in info">
                            <img src="../../img/icons/check-icon.png" alt="">
                            <span class="font-12">{{info}}</span>
                        </li>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div :class="{'mobile-menu':true,'hide':hide}">
            <div class="nav-wrapper">
                <li class="active font-22" v-for="nav in navs" @click="closeMenu"><router-link v-bind:to="nav.url">{{nav.title}}</router-link></li>
                <a href="https://icaravan.freshsales.io/web_forms/dd43eaec6c0a3de5b4c2ae2cdb33759986c37f3ff9081b128baae352ba6014f7/form.html" class="blue-btn shadowed my-btn login-btn font-20 my-btn-2">FÅ ET TILBUD</a>
            </div>
        </div>
    </header>
</template>

<script>
    $(document).ready(function() {
        $(".mobile-menu-btn").click(function(){
            $(".mobile-menu-btn").toggleClass("hidden");
            $(".mobile-menu").toggleClass("hidden");
            $("body").toggleClass("fixed-screen");
        });
    });
    export default {
        data(){
            return{
                hide:true,
                navs: [
                        { title:'HJEM', url: '/'},
                        { title:'MERKER', url: '/merker'},
                        { title:'CAMPINGVOGN', url: '/campingvogn'},
                        { title:'BOBIL', url: '/bobil'},
                        { title:'FINANSIERING', url: '/finansiering'},
                        { title:'OM OSS', url: '/om-oss'},
                        { title:'KUNDESERVICE', url: 'https://caravan.freshdesk.com/support/home'}
                    ],
                info:['Verkstedgodkjent', 'Opptil 5 årsgaranti ', 'Nye og brukte enehter', 'Gode finansieringsmuligheter ', 'Vi er her etter handelen']
            }
        },

        methods: {
            toStep2(){
                this.$router.push({path :'/step2'});
            },
            closeMenu(){
                this.hide = !this.hide;
            }
        },
        created(){
        }


    }
</script>

<style scoped>
    .hide{
        display:none;
    }

    .my-btn-2:hover, .my-btn-2:focus {
        color: white !important;
        text-decoration: none;
    }
</style>

