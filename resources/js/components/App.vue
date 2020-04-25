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

    .columns {
        margin: 0;
    }

    .reverse-columns {
        flex-direction: row-reverse;
    }

    .content-tree {
        padding: 0 1.5rem;
    }

    .content-tree-item + .content-tree-item {
        padding: 20px 0 0;
    }

    .content-tree-nested {
        padding: 0 0 0 25px;
        margin-top: 20px;

        &:empty {
            margin: 0;
        }
    }
</style>
