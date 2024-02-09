import "./bootstrap";
import "./form";

import * as Cookies from "js-cookie";

import HelloVue from "./components/Hello.vue";
import Login from "./Pages/Login.vue";
import { authSubscribe } from "@junobuild/core";
import { createPinia } from "pinia";
import { initJuno } from "@junobuild/core";
import { useAuthStore } from "./store";

// import {store} from "./store"

initJuno({
    satelliteId: "aibci-pyaaa-aaaal-adn4a-cai",
});

const { createApp } = require("vue");
const pinia = createPinia();
const app = createApp({
    components: {
        HelloVue,
        Login,
    },
    mounted() {
        setTimeout(() => {
            const store = useAuthStore();
            authSubscribe((user) => {
                store.incrementAndCheck(user)
            });
        }, 0);
    },
});
app.mount("#app");
// .use(store)
app.use(pinia);
