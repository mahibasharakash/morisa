<template>

    <header class="w-100 bg-light header">
        <div class="container">
            <div class="py-4 px-2">
                <div class="row align-items-center">
                    <div class="col-lg-4 d-none d-lg-inline mb-3 mb-md-0">
                        <router-link :to="{name: 'home'}" class="text-decoration-none">
                            <img :src="'/images/logo.webp'" class="img-fluid" alt="logo">
                        </router-link>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                        <div class="position-relative w-100">
                            <div class="position-absolute top-50 start-0 translate-middle-y ps-3">
                                <i class="bi bi-search"></i>
                            </div>
                            <input type="text" name="keyword" class="form-control py-3 ps-5"
                                   placeholder="Product search here..." required autocomplete="new-keyword">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex justify-content-end align-items-center">
                        <select name="currency" id="currency"
                                class="form-select p-3 width-120">
                            <option value="euro"> Euro</option>
                            <option value="pound"> Pound</option>
                            <option value="dollar"> Dollar</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg fw-medium bg-light p-3 sticky-top z-3">
        <div class="container">
            <router-link :to="{name: 'home'}" class="navbar-brand d-lg-none">
                <img :src="'/images/logo.webp'" class="img-fluid" alt="logo">
            </router-link>
            <button class="navbar-toggler shadow-none px-4 py-2" type="button" @click="collapse()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-end d-inline-block d-lg-none">
                        <button type="button" class="btn btn-close border-0 p-3 icon-close" @click="collapse()"></button>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'home'}" class="nav-link" :class="{ 'active' : $route.name === 'home' , '' : $route.name !== 'home' }" @click="collapse()">
                            Home
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'about'}" class="nav-link" :class="{ 'active' : $route.name === 'about' , '' : $route.name !== 'about' }" @click="collapse()">
                            About
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'contact'}" class="nav-link" :class="{ 'active' : $route.name === 'contact' , '' : $route.name !== 'contact' }" @click="collapse()">
                            Contact
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'blog'}" class="nav-link" :class="{ 'active' : $route.name === 'blog' , '' : $route.name !== 'blog' }" @click="collapse()">
                            Blog
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'shop'}" class="nav-link" :class="{ 'active' : $route.name === 'shop' , '' : $route.name !== 'shop' }" @click="collapse()">
                            Shop
                        </router-link>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="mb-1" v-if="UserInfo === null">
                                <router-link :to="{name: 'login'}" class="dropdown-item" :class="{ 'active' : $route.name === '' }">
                                    Login
                                </router-link>
                            </li>
                            <li v-if="UserInfo === null">
                                <router-link :to="{name: 'registration'}" class="dropdown-item" :class="{ 'active' : $route.name === '' }">
                                    Registration
                                </router-link>
                            </li>
                            <li class="mb-1" v-if="UserInfo !== null">
                                <router-link :to="{name: 'details'}" class="dropdown-item" :class="{ 'active' : $route.name === '' }">
                                    {{UserInfo?.name}}
                                </router-link>
                            </li>
                            <li class="mb-1" v-if="UserInfo !== null">
                                <router-link :to="{name: 'settings'}" class="dropdown-item" :class="{ 'active' : $route.name === '' }">
                                    Settings
                                </router-link>
                            </li>
                            <li v-if="UserInfo !== null">
                                <button type="button" class="dropdown-item" @click="profileLogout()" v-if="!loading">
                                    Logout
                                </button>
                                <button type="button" class="dropdown-item" v-if="loading">
                                    Logout
                                </button>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'cart'}" class="nav-link" @click="collapse()">
                            Cart (03)
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</template>

<script>

import serviceApi from "../../../api/serviceApi.js";
import routeApi from "../../../api/routeApi.js";
import axios from "axios";
import {createToaster} from "@meforma/vue-toaster";
const toaster = createToaster({
    position: 'top-right',
});

export default {
    data() {
        return {
            UserInfo: window.core.UserInfo,
            loading: false,
        }
    },
    mounted() {

    },
    methods: {

        /* Function to collapse in navbar responsive */
        collapse() {
            if (window.innerWidth < 991) {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                } else {
                    navbarCollapse.classList.add('show');
                }
            }
        },

        /* Function of profile logout */
        profileLogout() {
            serviceApi.ClearErrorHandler();
            this.loading = true;
            axios.get(routeApi.userLogout, null, { headers: serviceApi.headerContent }).then((response) => {
                if (response.data) {
                    this.loading = false;
                    window.location.reload();
                    toaster.info('Logout Successfully');
                }
            }).catch(err => {
                this.loading = false;
                let res = err?.response;
                if (res?.data?.errors !== undefined) {
                    this.error = res?.data?.errors;
                } else {
                    toaster.error('Service error!');
                }
            });
        },

    }
}

</script>
