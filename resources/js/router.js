import VueRouter from 'vue-router';
// import Vue from "vue";

/**
 * components
 */
import Notfound from './components/NotFound.vue';
import Home from './components/Main';
import NouveauGroupe from './components/pages/NouveauGroupe';
import Groupe from './components/pages/Groupe';
import Login from "./components/pages/Login";
import Register from "./components/pages/Register";
import Post from "./components/pages/Post";
import About from "./components/About";

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
    path: '/',
    redirect: '/home'
}, {
    path: '/apropos',
    component: About,
}, {
    path: '/post/:groupe/:id',
    component: Post,
}, {
    path: '/login',
    component: Login
}, {
    path: '/inscrire',
    component: Register
}, {
    path: "*",
    component: Notfound
}];

const router = new VueRouter({
    routes,
    mode: 'history'
});


export default router;
