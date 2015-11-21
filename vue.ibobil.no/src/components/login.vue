<template>
  	<div id="login-wrapper">
		<div class="top-wrapper">
            <router-link to="/" class="blue-btn shadowed my-btn">SE ALLE BOBILER</router-link>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 col-sm-12">
                    <div class="login-form">
                        <div class="logo-wrapper"><router-link to="/" class="logo"><img src="../../img/logo.png" alt=""></router-link></div>
                        <form v-on:submit.prevent="login()" >
                            <div v-if="showSuccess" class="green">{{ successMessage }}</div>
                            <div v-if="showError" class="red">{{ error }}</div>
                            <div v-if="showInvalidError" class="red">{{ invalidError }}</div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-at"></i></span>
                                <input id="email" type="text" class="form-control" name="email" placeholder="E-post" v-model="email">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Passord" v-model="password">
                            </div>
                            <button class="blue-btn shadowed my-btn full-width" :disabled="disabled" v-html="buttonText"></button>
                        </form>
                        <p class="copyright font-12">© iCaravan AS 2018. Med enerett. Webdesign & Webutvikling: FantasyLab.</p>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
  	</div>
</template>

<script>
import {mapGetters} from 'vuex';
import  { store }  from '../store/';
import axios from 'axios';

export default {
    name: 'Login',

    data(){
        return{
            'email' : '',
            'password' : '',
            disabled:false,
            buttonText:'LOG IN'
            // 'error' : 'Please enter your email and password before clicking the login button',
            // 'invalidError' : 'These credentials do not match! Please try again!',
            // 'showError': false,
            // 'showInvalidError': false,
            // 'showSuccess':false,
            // 'successMessage':'',
        }
	},
    computed: {
        ...mapGetters({
            error:'Loginerror',
            invalidError:'LogininvalidError',
            showError:'LoginshowError',
            showInvalidError:'LoginshowInvalidError',
            showSuccess:'LoginshowSuccess',
            successMessage:'LoginsuccessMessage',
        })
    },
    methods: {
        login()
        {
            var self = this;

            store.commit('setLoginshowInvalidError', false);
            store.commit('setLoginshowError', false);

            if(this.email == '' || this.password == ''){
                store.commit('setLoginshowError', true);
                // this.$store.state.loginshowError = true;
                return;
            }

            this.disabled=true;
            this.buttonText='<i class="fa fa-spinner fa-spin"></i> LOGGING IN';

            this.$store.dispatch('getLogin', {email:this.email,password:this.password})
                .then((data)=>{
                    console.log(data);
                    if(data){
                        this.email = '';
                        this.password = '';                    
                        self.disabled = false;                    
                        store.commit('setLoginsuccessMessage', '');
                        store.commit('setLoginshowSuccess', false);
                        self.$router.replace('/admin_sider'); 

                    } else{

                    }        
                })
                .catch((error)=> {
                    console.log('error:',error);           
                });
            
        }            
    },
    beforeCreate(){
        var token = localStorage.getItem('token');
        if(token){
            this.$router.replace('/admin_sider');
        }
    }
}
	
</script>

<style scoped>
    .red{
        color:red;
    }
    .green{
        color:green;
    }
</style>
