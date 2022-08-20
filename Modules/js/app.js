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

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { fas } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(fas)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false


// Vue.use(VueQuill)

// Start Admin && Authoriztaion Components
Vue.component('adminslist-component',require('./components/Admin/AdminslistComponent').default);
Vue.component('roleslist-component',require('./components/Roles/RoleslistComponent').default);
 Vue.component('rolesadmin-component',require('./components/Roles/RolesadminComponent').default);
 Vue.component('storerole-component',require('./components/Roles/StoreroleComponent').default);
 // End Admin && Authoriztaion Components


 // Start Order Components

 Vue.component('orderslist-component',require('./components/Order/OrderslistComponent').default);
  // End Order Components
 // Start Attribute Components
 Vue.component('attribute-component',require('./components/Attribute/AttributeComponent').default);
  // End Attribute Components

 // Start Product Components
 Vue.component('products-component',require('./components/Product/ProductsComponent').default);
 Vue.component('show-component',require('./components/Product/ShowComponent').default);
 Vue.component('storeproduct-component',require('./components/Product/StoreproductComponent').default);
 Vue.component('updateproduct-component',require('./components/Product/UpdateproductComponent').default);
 // End Product Components


 // Start Brand Components
 Vue.component('brand-component', require('./components/Product/Brand/BrandComponent.vue').default);
 Vue.component('createbrand-component', require('./components/Product/Brand/CreateComponent.vue').default);
 Vue.component('editbrand-component', require('./components/Product/Brand/EditComponent.vue').default);
 // End Brand Components

 // Start Rate Component
 Vue.component('rate-component', require('./components/Rate/RateComponent.vue').default);
 // End Rate Component

 // Start Comment Component
 Vue.component('comment-component', require('./components/Comment/CommentComponent.vue').default);
 // End Comment Component

// Start payment method
Vue.component('payment-method',require('./components/Payment/PaymentMethod').default);
// End payment method

// Start shipment method
Vue.component('shipment-method',require('./components/Shipment/ShipmentMethod').default);
// End shipment method
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


Vue.component('brand-component', require('./components/Product/Brand/BrandComponent.vue').default);
Vue.component('createbrand-component', require('./components/Product/Brand/CreateComponent.vue').default);
Vue.component('editbrand-component', require('./components/Product/Brand/EditComponent.vue').default);
Vue.component('storeproduct-component', require('./components/Product/StoreproductComponent.vue').default);
Vue.component('attribute-component',require('./components/Attribute/AttributeComponent').default);
Vue.component('updateproduct-component',require('./components/Product/UpdateproductComponent').default);
Vue.component('user-component',require('./components/User/UserComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
// Start listeners for Select2 events
let status=''
$('#status_select').on("select2:select", function (e) {
   app.$children[0].product.status=$(e.currentTarget).val()

})
$('#categories_Select').on("select2:select", function (e) {
    app.$children[0].product.category=$(e.currentTarget).val()

   })
   $('#select_brand').on("select2:select", function (e) {
    app.$children[0].product.brand=$(e.currentTarget).val()

   })
   $('#status_select_update').on("select2:select", function (e) {
    app.$children[0].product.status=$(e.currentTarget).val()

 })
 $('#categories_Select_update').on("select2:select", function (e) {
     app.$children[0].product.category_id=$(e.currentTarget).val()

    })
    $('#select_brand_update').on("select2:select", function (e) {
     app.$children[0].product.brand_id=$(e.currentTarget).val()

    })


    // End listeners for Select2 events

