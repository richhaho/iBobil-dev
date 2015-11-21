import Vue from 'vue';

import Vuex from 'vuex';
Vue.use(Vuex);
import axios from 'axios';


import VueResource from 'vue-resource'
Vue.use(VueResource);

// Vue.http.options.root = 'http://localhost:3000/';
var rooturl = 'http://localhost:8000/api/auth/';
var rooturl = 'http://backend-ibobil.fantasylab.no:8000/api/auth/';
Vue.http.options.root = rooturl;

export default {

    getAll({commit, state, rootState}) {
        // console.log("eeeeeeee");
        return Vue.http.get('getAll').then( (response) => {
            if (response.status === 200) {
                // console.log(response.body);
                commit('setAllProducts', response.body.entries);
                return response.body;
            }
        }, (err) => {
            console.log("error : " + err);
        });
    },

    getBrandData({commit, state, rootState}, brandId) {
        return Vue.http.get('viewOne/' + brandId).then( (response) => {
            if (response.status === 200) {
                // console.log(response.data);
                commit('setBrandData', response.data);
                return response.data;
            }
        }, (err) => {
            console.log("error : " + err);
        });
    },

    getCaravanList({commit, state, rootState}) {
        // console.log("eeeeeeee");
        return Vue.http.get('getCaravan').then( (response) => {
            if (response.status === 200) {
                // console.log(response.body);
                commit('setCaravanList', response.body.entries);
                return response.body;
	        }
        }, (err) => {
        	console.log("error : " + err);
        });
    },

    getCaravanData({commit, state, rootState}, caravanId) {
        return Vue.http.get('viewOne/' + caravanId).then( (response) => {
            if (response.status === 200) {
                // console.log(response.data);
                commit('setCaravanData', response.data);
                return response.data;
	        }
        }, (err) => {
        	console.log("error : " + err);
        });
    },

    deleteOne({commit, state, rootState}, id) {
        var token = localStorage.getItem('token');

        return axios.get(rooturl+'deleteOne/'+id+'?token='+token)
            .then(function (response) {
                return true;
            })
            .catch(function (error) {
                console.log(error.response.data.message);              

                return false;
            });
    },

    getRVList({commit, state, rootState}) {
        return Vue.http.get('getRV').then( (response) => {
            if (response.status === 200) {
                commit('setRVList', response.body.entries);
                return response.body;
	        }
        }, (err) => {
        	console.log("error : " + err);
        });
    },

    getRV({commit, state, rootState}) {
        return axios.get(rooturl+'getRV')
            .then(function (response) {
                return response.data.products;
            })
            .catch(function (error) {
                console.log(error.response.data.message);              

                return false;
            });
    },
    getCaravan({commit, state, rootState}) {
        return axios.get(rooturl+'getCaravan')
            .then(function (response) {
                return response.data.products;
            })
            .catch(function (error) {
                console.log(error.response.data.message);              

                return false;
            });
    },

    getRVData({commit, state, rootState}, RVId) {
        return Vue.http.get('viewOne/' + RVId).then( (response) => {
            if (response.status === 200) {
                // console.log(response.data);
                commit('setRVData', response.data);
                return response.data;
	        }
        }, (err) => {
        	console.log("error : " + err);
        });
    },
    getLogin({commit, state, rootState}, object) {
        return axios.post(rooturl+'login', {
                email: object.email,
                password: object.password
            })
        .then( (response) => {

                commit('setToken', response.data.token);
                commit('setInfo', response.data.info);

                var token= response.data.token;
                var info = response.data.user;
                localStorage.setItem('token', token);
                localStorage.setItem('user-info', JSON.stringify(info));

                commit('setLoginsuccessMessage', response.data.message);
                commit('setLoginshowSuccess', true);

                // self.email = '';
                // self.password = '';
                // self.successMessage = response.data.message;
                // self.showSuccess = true;

                return true;
        })
        .catch(function (error) {
            var message = error.response.data.message;
            commit('setLogininvalidError', message);
            commit('setLoginshowInvalidError', true);
            return false;

            // self.invalidError  = message;                                       
            // self.showInvalidError  = true;
        });
    },
    getLogout({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');
        return axios.post(rooturl+'logout?token='+token)
        .then( (response) => {
                var message = response.data.message;
                localStorage.removeItem('token');
                localStorage.removeItem('user-info');            

                return true;
        })
        .catch(function (error) {
            console.log(error);
            console.log(error.response);
            localStorage.removeItem('token');
            localStorage.removeItem('user-info');
            return false;

            // self.invalidError  = message;                                       
            // self.showInvalidError  = true;
        });
    },
    update_profile({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_profile?token='+token, {
            name: object.name,
            email: object.email,
            password: object.password ? object.password : null,
            password_confirmation: object.password_confirmation ? object.password_confirmation : null,
            image:(object.image == object.default_image) ? null : object.image
          })
        .then( (response) => {

                var info = response.data.user;
                localStorage.setItem('user-info', JSON.stringify(info));   

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            return {message:error.response.data.message,success:false};
        });
    },

    getProductData({commit, state, rootState}, id) {
        return Vue.http.get('viewOne/' + id).then( (response) => {
            if (response.status === 200) {
                commit('setProductData', response.data);
                return response.data;
            }
        }, (err) => {
            console.log("error : " + err);
        });
    },

    update_product({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_product/'+object.id+'?token='+token, {
            name: object.name ? object.name : null,
            meta_title: object.meta_title ? object.meta_title : null,
            meta_description: object.meta_description ? object.meta_description : null,
            video: object.video ? object.video : null
          })
        .then( (response) => {
                commit('setProductData', response.data.product);

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            return {message:error.response.data.message,success:false};
        });
    },

    remove_image({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'remove_image/'+object.id+'?token='+token, {
            url: object.url           
          })
        .then( (response) => {
                commit('setProductData', response.data.product);

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            return {message:error.response.data.message,success:false};
        });
    },

    get_rooturl({commit, state, rootState}, object) {
        return rooturl;
    },
}
