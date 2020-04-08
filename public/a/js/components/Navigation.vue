<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Site constructor</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                    <li  class="nav-item active" v-for="item in nav">
                        <router-link v-if="item.par === undefined" class="nav-link" :to="item.href">{{item.title}}</router-link>
                        <router-link v-else class="nav-link" :to="{name:item.name,params:item.par }">{{item.title}}</router-link>
<!--                        //<router-link v-else class="nav-link" :to="{name:item.name, params:item.par}">{{item.title}}</router-link>-->
                    </li>
            </ul>
        </div>
    </nav>
</template>
<script>
    export default{
        data(){
            return {
                nav:window.vue_nav,
                authorized:window.auth
            };
        }
        ,props: {
            msg: {
                type: Object
            }
        },
        mounted(){
            if(this.$router.currentRoute.params.site_id !== undefined)
                this.nav.push({title: 'New Page', name: 'Create_pages', par:{'id':this.$router.currentRoute.params.site_id}})
            else {
                let i = this.nav.find(function callback(currentValue, index, array) {return (currentValue.title !== "New Page");})

                if(i>=0)
                    this.nav = this.nav.splice(i, 1);
                }
        },
        watch: {
            msg: function() {
                if(msg.title !== undefined)
                    this.nav.push(this.msg);
            }
        }
    }
</script>