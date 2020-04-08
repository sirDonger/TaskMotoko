<template><div class="container-fluid"><div class="row"><div class="col-4"><div class="card card-default"><div class="card-header">page.name</div><div class="card-body"><div class="content-container" v-on:mousemove="moveAt">
    <div v-for='(block, key) in data_container["data"]' ref="div" v-on:mousedown.prop="myDrag" v-on:mouseup.prop="myDragStop" :name="key">
        <a class="btn btn-outline-success btn-block" data-toggle="collapse" :name="key"  :href='"#"+block.priority' role="button" aria-expanded="false" :aria-controls="block.priority">
            Блок Template {{block.priority}}>
        </a>
        <div class="collapse" :id="block.priority">
            <div class="card card-body">
                <form>
<!--                    <div><label> Priority : <input type="number" :max="data_container['data'].length" min="0" :id="key" :onchange.prop="updatePriority"> <button class="btn btn-success" :id="key" :onclick.prop="pushPriority">Update</button></label>                       </div>-->
                    <div v-if="data_container['layouts'][Number(block.layout_id)-1]" v-for='data in data_container["layouts"][Number(block.layout_id)-1]["required_fields"]'>
                        <label>{{data.name }}
                            <div v-if="data.type == 'Array'">
                                <div v-if="data.entry_type == 'Object'">
                                    <div v-for="item in block.value" :key="item.id">
                                        <div v-for="element in data.structure" :key="element.id">
                                            <label>{{element}}
                                                <input :type="input_type[data.type]" :id="key+'|'+data.name+'|'+(Number(item)-1)+'|'+element" :onclick.prop="focus" :onchange.prop="changing_values">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div v-else-if="input_type[data.entry_type]">
                                    <div v-for="item in Number(data.length)">{{item}}
                                        <input :type="input_type[data.entry_type]" :id="key+'|'+data.name+'|'+(Number(item)-1)" :onclick.prop="focus" :value="block['meta_data'][data.name].value[item-1]" :onchange.prop="changing_values">
                                    </div>
                                </div>
                            </div>
                            <div v-else-if="data.type == 'Object'">
                                <div v-for="element in data.structure">
                                    <label>{{element}}<input :type="input_type[data.type]" :id="key+'|'+data.name+'|'+element" :onclick.prop="focus" :value="block['meta_data'][data.name].value[element]" :onchange.prop="changing_values"></label>
                                </div>
                            </div>
                            <div v-else-if="input_type[data.type]">
                                <input :type="input_type[data.type]"  :value="block['meta_data'][data.name].value" :onclick.prop="focus" :id="key+'|'+data.name" :onchange.prop="changing_values">
                            </div></label></div></form></div></div></div></div>
    <a class="btn btn-outline-success btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Добавить блок
    </a>
    <div class="collapse" id="collapseExample" >
        <div class="card card-body">
            <select v-model="selected">
                <option v-for="item in data_container['layouts']" :value="item.id">{{item.name}}</option>
            </select>
            <button class="btn btn-success" :onclick.prop="addNewTemplate">Добавить</button>
        </div>
    </div>
    <a class="btn btn-outline-success btn-block" :onclick.prop="pack_data">
        Сохранить изменения
    </a>
</div></div></div>
<div class="col-8 row">
    <div v-for='block in data_container["data"]'>
        <span class="my-1"><templateHeader v-if="block.layout_id == 1" :data="block['meta_data']"></templateHeader></span>
        <span class="my-1"><templateImages v-if="block.layout_id == 2" :data="block['meta_data']"></templateImages></span>
        <span class="my-1"><template3 v-if="block.layout_id == 3" :data="block['meta_data']"></template3></span>
    </div>
</div> </div></div></template>
<script>
    import axios from 'axios'
    import templateHeader from "../../template/template1";
    import templateImages from "../../template/template2";
    import template3 from "../../template/template3";

    function array_diff(string1, string2) {if(undefined == string1 ||undefined == string2 )return new Map();string1 = string1.replace(/^[//]+|[//]+$/g, '');string2 = string2.replace(/^[//]+|[//]+$/g, '');var arr1 = string1.split("/");var arr2 = string2.split("/");console.log('length');if(arr1.length != arr2.length){console.log('length');return new Map();}var arr_dif = new Map();for (let i=0;i<arr1.length;i++) {if (arr1[i] != arr2[i]){arr_dif.set(arr1[i], arr2[i]);}}return arr_dif;}
    function replace_all(string, map){for (var [key, value] of map) {string = string.replace(key,value);}return string;}
    export default {
        event: 'change',
        data:function(){return {token:window.token, list_corrds:[], selected:'', datasrc:"", data_container:{'data':[],'layouts':[]}, input_type:{'Integer':'number', 'Boolean':'checkbox', 'String':'text', 'Url':'url'}}},
        props:  ['packed_path', 'layout' , 'data_src'],
        beforeMount() {this.path_data = array_diff(this.$props.packed_path, this.$router.currentRoute.path);this.datasrc = "/"+replace_all(this.$props.data_src, this.path_data);console.log(this.datasrc);this.layout_src = this.$props.layout;},
        mounted(){
            axios.post(this.layout_src,{token:this.token}).then(response => {this.data_container['layouts']= response.data;for(let i =0; i<this.data_container['layouts'].length;i++) this.data_container['layouts'][i]['required_fields'] = JSON.parse(this.data_container['layouts'][i]['required_fields'] );},(error) => {error.log(error); } );
            axios.post(this.datasrc, {token:this.token}).then(response => {this.data_container['data'] =  response.data;for(let i =0; i<this.data_container['data'].length;i++) this.data_container['data'][i]['meta_data'] = JSON.parse(this.data_container['data'][i]['meta_data']);},(error) => {error.log(error); } );
            this.$forceUpdate();
        },
        methods: {
            // method packs data and send it to save
            pack_data() {
                this.pack_info = [];
                for (let i = 0; i < this.data_container["data"].length; i++) {
                    let indexes = Object.keys(this.data_container["data"][i]['meta_data']);
                    let pack = new Map();
                    for (let j = 0; j < indexes.length; j++)
                        pack.set(indexes[j], {value: this.data_container["data"][i]["meta_data"][indexes[j]].value});
                    this.pack_info.push({
                        'layout_id': this.data_container['data'][i]["layout_id"],
                        'priority': this.data_container['data'][i]["priority"],
                        'meta_data': JSON.stringify(Object.fromEntries(pack)),
                        'page_id': this.data_container['data'][i]["page_id"],
                        'id': this.data_container['data'][i]["id"],
                    });
                }
                axios.post("/pages/set/" + this.path_data.get(':id'), {token: this.token, pack: this.pack_info})
            },
            // Method gets template from layouts and place it to the model of page
            addNewTemplate() {
                let template = undefined;
                for (let i = 0; i < this.data_container['layouts'].length; i++) if (this.selected == this.data_container['layouts'][i].id) template = this.data_container['layouts'][i];
                if (template === undefined) return;
                this.data_container['data'].push({
                    'layout_id': template.id,
                    'priority': this.data_container['data'].length,
                    'meta_data': JSON.parse(template['default_meta']),
                    'page_id': this.path_data.get(':id'),
                });
            },
            // deprecated: must be replaced with drag and drop
            updatePriority(event) {
                let key = event.target.id;
                this.data_container['data'][key]['priority'] = event.target.value;
            },
            // deprecated: sort array must be replaced with drag and drop
            pushPriority(event) {
                let index = event.target.id;
                let element = this.data_container['data'].splice(index)[0];
                if (element['priority'] < 0 || element['priority'] >= this.data_container['data'].length) this.data_container['data'].push(element);
                else this.data_container['data'].splice(element['priority'], 0, element);
            },
            changing_values: function (event) {
                let name = event.target.id.split('|');
                switch (name.length) {
                    case 2:this.data_container['data'][name[0]]['meta_data'][name[1]].value = event.target.value;break;
                    case 3:this.data_container['data'][name[0]]['meta_data'][name[1]]['value'][name[2]] = event.target.value;this.$forceUpdate();break;
                    case 4:this.data_container['data'][name[0]]['meta_data'][name[1]]['value'][name[2]][name[3]] = event.target.value;this.$forceUpdate();
                    default:break;
                }
            },
            initCords() {
                this.$refs.div.forEach((elem, i) => {
                    this.list_corrds[i] = elem.offsetTop + elem.offsetHeight;
                });
            },
            focus(event){
                event.target.focus();
            },
            // Drag and drop  methods:
            myDrag(event) {
                this.initCords();
                event.preventDefault();
                this.i=0;
                this.draggableIndex = -1;
                if(!isNaN(event.target.name)){
                    this.draggableIndex = event.target.name;
                }
                this.reorderedList = this.items;
                this.moveAt(event);
            },
            moveAt(event) {
                if (this.draggableIndex !== -1) {
                    this.dragLeft = event.pageX - 16;
                    this.dragTop = event.pageY - 16;
                    this.i++;
                }
            },
            myDragStop(event) {

                this.initCords(event);
                if (this.draggableIndex === -1 || String(this.draggableIndex).length === 0  || this.i <= 10) return;
                let j = 0;
                while (j < this.list_corrds.length && Number(this.list_corrds[j]) < Number(this.dragTop))j++;
                let element = this.data_container['data'].splice(this.draggableIndex, 1)[0];
                if (j >= this.list_corrds.length)
                    this.data_container['data'].push(element);
                else
                    this.data_container['data'].splice(j, 0, element);
                console.log('END:', JSON.stringify(this.list_corrds), 'coords: ',this.dragTop,'movement:', this.i, 'indexes:(from, to)', this.draggableIndex, j );
                this.i = 0
                this.draggableIndex = -1;
                this.dragLeft = 0;
                this.dragTop = 0;
            },
            isDragging(key) {
                return this.draggableIndex === key;
            }
        },
        components:{
            templateHeader,
            templateImages,
            template3
        }
    }
</script>