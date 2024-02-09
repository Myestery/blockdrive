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
                                                    class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn"
                                                >
                                                    sign in
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
    methods: {
        async signIn() {
            let res = await signIn();
            console.log("res", res);
        },
    },
};
</script>
