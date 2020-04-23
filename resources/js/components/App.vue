<template>
    <div>
        <NavBar/>
        <router-view/>
    </div>
</template>

<script>
    import NavBar from "./skeleton/NavBar";

    export default {
        name: "App",
        components: {
            NavBar
        }
    }
</script>

<style lang="scss">
    @import '~bulma/css/bulma.css';
</style>
