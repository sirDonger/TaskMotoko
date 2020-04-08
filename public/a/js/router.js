import VueRouter from 'vue-router' ;
import Test from "./components/Test";
import Profile from "./components/User/Profile";
import Login from "./components/User/Login";
import Register from "./components/User/Register";
import Index from "./components/CRUD/Index";
import Create from "./components/CRUD/CreateUpdate";
import PageConstructor from "./components/CRUD/PageConstructor";
import SetUp from "./components/CRUD/LayoutSetup";
import Drag from "./components/CRUD/drag_test";

export default new VueRouter({
    mode: 'history',
    routes:[
        { path:"/",
            component: Test,
            name: "Home"
        },
        {
            path:'/dragtest',
            component:Drag
        },
        { path:"/profile",
            component: Profile,
            name: 'Profile'
        },
        {
            path:"/login",
            component: Login,
            name: "Login"
        },
        {
            path:"/register",
            component: Register,
            name: "Register"
        },
        {
            path: "/admin/setup",
            component: SetUp,
            name: "LayoutSetup"
        },
        {
            path: "/sites",
            component: Index,
            name: 'Index_sites',
            props: {
                'packed_path':"/sites/",
                'path':"/sites",
                'structure' : [{"head":'Name ',"name":'name'},{"head":'Owner ',"name":'owner'},{"head":'Data ',"name":'data'},{"head":'URL',"name":'url'}],// list of names
                'data_src':'/sites', // list of items [[],[],[]]
                'edit':"/sites/:id",
                'manage':"/:id/pages",
                'delete_':"/sites/delete/:id"
            }
        },
        {
            path: "/sites/new",
            component: Create,
            name: "Create_site",
            props:{
                'packed_path':"/sites/new/",
                'fields':[
                    {'title':'Site Name',           'name':'name',  'default':"New Site"},
                    {'title':'Site Description',    'name':'data',  'default':"This is an example of description"},
                    {'title':'Site Url',            'name':'url',   'default':"new_site"}],
                'form_name':'Create new site',
                'action_form':'/sites/new'
            }
        },
        {
            path: "/sites/:id/",
            component: Create, // update
            name: 'Update_site',
            props:{
                'packed_path':"/sites/:id/",
                'fields':[
                    {'title':'Site Name',           'name':'name',  'default':"New Site"},
                    {'title':'Site Description',    'name':'data',  'default':"This is an example of description"},
                    {'title':'Site Url',            'name':'url',   'default':"new_site"}],
                'form_name':'Edit site',
                'action_form':'/sites/:id',
                'mount_action':'/site/:id',
            }
        },
        {
            path: "/:site_id/pages",
            component: Index,
            name: 'Index_pages',
            props: {
                'packed_path': "/:site_id/pages/",
                'structure': [{"head": 'Page name', "name": 'name'}, {"head": 'Owner', "name": 'owner'}, {
                    "head": 'Url', "name": 'site_url'},
                    {"head": 'Slug', "name": 'slug'}],// list of names
                'data_src': '/:site_id/pages', // list of items [[],[],[]]
                'edit': "/:site_id/pages/:id/",
                'manage': "/:site_id/page/:id",
                'delete_': "/:site_id/pages/delete/:id"
            }
        },
        {
            path: "/:site_id/pages/new",
            component: Create,
            name: 'Create_pages',
            props:{
                'packed_path':"/:site_id/pages/new/",
                'fields':[
                    {'title':'Page Name',           'name':'name',  'default':"New page"},
                    {'title':'Page slug',           'name':'slug',  'default':"index"}],
                'form_name':'Edit page',
                'action_form':'/:site_id/pages/new',
            }
        },
    {
            path: "/:site_id/pages/:id",
            component: Create, //update
            name: 'Update_pages',
            props:{
                'packed_path':"/:site_id/pages/:id/",
                'fields':[
                    {'title':'Page Name',           'name':'name',  'default':"New Site"},
                    {'title':'Page slug',           'name':'slug',  'default':"index"}],
                'form_name':'Edit page',
                'action_form':'/:site_id/pages/:id',
                'mount_action':'/:site_id/page/:id'
            }
        }, {
            path: "/:site_id/page/:id",
            component: PageConstructor, //update
            name: 'Page_controller',
            props:{
                'packed_path':"/:site_id/pages/:id/",
                'layout' : "/layouts",
                'data_src' : ":site_id/blocks/:id"
            }
        },

    ]});