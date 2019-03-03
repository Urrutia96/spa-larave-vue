import Vue from 'vue'
import Router from 'vue-router'
import Welcome from '../views/Welcome';
import Blog from '../views/Blog';
import Articulo from '../views/Articulo';

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
            component: Blog
        },
        {
            path: '/blog/:slug',
            name: 'articulo',
            component: Articulo,
            props: true
        }
    ]
})