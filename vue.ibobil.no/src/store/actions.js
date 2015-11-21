import Vue from 'vue';

import Vuex from 'vuex';
Vue.use(Vuex);
import axios from 'axios';


import VueResource from 'vue-resource'
Vue.use(VueResource);

// Vue.http.options.root = 'http://localhost:3000/';
// var rooturl = 'http://localhost:8000/api/auth/';
// var rooturl = 'http://backend-ibobil.fantasylab.no:8000/api/auth/';
var rooturl = 'https://backend-ibobil-prod.fantasylab.no/api/auth/';

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

    getAllBrand({commit, state, rootState}) {
        // console.log("eeeeeeee");
        return Vue.http.get('getAllBrand').then( (response) => {
            if (response.status === 200) {
                // console.log(response.body);
                commit('setAllBrands', response.body.brands);
                return response.body;
            }
        }, (err) => {
            console.log("error : " + err);
        });
    },

    getBrandData({commit, state, rootState}, brandId) {
        return Vue.http.get('brandOne/' + brandId).then( (response) => {
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
                commit('setCaravanData', response.data.product);
                if(response.data.additional){
                    commit('setAdditionalInfo', JSON.parse(response.data.additional));
                }
                return response.data;
	        }
        }, (err) => {
        	console.log("error : " + err);
        });
    },
    
    getRVData({commit, state, rootState}, RVId) {
        return Vue.http.get('viewOne/' + RVId).then( (response) => {
            if (response.status === 200) {
                // console.log(response.data);
                commit('setRVData', response.data.product);                
                if(response.data.additional){                
                    commit('setAdditionalInfo', JSON.parse(response.data.additional));
                }
                
                return response.data;
            }
        }, (err) => {
            console.log("error : " + err);
        });
    },

    deactivated({commit, state, rootState}, id) {
        var token = localStorage.getItem('token');

        return axios.get(rooturl+'deactivated/'+id+'?token='+token)
            .then(function (response) {
                return true;
            })
            .catch(function (error) {
                console.log(error.response.data.message);              

                return false;
            });
    },

    activated({commit, state, rootState}, id) {
        var token = localStorage.getItem('token');

        return axios.get(rooturl+'activated/'+id+'?token='+token)
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

                return {message:response.data.message,success:true,code:response.data.code};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },

    getProductData({commit, state, rootState}, id) {
        return Vue.http.get('viewOne2/' + id).then( (response) => {
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
            video: object.video ? object.video : null,
            vin: object.vin ? object.vin : null
          })
        .then( (response) => {
                commit('setProductData', response.data.product);

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
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

    update_brands({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_brands?token='+token, {
            brands: object.brands,
            meta_title:object.meta_title,         
            meta_description:object.meta_description,             
          })
        .then( (response) => {

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },

    update_home({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_home?token='+token, {
            weekly_motorhome:object.weekly_motorhome,
            new_motorhome:object.new_motorhome,
            used_motorhome:object.used_motorhome,
            sale_motorhome:object.sale_motorhome,         
            meta_title:object.meta_title,         
            meta_description:object.meta_description,         
          })
        .then( (response) => {
                console.log('coming');
                return {message:response.data.message,success:true};               
        })
        .catch(function (error,response) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },
    update_about({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_about?token='+token, {
            top_banner_image:object.top_banner_image,
            top_banner_title:object.top_banner_title,
            article_1:object.article_1,
            article_2:object.article_2,         
            article_3:object.article_3,         
            article_4:object.article_4,         
            side_images:object.side_images,         
            slider_images:object.slider_images,         
            middle_banner_image:object.middle_banner_image,         
            middle_slider_images:object.middle_slider_images,         
            address:object.address,         
            email:object.email,         
            phone:object.phone,
            meta_title:object.meta_title,         
            meta_description:object.meta_description,         
          })
        .then( (response) => {

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },

    update_finance({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_finance?token='+token, {            
            meta_title:object.meta_title,         
            meta_description:object.meta_description,         
          })
        .then( (response) => {

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },

    update_rv({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_rv?token='+token, {            
            meta_title:object.meta_title,         
            meta_description:object.meta_description,         
          })
        .then( (response) => {

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },

    update_caravan({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_caravan?token='+token, {            
            meta_title:object.meta_title,         
            meta_description:object.meta_description,         
          })
        .then( (response) => {

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },

    update_footer({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_footer?token='+token, {
            footer_content:object.footer_content,                 
            address:object.address,         
            email:object.email,         
            phone:object.phone,         
            facebook_link:object.facebook_link,         
            twitter_link:object.twitter_link,         
            google_link:object.google_link,         
            pinterest_link:object.pinterest_link,         
            youtube_link:object.youtube_link,         
          })
        .then( (response) => {

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },

    update_top({commit, state, rootState}, object) {
        var token = localStorage.getItem('token');

        return axios.post(rooturl+'update_top?token='+token, {
            home_top_headline:object.home_top_headline,
            home_top_sub_headline:object.home_top_sub_headline,
            home_top_text:object.home_top_text,
            home_top_image:object.home_top_image,
            brand_top_headline:object.brand_top_headline,
            brand_top_sub_headline:object.brand_top_sub_headline,
            // brand_top_text:object.brand_top_text,
            brand_top_image:object.brand_top_image        
          })
        .then( (response) => {

                return {message:response.data.message,success:true};               
        })
        .catch(function (error) {
            if(error.response.data.code == 401){
                return {message:'Unauthenticated',success:false};
            }
            return {message:error.response.data.message,success:false};
        });
    },
    
    get_home({commit, state, rootState}, object) {

        return axios.post(rooturl+'get_home')
        .then( (response) => {

            return {message:response.data.message,success:true,infos:response.data.infos};               
        })
        .catch(function (error) {            
            return {message:error.response.data.message,success:false};
        });
    },
    getAdditionalData({commit, state, rootState}, caravanId) {
        return Vue.http.get('viewOneMoreInfo/' + caravanId).then( (response) => {            
            if (response.status === 200) {
                return {data:response.data,success:true};
            }
            return {success:false};           

        }, (err) => {            
            return {success:false};            
        });
    },
    finance({commit, state, rootState}, object) {        
        return axios.post(rooturl+'finance', {
            caravan:object.caravan,
            ibobil:object.ibobil,
            price:object.price,
            equity:object.equity,
            year:object.year,       
          })
        .then( (response) => {
            console.log(response);
            // commit('setAdditionalInfo', JSON.parse(response.data.additional));

            return {data:JSON.parse(response.data.additional),success:true};               
        })
        .catch(function (error) {
            return {success:false};
        });
    },
    loan({commit, state, rootState}, object) {        
        return axios.post(rooturl+'loan', {
            id:object.id,
            equity:object.equity,
            year:object.year,
            ssn:object.ssn,
            phone:object.phone,
            email:object.email,    
          })
        .then( (response) => {
            if (response.status === 200) {
                return {data:JSON.parse(response.data),success:true}; 
            }
            return {data:JSON.parse(response.data),success:false};               
        })
        .catch(function (error) {
            return {success:false};
        });
    },

    get_rooturl({commit, state, rootState}, object) {
        return rooturl;
    },
}
