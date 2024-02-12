import "./bootstrap";
import "./form";

import * as Cookies from "js-cookie";

import { initJuno, signOut } from "@junobuild/core";

import Directory from './components/Directory.vue'
import Files from "./Pages/Files.vue";
import HelloVue from "./components/Hello.vue";
import Login from "./Pages/Login.vue";
import Public from "./Pages/Public.vue"
import Shared from "./Pages/Shared.vue"
import { authSubscribe } from "@junobuild/core";
import { createPinia } from "pinia";
import { useAuthStore } from "./store";

// import {store} from "./store"


initJuno({
    satelliteId: "dkclv-ziaaa-aaaal-adssq-cai",
});

const { createApp } = require("vue");
const pinia = createPinia();
const app = createApp({
    components: {
        HelloVue,
        Login,
        Files,
        Directory,
        Shared,
        Public
    },
    mounted() {
        setTimeout(() => {
            const store = useAuthStore();
            window.logout = store.logout;
            authSubscribe((user) => {
                store.incrementAndCheck(user);
            });
        }, 0);
    },
});
app.mount("#app");
// .use(store)
app.use(pinia);
document.querySelector("#logoutbtn")?.addEventListener("click", async () => {
    await signOut();
    window.logout();
    window.location.href = "/";
});
