<template>
    <main class="main-content">
        <div
            class="admin"
            style="background-image:url({{ asset('assets/img/admin-bg-light.png') }});"
        >
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                        <div class="edit-profile">
                            <div class="edit-profile__logos">
                                <img
                                    class=""
                                    src="/assets/img/logo.png"
                                    alt="logo"
                                />
                            </div>
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>Sign in Using Internet Identity</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/" method="POST">
                                        <div class="edit-profile__body">
                                            <div
                                                class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center"
                                            >
                                                <button
                                                    @click="signIn"
                                                    type="button"
                                                    :class="`btn ${
                                                        loading
                                                            ? 'btn-info'
                                                            : 'btn-secondary'
                                                    } btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn`"
                                                    :disabled="loading"
                                                >
                                                    <span v-if="!loading">
                                                        sign in</span
                                                    >
                                                    <div
                                                        v-else
                                                        class="dm-spin-dots spin-sm"
                                                    >
                                                        <span
                                                            class="spin-dot badge-dot dot-primary"
                                                        ></span>
                                                        <span
                                                            class="spin-dot badge-dot dot-primary"
                                                        ></span>
                                                        <span
                                                            class="spin-dot badge-dot dot-primary"
                                                        ></span>
                                                        <span
                                                            class="spin-dot badge-dot dot-primary"
                                                        ></span>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import { signIn } from "@junobuild/core";

export default {
    data() {
        return {
            loading: false,
        };
    },
    methods: {
        async signIn() {
            this.loading = true;
            let res = await signIn();
            window.location.href = "/";
        },
    },
};
</script>
