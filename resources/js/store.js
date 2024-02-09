import Cookies from "js-cookie";
import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        auth_user_check: 0,
        user: JSON.parse(Cookies.get("user") || null),
    }),
    getters: {
        doubleCount: (state) => state.auth_user_check * 2,
    },
    actions: {
        incrementAndCheck(user) {
            this.auth_user_check++;
            // check if its still null the second time, if yes then we need to logout
            if (this.auth_user_check > 1) {
                if (!user) {
                    return this.logout();
                } else {
                    this.user = user;
                    let today = new Date();
                    let { data, description, key, owner } = user;
                    Cookies.set(
                        "user",
                        JSON.stringify({ data, description, key, owner }),
                        {
                            expires: new Date().setHours(today.getHours() + 4),
                        }
                    );
                }
            }
        },
        logout() {
            this.user = null;
            Cookies.remove("user");
            console.log("logged out");
        },
    },
});
