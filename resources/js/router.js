import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/HomeRoute.vue"),
    },
    {
        path: "/test",
        component: () => import("./Pages/TestRoute.vue"),
    },
    {
        path: "/recipes",
        component: () => import("./Pages/Categories/RecipesRoute.vue"),
    },{
        path: "/training",
        component: () => import("./Pages/Categories/TrainingRoute.vue"),
    },{
        path: "/safety",
        component: () => import("./Pages/Categories/SafetyRoute.vue"),
    },{
        path: "/social",
        component: () => import("./Pages/Categories/SocialRoute.vue"),
    },{
        path: "/questions",
        component: () => import("./Pages/Categories/QuestionsRoute.vue"),
    },{
        path: "/admin",
        component: () => import("./Pages/Admin/IndexPage.vue"),
    },{
        path: "/admin/login",
        component: () => import("./Pages/Admin/LoginPage.vue"),
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: () => import("./Pages/NotFoundPage.vue")
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = localStorage.getItem('token');
    if (!isAuthenticated && to.path.startsWith('/admin') && to.path !=='/admin/login') {
        next('/admin/login');
    } else {
        next();
    }
});

export default router;
