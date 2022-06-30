require('./bootstrap');

window.Vue = require('vue').default;
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
Vue.use(ViewUI);
Vue.component('adminslist-component',require('./components/Admin/AdminslistComponent').default);
Vue.component('roleslist-component',require('./components/Roles/RoleslistComponent').default);
 Vue.component('rolesadmin-component',require('./components/Roles/RolesadminComponent').default);
 Vue.component('storerole-component',require('./components/Roles/StoreroleComponent').default);



// require('./../../Modules/Admin/Resources/assets/js/app')
const app = new Vue({
    el:'#app'
})
