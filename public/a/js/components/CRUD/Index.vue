<template>
    <div>
        <h1>Hello </h1>
        <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th v-for="item in structure" scope="col">{{item.head}}</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in data">
            <th scope="row">{{ item['id'] }}</th>
            <td v-for="field in structure">{{ item[field.name] }}</td>
            <td>
                <a :href=" _edit.replace(':id', item['id']) " class="btn btn-success">Edit</a>
                <a :href=" _manage.replace(':id',  item['id']) " class="btn btn-info">Manage</a>
                <a :href=" _delete.replace(':id',  item['id']) " class="btn btn-danger">Delete</a>
            </td>
        </tr>
        </tbody>
            <button type="hidden" @keyup.enter="submit" ref="p"></button>
    </table>
    </div>
</template>
<script>

    import axios from 'axios'
    function array_diff(string1, string2) {
        if(undefined == string1 ||undefined == string2 )return new Map();

        string1 = string1.replace(/^[//]+|[//]+$/g, '');
        string2 = string2.replace(/^[//]+|[//]+$/g, '');
        var arr1 = string1.split("/");
        var arr2 = string2.split("/");

        console.log('length');
        if(arr1.length != arr2.length){
            console.log('length');
            return new Map();
        }
        var arr_dif = new Map();
        for (let i=0;i<arr1.length;i++) {
            if (arr1[i] != arr2[i]){
                arr_dif.set(arr1[i], arr2[i]);
            }
        }
        return arr_dif;
    }
    function replace_all(string, map){
        for (var [key, value] of map) {
            string = string.replace(key,value);
        }
        return string;
    }
    export default{
        data(){
            return {
                nav:window.vue_nav,
                authorized:window.auth,
                token:window.token,
                data:true,
                path_data:true,
                _edit:true,
                _delete:true,
                _manage:true,
            };
        },
        beforeMount(){
            this.path_data= array_diff(this.$props.packed_path,this.$router.currentRoute.path);
            this._edit= replace_all(this.$props.edit,this.path_data);
            this._delete=replace_all(this.$props.delete_,this.path_data);
            this._manage=replace_all(this.$props.manage,this.path_data);
        },
        methods: {
            submit: function() {
                if(this.path_data.has(':site_id') == true) {
                    this.tempMessage = {title: 'New Page', href: replace_all(':site_id/pages/new', this.path_data)};
                    console.log("message submited");
                }else {
                    console.log(this.path_data);
                    console.log("this.path_data");
                }
            }
        },
        mounted(){
            var data_src =replace_all( this.$props.data_src,this.path_data );
            console.log(data_src);
            this.submit();
            axios
                .post(data_src, {"token_":token})
                .then(response => {this.data = response.data;this.$forceUpdate();},(error) => {this.info = "error"; } );
        },
        props:{'structure':{required: true} , 'data_src':{required: true}, 'edit':{required: true}, 'manage':{required: true}, 'delete_':{required: true},'path':{required: false}, 'packed_path':{required: false}},
    }
</script>