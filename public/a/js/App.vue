<template>
    <div>
        <app-header :msg="childData"></app-header>
        <router-view  @inputData="updateMessage"></router-view>
    </div>
</template>

<script>
    import Navigation from './components/Navigation.vue'
    export default {
        name: "App",
        data: function() {
            return {
                childData: {}
            };
        },
        methods: {
            updateMessage(variable) {
                console.log("main submited");
                this.childData= variable;
            }
        },
        mounted() {
        },
        components: {
            'app-header': Navigation
        }
    }

</script>
 