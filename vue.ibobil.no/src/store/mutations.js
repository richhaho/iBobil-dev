const LOGIN = "LOGIN";
const LOGIN_SUCCESS = "LOGIN_SUCCESS";
const LOGOUT = "LOGOUT";

export default {
   

    // setProfilePolicyId(state, payload) {
    //     state.profile.policy_id = payload;
    // },    

    // setProfileHome(state, payload) {
    //     state.profile.insure_building           = payload.insure_building;
    //     state.profile.insured_building_value    = payload.insured_building_value;
    //     state.profile.insure_household          = payload.insure_household;
    //     state.profile.insured_household_value   = payload.insured_household_value;
    //     state.profile.insure_portable_items     = payload.insure_portable_items;
    //     state.profile.insured_portable_value    =  payload.insured_portable_value;
    //     state.profile.insure_domestic_employees = payload.insure_domestic_employees;
    //     state.profile.indoor_employeers_num     = payload.indoor_employeers_num;
    //     state.profile.outdoor_employeers_num    = payload.outdoor_employeers_num;
    // }, 

    setAllProducts(state, payload) {
        state.allProducts = payload;
    },
    setAllBrands(state, payload) {
        state.brandList = payload;
    },
    setBrandData(state, payload) {
        state.brandData = payload;
    },

    setCaravanList(state, payload) {
        state.caravanList = payload;
    },
    setCaravanId(state, payload) {
        state.caravanId = payload;
    },
    setCaravanData(state, payload) {
        state.caravanData = payload;
    },
    setRVList(state, payload) {
        state.RVList = payload;
    },
    setRVId(state, payload) {
        state.RVId = payload;
    },
    setRVData(state, payload) {
        state.RVData = payload;
    },
    setAdditionalInfo(state, payload) {
        state.additionalInfo = payload;
    },
    setProductData(state, payload) {
        state.ProductData = payload;
    },

    // Token
    setToken(state, payload) {
        state.token = payload;
    },
    setInfo(state, payload) {
        state.info = payload;
    },

    // Login
    setLoginemail(state, payload) {
        state.loginemail = payload;
    },
    setLoginpassword(state, payload) {
        state.loginpassword = payload;
    },
    setLoginerror(state, payload) {
        state.loginerror = payload;
    },
    setLogininvalidError(state, payload) {
        state.logininvalidError = payload;
    },
    setLoginshowError(state, payload) {
        state.loginshowError = payload;
    },
    setLoginshowInvalidError(state, payload) {
        state.loginshowInvalidError = payload;
    },
    setLoginshowSuccess(state, payload) {
        state.loginshowSuccess = payload;
    },
    setLoginsuccessMessage(state, payload) {
        state.loginsuccessMessage = payload;
    },

}
