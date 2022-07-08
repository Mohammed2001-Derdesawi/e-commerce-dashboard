/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import ViewUI from 'view-design';
 import 'view-design/dist/styles/iview.css';
 import Swal from 'sweetalert2'
// import VueQuill from 'vue-quill'
Vue.use(ViewUI);

// Vue.use(VueQuill)
Vue.component('adminslist-component',require('./components/Admin/AdminslistComponent').default);
Vue.component('roleslist-component',require('./components/Roles/RoleslistComponent').default);
 Vue.component('rolesadmin-component',require('./components/Roles/RolesadminComponent').default);
 Vue.component('storerole-component',require('./components/Roles/StoreroleComponent').default);
 Vue.component('orderslist-component',require('./components/Order/OrderslistComponent').default);
 Vue.component('attribute-component',require('./components/Attribute/AttributeComponent').default);
 Vue.component('storeproduct-component',require('./components/Product/StoreproductComponent').default);
 Vue.component('brand-component', require('./components/Product/Brand/BrandComponent.vue').default);
 Vue.component('createbrand-component', require('./components/Product/Brand/CreateComponent.vue').default);
 Vue.component('editbrand-component', require('./components/Product/Brand/EditComponent.vue').default);


// require('./../../Modules/Admin/Resources/assets/js/app')



window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast
    /**
     * The following block of code may be used to automatically register your
     * Vue components. It will recursively scan this directory for the Vue
     * components and automatically register them with their "basename".
     *
     * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
     */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
