<template>
    <div class="col">
        <div class="row">]
            <div class="col-md-2" :id="userId"><p> </p></div>
            <div class="col-md-6" >
            <div class="card card-default">
                <div class="card-header"><h1>{{form_name}}</h1></div>
                <div class="card-body">
                <form method="POST" :action="form">

                    <div v-for="field in fields" class="form-group">
                        <label :for="field.name">{{field.title}}</label>
                        <input type="text" class="form-control" :value="field.default" :id="field.name" :name="field.name">
                    </div>
                    <button type="submit"  class="btn btn-primary">Create</button>
                    <input type="hidden" name="_token" :value="token">
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'
    import Router from 'vue-router'


    function array_diff(string1, string2) {
        if(undefined == string1 ||undefined == string2 )return new Map();
        string1 = string1.replace(/^[//]+|[//]+$/g, '');
        string2 = string2.replace(/^[//]+|[//]+$/g, '');
        var arr1 = string1.split("/");
        var arr2 = string2.split("/");

        if(arr1.length != arr2.length)return [];
        var arr_dif = new Map();
        for (let i=0;i<arr1.length;i++) {
            if (arr1[i] != arr2[i]){
                arr_dif.set(arr1[i], arr2[i]);
            }
        }
        return arr_dif;
    }
    function replace_all(string, map){
        for (const [key, value] of map) {
            string = string.replace(key,value);
        }
        return string;
    }
    export default {
        data(){
            return {
                'token':window.token,
                form:true,

            }
        },
        beforeMount(){
            this.userId= this.$route.params.id;
            this.computedFields=this.$props.fields;
            this.path_data=array_diff(this.$props.packed_path,this.$router.currentRoute.path);
            this.form= replace_all(this.$props.action_form, this.path_data);
            console.log(this.path_data);
        },
        mounted(){
            if( this.userId !== undefined && this.$props.mount_action !== undefined ) {

                let action = replace_all(this.$props.mount_action,this.path_data);

                axios
                    .post(action,  {"token_":token})
                    .then(response => {
                        let s = Object.entries(response.data);
                        let t=new Map();
                        for(let i=0;i<s.length;i++)
                            t.set(s[i][0],s[i][1]);
                        console.log(t);
                        for (let i = 0; i < this.computedFields.length; i++) {
                            this.computedFields[i].default= t.get(this.computedFields[i].name);
                        }
                        this.$forceUpdate();
                    }, (error) =>( this.info = "error"));
            }
        },
        props:{'fields':Array, 'form_name':String, 'action_form':String,  'mount_action':{required: false}, 'packed_path':{required: false}}
    }
</script>