require("./bootstrap");
window.Vue = require("vue").default;
import VueRouter from "vue-router";
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
