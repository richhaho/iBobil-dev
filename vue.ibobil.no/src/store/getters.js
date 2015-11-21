export default {
    allProducts(state) {
        return state.caravanList;
    },
    allBrands(state) {
        return state.brandList;
    },
    brandData(state) {
        return state.brandData;
    },
    caravanList(state) {
        return state.caravanList;
    },
    caravanId(state) {
        return state.caravanId;
    },
    caravanData(state) {
        return state.caravanData;
    },
    RVList(state) {
        return state.RVList;
    },
    RVId(state) {
        return state.RVId;
    },
    RVData(state) {
        return state.RVData;
    },
    ProductData(state) {
        return state.ProductData;
    },
    current_path(state) {
        return state.current_path;
    },
    caravanDataTitle(state) {
        return state.caravanData.meta_title  ? state.caravanData.meta_title: '';
    },
    caravanDataDescription(state) {
        return state.caravanData.meta_description  ? state.caravanData.meta_description : '';
    },
    brandDataTitle(state) {
        return state.brandData.meta_title  ? state.brandData.meta_title: '';
    },
    brandDataDescription(state) {
        return state.brandData.meta_description  ? state.brandData.meta_description : '';
    },
    RVDataTitle(state) {
        return state.RVData.meta_title ? state.RVData.meta_title : '';
    },
    RVDataDescription(state) {
        return state.RVData.meta_description ? state.RVData.meta_description : '';
    },

    //Token
    Token(state) {
        return state.token;
    },
    Info(state) {
        return state.info;
    },

    // Login
    Loginemail(state) {
        return state.loginemail;
    },
    Loginpassword(state) {
        return state.loginpassword;
    },
    Loginerror(state) {
        return state.loginerror;
    },
    LogininvalidError(state) {
        return state.logininvalidError;
    },
    LoginshowError(state) {
        return state.loginshowError;
    },
    LoginshowInvalidError(state) {
        return state.loginshowInvalidError;
    },
    LoginshowSuccess(state) {
        return state.loginshowSuccess;
    },
    LoginsuccessMessage(state) {
        return state.loginsuccessMessage;
    },


    // loggedInUser(state) {
    //     try {
    //         return JSON.parse(state.loggedInUser);
    //     } catch (e) {
    //         return state.loggedInUser;
    //     }        
    // },
 
}
