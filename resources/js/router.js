import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home/Home.vue';
import Portfolio from './pages/Portfolio/Portfolio.vue';
import PortfolioItem from './pages/PortfolioItem/PortfolioItem.vue';
import AdminDash from './pages/admin/DashBoard/DashBoard.vue';
import AdminPortfolioCreate from './pages/admin/portfolio/create/Create.vue';
import AdminPortfolioEdit from './pages/admin/portfolio/edit/Edit.vue';
import notFound from './pages/404/Index.vue';

import i18n from './i18n';

const locale = i18n.global.locale;

const language = '/:language([a-z]{2})?';
console.log(i18n, 'i18n');
console.log(locale, 'locale');

const router = createRouter({
    mode: 'history',
    history: createWebHistory(),
    base: (locale.trim().length && locale != '/') ? '/' + locale : undefined,
    routes: [
        {
            path: '/',
            redirect: `/${locale}`
        },
        {
            path: `${language}`,
            name: 'home',
            component: Home,
        },
        {
            path: `${language}/portfolio`,
            name: 'portfolio',
            component: Portfolio,
        },
        {
            path: `${language}/portfolio/:id`,
            name: 'portfolioItem',
            component: PortfolioItem
        },
        {
            path: '/admin',
            redirect: '/login'
        },
        {
            path: `${language}/admin/dashboard`,
            name: 'admin-dashboard',
            component: AdminDash,
            children: [
                {
                    path: `${language}/admin/dashboard/portfolio/create`,
                    component: AdminPortfolioCreate
                },
                {
                    path: `${language}/admin/dashboard/portfolio/edit`,
                    component: AdminPortfolioEdit
                },
            ]
        },
        {
            path: '/:pathMatch(.*)*',
            component: notFound,
        }
    ]
});

// router.beforeEach((to, from, next) => {
//   console.log(to, from, 'to from next');
//     const lang = to.params.language;
//     // if (to.path === '/en') {
//     //     return next('/en/')
//     // }
//     //
//     // if (to.path === '/ru' ) {
//     //     return next('/ru/')
//     // }

//     if (!['en', 'ru'].includes(lang)) {
//         console.log(' u\']includes(lang)');
//         next({ path: '/en' + to.path });
//         return;
//     }

//     if (i18n.locale !== lang) {
//         i18n.locale = lang;
//     } else {
//       console.log('18n.locale !== lang else');
//         return next('/en' + to.path);
//     }
// });

export default(router);
