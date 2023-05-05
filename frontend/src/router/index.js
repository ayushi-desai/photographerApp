import { createWebHistory, createRouter } from "vue-router"
import Body from "@/components/Body.vue"
import Login from "@/components/Login.vue"
import Register from "@/components/Register.vue"
import ForgotPassword from "@/components/ForgotPassword.vue"
import ChangePassword from "@/components/ChangePassword.vue"
import Profile from "@/components/Profile.vue"

let routes = [
    {
        path: '/',
        name: "Home",
        component: Body,
    },
    {
        path: '/login',
        name: "Login",
        component: Login,
    },
    {
        path: '/register',
        name: "Register",
        component: Register,
    },
    {
        path: '/forgotpassword',
        name: "ForgotPassword",
        component: ForgotPassword,
    },
    {
        path: '/changepassword',
        name: "ChangePassword",
        component: ChangePassword,
    },
    {
        path: '/profile',
        name: "Profile",
        component: Profile,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// router.beforeEach((to, from, next) => {
//     const userData = window.localStorage.getItem('userData');
//     // if (userData == null) {
//     //     next({
//     //         name: "Login"
//     //      });
//     //     console.log(typeof userData, userData)
//     //     return;
//     // }
//     // next();
//     //return;
// });

export default router