<template>
    <div class="row">
        <div class="col-12"><h1> {{property_data['title'].value}}</h1></div>
        <div class="col-6 my-3" v-for="img in property_data['album']['value']">
            <img class="img-fluid" :src="img" alt="Test image"></img>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                'property_data':this.$props.data
            }
        },
        props:['data'],
        mounted(){
            //console.log(this.property_data);
        }
    }
</script>
