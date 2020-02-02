import VueRouter from 'vue-router';
// import Vue from "vue";

/**
 * components
 */
import Notfound from './components/NotFound.vue';
import Home from './components/Main';
import NouveauGroupe from './components/pages/NouveauGroupe';
import Groupe from './components/pages/Groupe';

const routes = [{
    path: '/group/add',
    component: NouveauGroupe,
}, {
    path: '/group/:id',
    component: Groupe,
}, {
    path: '/home',
    component: Home,
}, {
    path: "*",
    component: Notfound
}];

const router = new VueRouter({
    routes,
    mode: 'history'
});


export default router;
