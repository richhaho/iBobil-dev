<template>
    <div>
        <!-- <div class="brand-section">
            <div class="container">
                <div class="brand-wrapper">
                    <div class="brand">
                        <div v-for="brand in brands" style="margin-right:30px">
                            <img :src="brand.logo" alt="" @click="brandclick(brand.id)" class="pointer width-100">
                        </div>              
                    </div>
                </div>
            </div>
        </div> -->

        <div class="brand-section">
            <div class="container">
                <div class="brand-wrapper">
                    <div class="brand">
                        <div>
                            <img src="../../img/icons/brand1.png" alt="">
                        </div>
                        <div>
                            <img src="../../img/icons/brand2.png" alt="">
                        </div>
                        <div>
                            <img src="../../img/icons/brand3.png" alt="">
                        </div>
                        <div>
                            <img src="../../img/icons/brand4.png" alt="">
                        </div>
                        <div>
                            <img src="../../img/icons/brand5.png" alt="">
                        </div>
                        <div>
                            <img src="../../img/icons/brand6.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="wrapper footer-content">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-10">
                        <div class="social-panel">
                            <router-link to="#" class="logo"><img src="../../img/logo.png" alt=""></router-link>
                            <p  class="font-12" v-if="footer_content" v-html="footer_content"></p>
                            <p class="font-12" v-else>iCaraven er en familiebedrift som brenner for fritid, ferie og campingliv. Siden starten i 2010, har vi opplevd solid vekst og god mottakelse i markedet.</p>
                            <div class="media-icon-wrapper">
                                <a :href="facebook_link"  v-if="facebook_link" target="_blank"><i class="fa fa-facebook my-color-bot" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/iCaravan" v-else target="_blank"><i class="fa fa-facebook my-color-bot" aria-hidden="true"></i></a>
                                <a :href="twitter_link"  v-if="twitter_link" target="_blank"><i class="fa fa-twitter my-color-bot" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/icaravan" v-else target="_blank"><i class="fa fa-twitter my-color-bot" aria-hidden="true"></i></a>
                                <a :href="google_link"  v-if="google_link" target="_blank"><i class="fa fa-google-plus my-color-bot" aria-hidden="true"></i></a>
                                <a href="https://plus.google.com/+CaravanNo" v-else target="_blank"><i class="fa fa-google-plus my-color-bot" aria-hidden="true"></i></a>
                                <a :href="youtube_link"  v-if="youtube_link" target="_blank"><i class="fa fa-youtube-play my-color-bot" aria-hidden="true"></i></a>
                                <a href="https://www.youtube.com/user/iCaravanas/" v-else target="_blank"><i class="fa fa-youtube-play my-color-bot" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12 external-links">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 column" v-for="item in external">
                                <div>
                                    <p class="title font-15">{{item.title}}</p>
                                    <li v-for="list in item.list" class="font-12 item"><a :href="list.url" target="_blank">{{list.text}}</a></li>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12 column">
                                <div>
                                    <p class="title font-15">MERKER</p>
                                    <li v-for="brand in brands" class="font-12 item"><a @click="brandclick(brand.slug)" class="pointer">{{brand.name}}</a></li>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12 font-12">
                                <p class="title font-15">KUNDESENTER</p>
                                <p v-if="phone"><span>Tlf:</span>{{phone}}</p>
                                <p v-else><span>Tlf:</span> +47 95 43 43 56</p>
                                <p v-if="email"><span>E-post:</span>{{email}}</p>
                                <p v-else><span>E-post:</span> salg@icaravan.no</p>
                                <template v-if="address">
                                    <p>{{address}}</p>
                                </template>
                                <template v-else>
                                    <p><span>iCaravan AS</span> <br>Strandvegen 144B Postboks 2077, Postens bedriftadresse 9266 / TROMSØ</p>
                                    <p>Orgnr: 996072991</p>
                                    <p>Norway</p>
                                </template>
                                
                                <a v-if="google_link" :href="google_link" style="color:#2D9EDC" target="_blank">Google+</a>
                                <a v-else href="https://plus.google.com/+CaravanNo" style="color:#2D9EDC" target="_blank">Google+</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="font-12">© iCaravan AS 2018. Med enerett.<br>  Webdesign & Webutvikling: FantasyLab.</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-icon-wrapper">
                                <img src="../../img/icons/footer-icon1.png" alt="">
                                <img src="../../img/icons/footer-icon2.png" alt="">
                                <img src="../../img/icons/footer-icon3.png" alt="">
                                <img src="../../img/icons/footer-icon4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>

    export default {
        
        data(){
            return{
                brands:[],
                external: [
                    {
                        title: 'ICARAVANGRUPPEN',
                        list: [
                            {
                                text: 'IBobil AS',
                                url: 'https://caravan.no/Kategori/459/IBOBIL-AS'
                            },
                            {
                                text: 'iCaravan AS',
                                url: 'https://caravan.no/Kategori/460/ICARAVAN-AS'
                            },
                            {
                                text: 'iBobilverksted AS',
                                url: 'https://caravan.no/Kategori/461/IBOBILVERKSTED-AS'
                            },
                            {
                                text: 'iCaravan Alta AS',
                                url: 'https://caravan.no/Kategori/462/ICARAVAN-ALTA-AS'
                            },
                            {
                                text: 'Klikk & Hent Oslo',
                                url: 'https://caravan.no/Kategori/463/KLIKK-HENT-OSLO'
                            },
                            {
                                text: 'Klikk & hent Tromsø',
                                url: 'https://caravan.no/Kategori/465/KLIKK-HENT-TROMS%C3%98'
                            },
                            {
                                text: 'iCaravan Proff B2B',
                                url: 'https://caravan.no/Kategori/466/ICARAVAN-PROFF-B2B'
                            },
                            {
                                text: 'Affiliatebutikk',
                                url: 'https://caravan.no/Kategori/467/AFFILATEBUTIKK'
                            }
                        ]
                    },
                    {
                        title: 'IBOBIL',
                        list: [
                            {
                                text: 'Hjem',
                                url: '/'
                            },
                            {
                                text: 'Merker',
                                url: '/merker'
                            },
                            {
                                text: 'Campingvogn',
                                url: '/campingvogn'
                            },
                            {
                                text: 'Bobil',
                                url: '/bobil'
                            },
                            {
                                text: 'Om oss',
                                url: '/om-oss'
                            },
                            {
                                text: 'Kunderservice',
                                url: 'https://caravan.freshdesk.com/support/home'
                            }
                        ]
                    },

                    // {
                    //     title: 'MERKER',
                    //     list: [
                    //         {
                    //             text: 'Eura Mobil',
                    //             url: ''
                    //         },
                    //         {
                    //             text: 'Challenger',
                    //             url: ''
                    //         },
                    //         {
                    //             text: 'Mobilvetta',
                    //             url: ''
                    //         },
                    //         {
                    //             text: 'Concorde',
                    //             url: ''
                    //         },
                    //         {
                    //             text: 'Caravelair',
                    //             url: ''
                    //         },
                    //         {
                    //             text: 'Isabella Camp-let',
                    //             url: ''
                    //         }
                    //     ]
                    // }
                ],
                footer_content:'',
                address:'',
                email:'',
                phone:'',
                facebook_link:'',
                twitter_link:'',
                google_link:'',
                pinterest_link:'',
                youtube_link:'',
            }
        },
        created() {
                var self=this;
                this.$store.dispatch('getAllBrand')
                      .then((data) => {
                          if(data){
                              self.brands = data.brands;                                            
                          }       
                      })
                      .catch((error)=> {
                          console.log('error:',error);           
                      }); 
                this.$store.dispatch('get_home')
                    .then((data)=>{
                        if(data){
                                // console.log(data);
                            self.infos = data.infos;                            
                            self.address = self.infos.filter((product) => {
                                                              return product.key == 'address';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'address';
                                                        })[0].value : '';
                            self.email = self.infos.filter((product) => {
                                                              return product.key == 'email';
                                                        })[0]? self.infos.filter((product) => {
                                                              return product.key == 'email';
                                                        })[0].value : '';
                            self.phone = self.infos.filter((product) => {
                                                              return product.key == 'phone';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'phone';
                                                        })[0].value : '';
                            self.facebook_link = self.infos.filter((product) => {
                                                              return product.key == 'facebook_link';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'facebook_link';
                                                        })[0].value : '';
                            self.twitter_link = self.infos.filter((product) => {
                                                              return product.key == 'twitter_link';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'twitter_link';
                                                        })[0].value : '';
                            self.google_link = self.infos.filter((product) => {
                                                              return product.key == 'google_link';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'google_link';
                                                        })[0].value : '';
                            self.pinterest_link = self.infos.filter((product) => {
                                                              return product.key == 'pinterest_link';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'pinterest_link';
                                                        })[0].value : '';
                            self.youtube_link = self.infos.filter((product) => {
                                                              return product.key == 'youtube_link';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'youtube_link';
                                                        })[0].value : '';
                            self.footer_content = self.infos.filter((product) => {
                                                              return product.key == 'footer_content';
                                                        })[0] ? self.infos.filter((product) => {
                                                              return product.key == 'footer_content';
                                                        })[0].value : '';


                                                                                            
                        } else{

                        }        
                    })
                    .catch((error)=> {
                        console.log('error:',error);           
                    }); 
                
        },
        methods:{
                
                brandclick(id){
                    this.$router.push({path :'/merker/'+id});                         
                                        
                },

        }
    }
</script>

<style scoped>
    .pointer{
        cursor:pointer;
    }
    .width-100{
        width:200px;
        height:auto;
    }

    .my-color-bot{
        color:black;
    }
    .my-color-bot:hover{
        color:#5897CF;
    }
</style>

