<template>

    <!-- breadcrumb -->
    <section class="w-100 py-5">
        <div class="container">
            <div class="position-relative">
                <img :src="`/images/breadcrumb.webp`" class="img-fluid object-fit-cover height-320 w-100" alt="breadcrumb">
                <div class="position-absolute start-0 top-0 w-100 h-100 text-center d-flex justify-content-center align-items-center flex-column">
                    <div class="fs-1 mb-3"> <template v-if="tab === 'forget'"> Forget password </template> <template v-if="tab === 'reset'"> Reset Account </template></div>
                    <div class="d-flex justify-content-center align-items-center">
                        <router-link :to="{name: 'home'}" class="text-decoration-none text-secondary">
                            Home
                        </router-link>
                        <div class="mx-3"> -</div>
                        <router-link :to="{name: 'about'}" class="text-decoration-none text-theme" v-if="tab === 'forget'">
                            Forget Password
                        </router-link>
                        <router-link :to="{name: 'about'}" class="text-decoration-none text-theme" v-if="tab === 'reset'">
                            Reset Account
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center p-3">

            <form @submit.prevent="forget()" class="authentication p-5 border" v-if="tab === 'forget'">
                <div class="mb-4 text-secondary">
                    Please enter the email address associated with your
                    account and We will email you a link to reset your password.
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" name="email" class="form-control px-3 height-45 border shadow-none rounded-0"
                           autocomplete="off" placeholder="Enter your email" v-model="forgetData.email">
                    <div class="error-report" v-if="forgetError != null && forgetError.email !== undefined"> {{forgetError.email[0]}} </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">

                    <button type="submit" class="btn btn-theme width-170 height-45 rounded-0" v-if="!forgetLoading">
                        Forget Password
                    </button>
                    <button type="button" class="btn btn-theme width-170 height-45 rounded-0" v-if="forgetLoading">
                        Loading
                    </button>

                    <router-link :to="{name: 'login'}" class="text-decoration-none text-light-gray-hover">
                        Back to login
                    </router-link>

                </div>
            </form>

            <form @submit.prevent="reset()" class="authentication p-5 border" v-if="tab === 'reset'">
                <div class="mb-4 text-center text-secondary">
                    Create a new password for your account
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" class="form-control px-3 height-45 border shadow-none rounded-0"
                           autocomplete="off" placeholder="Enter your email" v-model="resetData.email">
                    <div class="error-report" v-if="resetError != null && resetError.email !== undefined"> {{resetError.email[0]}} </div>
                </div>
                <div class="form-group mb-3">
                    <label for="reset_code" class="form-label mb-0">Code</label>
                    <div class="small text-secondary mb-2 fw-normal"> Please code collect from your email</div>
                    <input id="reset_code" type="text" name="reset_code" class="form-control px-3 height-45 border shadow-none rounded-0"
                           autocomplete="off" placeholder="Enter your code" v-model="resetData.reset_code">
                    <div class="error-report" v-if="resetError != null && resetError.reset_code !== undefined"> {{resetError.reset_code[0]}} </div>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password"
                           class="form-control px-3 height-45 border shadow-none rounded-0"
                           autocomplete="off" placeholder="Enter your new password"
                           v-model="resetData.password">
                    <div class="error-report" v-if="resetError != null && resetError.password !== undefined"> {{resetError.password[0]}} </div>
                </div>
                <div class="form-group mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input id="confirm-password" type="password" name="confirm-password"
                           class="form-control px-3 height-45 border shadow-none rounded-0"
                           autocomplete="off" placeholder="Enter your new confirm password"
                           v-model="resetData.password_confirmation">
                    <div class="error-report" v-if="resetError != null && resetError.password_confirmation !== undefined"> {{resetError.password_confirmation[0]}} </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">

                    <button type="submit" class="btn btn-theme width-120 height-45 rounded-0" v-if="!resetLoading">
                        Reset
                    </button>
                    <button type="button" class="btn btn-theme width-170 height-45 rounded-0" v-if="resetLoading">
                        Loading
                    </button>

                    <router-link :to="{name: 'login'}" class="text-decoration-none text-light-gray-hover">
                        Back to login
                    </router-link>

                </div>
            </form>

            </div>
        </div>
    </div>

</template>

<script>

import routeApi from "../../../../api/routeApi.js";
import serviceApi from "../../../../api/serviceApi.js";
import axios from "axios";
import {createToaster} from "@meforma/vue-toaster";
const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            tab: 'forget',
            forgetLoading: false,
            resetLoading: false,
            forgetError: null,
            resetError: null,
            forgetData: {
                email: '',
            },
            resetData: {
                email: '',
                reset_code: '',
                password: '',
                password_confirmation: '',
            },

        }
    },
    mounted() {

    },
    methods: {

        /* Function to forget api */
        forget() {
            this.forgetLoading = true;
            axios.post(routeApi.userForget, this.forgetData, { headers: serviceApi.headerContent }).then((response) => {
                if(response.data) {
                    this.forgetLoading = false;
                    this.tab = 'reset';
                    this.resetData.email = this.forgetData.email;
                    toaster.info('Email Send Successfully');
                }
            }).catch(err => {
                this.forgetLoading = false;
                let res = err?.response;
                if (res?.data?.errors !== undefined) {
                    this.forgetError = res?.data?.errors;
                } else {
                    toaster.error('Service error!');
                }
            });
        },

        /* Function to reset api */
        reset() {
            this.resetLoading = true;
            axios.post(routeApi.userReset, this.resetData, { headers: serviceApi.headerContent }).then((response) => {
                if(response.data) {
                    this.resetLoading = false;
                    this.$router.push({name: 'login'});
                    toaster.info('Reset Account Successfully')
                }
            }).catch(err => {
                this.resetLoading = false;
                let res = err?.response;
                if (res?.data?.errors !== undefined) {
                    this.resetError = res?.data?.errors;
                } else {
                    toaster.error('Service error!');
                }
            });
        },

    }
}

</script>
