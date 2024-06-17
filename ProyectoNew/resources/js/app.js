require("./bootstrap");
window.Vue = require("vue").default;
import VueRouter from "vue-router";
// register as a global Vue component
import 'advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css'
Vue.use(require('advanced-laravel-vue-paginate'));

// or, import as a single Vue component
import AdvancedLaravelVuePaginate from 'advanced-laravel-vue-paginate';
import 'advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css'



Vue.use(VueRouter);

import Form from "./components/Tasks/Form.vue";
import Tasks from "./components/Tasks/Lists.vue";
import Edit from "./components/Tasks/Edit.vue";

const routes = [
    {
        path: "/form",
        component: Form,
    },
    {
        path: "/",
        component: Tasks,
    },
    {
        path: "/edit/:id",
        component: Edit,
    },
];
const router = new VueRouter({ routes });
const app = new Vue({
    el: "#app",
    router: router,
});
export default router;
