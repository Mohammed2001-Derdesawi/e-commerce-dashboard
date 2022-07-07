require('./bootstrap');

window.Vue = require('vue').default;
import ViewUI from 'view-design';
 import 'view-design/dist/styles/iview.css';
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



// require('./../../Modules/Admin/Resources/assets/js/app')
const app = new Vue({
    el:'#app'
})
