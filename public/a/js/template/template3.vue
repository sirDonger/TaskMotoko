<template>
    <div class="row">
        <div class="col-12"><h1> {{property_data['note_title'].value}}</h1></div>
        <div class="col-12"><h4> Создано: {{property_data['day'].value}}</h4></div>
        <div class="card">
            <div class="card-header"><p>{{property_data['content'].value["header"]}}</p></div>
            <div class="card-body"><p>{{property_data['content'].value["text"]}}</p></div>
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
