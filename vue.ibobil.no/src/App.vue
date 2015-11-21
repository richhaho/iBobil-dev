<template>
    <div id="app">
        <!-- <headerCommon></headerCommon> -->
        <router-view name="header"></router-view>
        <router-view></router-view>
        <router-view name="footer"></router-view>
        <!-- <footerCommon></footerCommon> -->
    </div>
</template>

<script>
    import headerCommon from './components/headerCommon'
    import footerCommon from './components/footerCommon'

    export default{
        components: {
            headerCommon,
            footerCommon
        }
    }
</script>

<style lang="scss">
	@import "scss/style.scss";
</style>
