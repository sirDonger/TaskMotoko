<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 header-h1"><h1>Template constructor</h1> </div>

            <div class="col-10 mx-auto">
                <div class="card card-default">
                    <div class="card-header">Список компонентов</div>
                    <div class="card-body text-center">
                        <div class="card" v-for="(field, key) in template_">
                            <div class="card-body row justify-content-center">
                                <div class="col-auto">
                                    <table class="table table-responsive">
                                    <tr class="text-left">
                                        <td><input v-model="template_[key].name" class="active my-1"></td>
                                    <td><button class="btn btn-success" :onclick.prop="isAvalibale('Object','val')">[edit]</button>
                                    <button class="btn btn-danger" :id="key" :onclick.prop="removeField">[delete]</button></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td>Type of field</td>
                                        <td>
                                            <select v-model="template_[key].type" :id="key" :onchange.prop="setValue">
                                                <option>String</option>
                                                <option>Integer</option>
                                                <option>Boolean</option>
                                                <option>Url</option>
                                                <option>Array</option>
                                                <option>Object</option>
                                            </select>
                                        </td>
                                    </tr>
                                        <tr v-if="field.type === 'Array'" class="text-left">
                                            <td>
                                                Elements in array type
                                            </td>
                                            <td>
                                                <select  v-model="template_[key].entry_type"  ><option>String</option><option>Integer</option><option>Boolean</option><option>Url</option><option>Object</option></select>
                                            </td>
                                        </tr>
                                        <tr v-if="field.type === 'Array'" class="text-left" >
                                            <td>
                                                Size
                                            </td>
                                            <td>
                                                <input type="number" value="3" v-model="template_[key].length">
                                            </td>
                                        </tr>
                                        <tr v-if="field.type === 'Object' || (field.type === 'Array' && field.entry_type === 'Object')" class="text-left">
                                            <td>Object fields: </td><td><button class="btn btn-success" :id="key" :onclick.prop="addField" > Add field</button></td>
                                        </tr>
                                        <tr v-for="(element, index ) in field.structure" v-if="field.type === 'Object' || (field.type === 'Array' && field.entry_type === 'Object')" class="text-left">
                                            <td>
                                                <input v-model="template_[key].structure[index]" :id="key+'|structure|'+index" :onchange.prop="update" :placeholder="index">
                                            </td>
                                            <td>
                                                <button class="btn btn-success" :id="key+'|'+index" :onclick.prop="removeField"> Remove field</button>
                                            </td>
                                        </tr>

                                </table>
                                </div>
                                <div class="col-1">
                                    <div class="btnWrapper">
                                        <button class="btn-danger" :id="key" :onclick.prop="hide" v-if="!field.hidden">
                                            >
                                        </button>
                                        <button class="btn-danger" :id="key" :onclick.prop="hide" v-else>
                                            <
                                        </button>
                                    </div>
                                 </div>
                                <div class="col-auto" v-if="!field.hidden">
                                    <table class="table table-responsive" v-if="field.type === 'Array'">
                                        <div  v-for="num in Number(field.length)">
                                        <tr v-if="field.entry_type !== 'Object'">
                                            <td>{{num-1}}#</td>
                                            <td>
                                                <input :input_type="field.entry_type" v-model="template_[key].value[num-1]">
                                            </td>
                                        </tr>
                                        <tr v-else v-for="(elements, key_) in field.structure">
                                            <td>{{num-1}}#{{elements}}</td>
                                            <td>
                                                <input :input_type="field.entry_type" v-model="template_[key].value[num-1][elements]">
                                            </td>
                                        </tr>
                                        </div>
                                    </table>
                                    <table v-else-if="field.type === 'Object'">
                                        <tr v-for="(elements, key_) in field.structure">
                                            <td>{{elements}}#</td>
                                            <td>
                                                <input :input_type="field.entry_type" v-model="template_[key].value[elements]">
                                            </td>
                                        </tr>
                                    </table>
                                    <table v-else>
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <input :input_type="field.entry_type" v-model="template_[key].value">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-secondary  btn-lg btn-block" id="-1" :onclick.prop="addField">Add new field</button>
                    </div>
                </div>
            </div>
            <div class="col-auto mx-auto">
                <div class="card card-default">
                    <div class="card-header">Создание запроса</div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tr>
                                <td>Path :</td><td><input name="template_path" v-model="path"></td>
                            </tr>
                            <tr>
                                <td>Label:</td><td><input name="template_path" v-model="name"></td>
                            </tr>
                            <tr>
                                <button class="btn" :onclick.prop="submit_">Отправить запрос</button>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>
<style>
    .btnWrapper
    {
        width: 100%;
        background-color: #FEE;
        margin-bottom: 10px;
        height: 100%;
    }
    .btnWrapper button{
         width: 100%;
         height:100%;
     }


    .header-h1 {
        position: relative;
        margin-bottom: .5rem;
    }
    .header-h1 h1 {
        font-size: 1.5rem;
        margin-bottom: 0;
        padding-left: 3rem;
        color: #526789;
    }
    .header-h1 h1::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 2.25rem;
        height: 2.25rem;
        background: #526789;
    }
    .header-h1 h1::after {
        content: "";
        position: absolute;
        left: 0;
        top: 2rem;
        width: 100%;
        height: .25rem;
        background-color: #526789;
    }
</style>
<script>
    import axios from 'axios'
    export default{
        data(){
            return {
                template_:{},
                template_default:{
                    name: 'title',
                    value: 'Title',
                    type: 'String',
                    hidden: true
                },
                path:'',
                name:'Template',
                input_type:{'Integer':'number', 'Boolean':'checkbox', 'String':'text', 'Url':'url'},
                types:['Array',
                    'Object',
                    'Integer',
                    'String',
                    'Boolean',
                    'Url',
                    ],
                iterable:0
            }
        },
        methods:{
            submit_(event){
                console.log('submitting')
                let request= {
                    name:this.name,
                    url:this.path,
                };
                let fields=Object.keys(this.template_);
                let json_data = [];
                let json_default = new Map();
                for(let i=0;i<fields.length;i++){
                    json_data[i]={
                        name:this.template_[fields[i]].name,
                        type:this.template_[fields[i]].type,
                    };

                    console.log('packing', json_data[i].type);
                    if(json_data[i].type == 'Array'){
                        json_data[i].length=this.template_[fields[i]].length;
                    }
                    else if(json_data[i].type == 'Object' || this.template_[fields[i]].entry_type == "Object"){
                        if(json_data[i].type == 'Array' && this.template_[fields[i]].entry_type == "Object"){
                            json_data[i].entry_type = this.template_[fields[i]].entry_type;
                        }
                        json_data[i].structure = this.template_[fields[i]].structure;
                    }
                    else {json_default.set(
                            json_data[i].name,
                            {
                                value:this.template_[fields[i]].value
                            }
                        );
                    console.log('template', json_default);
                    }
                }
                request.required_fields = JSON.stringify(json_data);
                request.default_meta = JSON.stringify(Object.fromEntries(json_default));
                request.token=this.token;

                axios.post("/admin/layout/new",request).then((error) => {console.log(error); } );
                console.log('Post sent')
            },
            addField(event){
                if(event.target.id !== '-1'){
                    if( this.template_[event.target.id].structure === undefined) this.template_[event.target.id].structure = [];
                    this.template_[event.target.id].structure[this.template_[event.target.id].structure.length]=this.template_[event.target.id].structure.length;

                    this.$forceUpdate();
                }
                 else {
                    this.$set(this.template_, 'default_' + this.iterable++, Object.assign({}, this.template_default));


                    this.$forceUpdate();
                }
            },
            hide(event){
                let key = event.target.id;
                this.template_[key].hidden = ! this.template_[key].hidden
            },
            setValue(event){
                let par = event.target.id;

                if(this.template_[par].type ==='Array') {

                    if(this.template_[par].length === undefined || !isNaN( this.template_[par].length) ||  this.template_[par].length <= 0  )
                        this.template_[par].length = 3;
                    if( ! Array.isArray(this.template_[par].value) ) {
                        this.template_[par].value = new Array(this.template_[par].length);

                        console.log(this.template_[par].value);
                        if(this.template_[par].entry_type === "Object" && this.template_[par].structure ){
                            map = new Map();
                            for(let i =0;i<this.template_[par].structure.length;i++){
                                map.set(this.template_[par].structure[i], this.template_[par].structure[i]);
                            }
                            for(let i=0;i<this.template_[par].value.length;i++) {
                                this.$set(this.template_[par].value[i], i, Object.assign({}, Object.fromEntries(map)));
                            }
                        }
                    }
                }
                else if(event.target.value==='Object'){
                    this.template_[par].length = 1;
                    this.template_[par].value = {};
                }
                else {
                    this.template_[par].value="";
                    delete this.template_[par].length;
                }
            },
            update(event) {
                console.log(event.target.name, event.target.id);
                let par = event.target.id.split("|");
                switch (par.length) {
                    case 1:
                        break;
                    case 2:
                        this.template_[par[0]][par[1]] = event.target.value;
                        console.log(this.template_[par[0]][par[1]]);
                        this.$forceUpdate();
                        break;
                    case 3:
                        this.template_[par[0]][par[1]][par[2]] = event.target.value;
                        console.log(this.template_[par[0]][par[1]][par[2]]);


                        if(this.template_[par[0]].type === "Array" && this.template_[par[0]].entry_type === "Object" && this.template_[par[0]].structure ){
                            let map = new Map();
                            for(let i =0;i<this.template_[par[0]].structure.length;i++){
                                map.set(this.template_[par[0]].structure[i], this.template_[par[0]].structure[i]);
                            }
                            for(let i=0;i<this.template_[par[0]].value.length;i++) {
                                this.template_[par[0]].value[i]= Object.fromEntries(map);
                            }
                        }
                        this.$forceUpdate();
                        break;
                    default:
                        console.log(par[0], par[1], par[2],par[3],par[4]);
                        break;
                }
            },
            removeField(event){
                let par = event.target.id.split('|');
                console.log(par);
                if(par.length===1)
                    delete this.template_[par[0]];
                else
                     this.template_[par[0]].structure.splice(par[1], 1);
                this.$forceUpdate();
            },
            isAvalibale(type, for_){
                if(for_ == 'val'){
                    return this.types.includes(type,2);
                }
                if(for_ == 'obj'){
                    return this.types.includes(type,1);
                }
            }

        }

    }
</script>