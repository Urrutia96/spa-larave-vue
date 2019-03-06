import Vue from 'vue'
import Router from 'vue-router'
import Welcome from '../views/Welcome';
import Blog from '../views/Blog';
import Articulo from '../views/Articulo';
import Publicar from '../views/Publicar';

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'welcome',
            component: Welcome
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog,
            props: (route) => ({ query: route.query.page })
        },
        {
            path: '/blog/:slug',
            name: 'articulo',
            component: Articulo,
            props: true
        },
        {
            path: '/publicar',
            name: 'publicar',
            component: Publicar
        }
    ]
})