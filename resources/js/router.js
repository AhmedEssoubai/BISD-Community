import VueRouter from 'vue-router';
// import Vue from "vue";

/**
 * components
 */
import Notfound from './components/NotFound.vue';
import Home from './components/Main';
import NouveauGroupe from './components/pages/NouveauGroupe';

const routes = [{
        path: '/group/add',
        component: NouveauGroupe,
    }, {
        path: '/home',
        component: Home,
    },
    {
        path: "*",
        component: Notfound
    },
];

const router = new VueRouter({
    routes,
    mode: 'history'
});


export default router;
