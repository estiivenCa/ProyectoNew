require("./bootstrap");
window.Vue = require("vue").default;
import VueRouter from "vue-router";
import "advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css";
Vue.use(require("advanced-laravel-vue-paginate"));

import AdvancedLaravelVuePaginate from "advanced-laravel-vue-paginate";
import "advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css";
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

Vue.use(VueRouter);

import Form from "./components/Tasks/Form.vue";
import Tasks from "./components/Tasks/Lists.vue";
import Edit from "./components/Tasks/Edit.vue";
import EditRes from "./components/Responsables/EditRes.vue";
import Responsables from "./components/Responsables/ListsRes.vue";
import FormRes from "./components/Responsables/FormRes.vue";
import Home from "./components/Home.vue";

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
    {
        path: "/editRes/:id",
        component: EditRes,
    },
    {
        path: "/formRes",
        component: FormRes,
    },
    {
        path: "/listRes",
        component: Responsables,
    },
    {
        path: "/home",
        component: Home,
    },
];
const router = new VueRouter({ routes });
const app = new Vue({
    el: "#app",
    router: router,
});
export default router;
