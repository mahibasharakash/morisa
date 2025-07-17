<template>

    <!-- Banner using owl carousel with jquery -->
    <section class="py-5">
        <div class="container">
            <div class="banner-owl-carousel owl-carousel owl-theme">
                <template v-for="each in sliderData">
                    <div class="item">
                        <div class="position-relative">
                            <img :src="each.file_path" class="img-fluid" alt="banner-1">
                            <div class="position-absolute top-0 bottom-0 start-0 d-flex justify-content-center align-items-start flex-column z-1">
                                <div class="col-md-8 p-5">
                                    <div class="small mb-2 fw-bold text-uppercase"> {{each.category}} <br> NEW COLLECTION </div>
                                    <div class="fs-3 mb-2 text-uppercase"> {{each.short_title}} </div>
                                    <div class="fs-1 fw-bold mb-2 text-uppercase"> {{each.fashion_type}} FASHION</div>
                                    <div class="text-secondary mb-4 line-height-2">
                                        {{each.short_description}}
                                    </div>
                                    <router-link :to="{name:'shop',query:{category:each.category}}" class="btn btn-outline-dark px-4 px-md-5 py-2 py-md-3 rounded-0">
                                        SHOP NOW
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Who we are -->
    <section class="py-5">
        <div class="container">
            <div class="py-4 w-100" v-if="aboutData">
                <div class="mb-3 text-center fw-bold text-light-gray"> {{aboutData.title}} </div>
                <div class="fs-1 text-center fw-medium mb-3"> {{aboutData.subTitle}} </div>
                <div class="d-flex justify-content-center mb-3">
                    <img :src="aboutData.file_path" class="img-fluid" alt="barrier">
                </div>
                <div class="text-center text-light-gray md-3 my-md-5 line-height-2">
                    {{aboutData.description}}
                </div>
                <div class="text-center">
                    <span class="fw-bold text-uppercase"> {{aboutData.person}} </span> - <span class="text-secondary text-uppercase"> {{aboutData.designation}} MIMOSA </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop By Collections -->
    <section class="py-5">
        <div class="container">
            <div class="py-4 w-100">
                <div class="fs-1 text-center fw-medium mb-4"> Shop By Collections </div>
                <div class="collection-owl-carousel owl-carousel owl-theme">
                    <template v-for="each in shop_collection">
                        <div class="item">
                            <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                <img :src="each.file_path" class="img-fluid object-fit-contain" alt="product-01">
                                <div class="text-center my-3 text-secondary text-opacity-75"> {{each.product_count}} products</div>
                                <div class="text-center my-3 text-dark"> {{each.category}} </div>
                            </router-link>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5">
        <div class="container">
            <div class="py-4 w-100">
                <div class="fs-1 text-center fw-medium mb-3">
                    Featured Products
                </div>
                <div class="text-secondary text-opacity-75 text-center d-flex justify-content-center my-4">
                    <div class="col-md-6 col-xl-5 mb-3 line-height-2" v-if="featured_products.short_description">
                        {{featured_products.short_description}}
                    </div>
                </div>
                <div class="gallery w-100">
                    <div class="d-flex justify-content-center align-items-center flex-wrap mb-4">
                        <template v-for="each in featured_products.category">
                            <button type="button" class="btn border-0 bg-dark text-white px-4 py-2 mx-2 rounded-0">
                                {{each}}
                            </button>
                        </template>
                    </div>
                    <div class="feature-product-owl-carousel owl-carousel owl-theme">
                        <template v-for="each in featured_products.products">
                            <div class="p-1">
                                <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                    <div class="position-relative">
                                        <img :src="each.file_path" class="img-fluid object-fit-contain" alt="product ">
                                        <div class="position-absolute top-0 end-0 p-3">
                                            <div class="width-60 height-60 rounded-circle bg-dark d-flex justify-content-center align-items-center text-white">
                                                {{each.type}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center py-3">
                                        <div class="text-light-gray-hover cursor-pointer">
                                            {{each.fabric}}
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <i class="bi bi-star-fill text-warning mx-1"></i>
                                            <i class="bi bi-star-fill text-warning mx-1"></i>
                                            <i class="bi bi-star-fill text-warning mx-1"></i>
                                            <i class="bi bi-star-fill text-warning mx-1"></i>
                                            <i class="bi bi-star-fill text-warning mx-1"></i>
                                        </div>
                                    </div>
                                    <div class="py-3 fs-6 fw-bold line-height-2 text-dark">
                                        {{each.short_description}}
                                    </div>
                                    <div class="fs-4 text-secondary text-opacity-75">
                                        ${{parseFloat(each.price).toFixed(2)}}
                                    </div>
                                </router-link>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Explore every part of this products -->
    <section class="py-5">
        <div class="bg-light w-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 d-flex justify-content-end pt-5" v-if="overViewContent.file_path">
                        <img :src="overViewContent.file_path" class="img-fluid" alt="overview">
                    </div>
                    <div class="col-md-6 py-3">
                        <div class="fs-1 fw-bold mb-2" v-if="overViewContent.title">
                            {{overViewContent.title}}
                        </div>
                        <div class="text-light-gray mb-2 line-height-2" v-if="overViewContent.short_description">
                            {{overViewContent.short_description}}
                        </div>
                        <button type="button" class="btn border-0 d-flex justify-content-start align-items-center">
                            <i class="bi bi-play-circle-fill me-1 fs-1 my-0"></i> <span class="fs-4 ms-2 my-0"> Play Details </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features product -->
    <section class="py-5">
        <div class="bg-white w-100">
            <div class="container">
                <div class="row">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3">
                        <div class="p-3">

                            <!-- On sale -->
                            <div class="row mb-4">
                                <div class="col-7">
                                    <div class="fw-medium fs-4"> On Sale </div>
                                </div>
                                <div class="col-5">
                                    <hr class="border border-secondary w-100">
                                </div>
                            </div>

                            <!-- On sale carousel -->
                            <div class="on-sale-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <template v-for="each in categories_product.on_sale.slice(0, 3)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                                <div class="item">
                                    <template v-for="each in categories_product.on_sale.slice(3, 6)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                                <div class="item">
                                    <template v-for="each in categories_product.on_sale.slice(6, 9)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                            </div>

                        </div>
                        <div class="p-3">

                            <!-- Latest arrivals -->
                            <div class="row mb-4">
                                <div class="col-7">
                                    <div class="fw-medium fs-4"> Latest Arrivals </div>
                                </div>
                                <div class="col-5">
                                    <hr class="border border-secondary w-100">
                                </div>
                            </div>

                            <!-- Latest arrivals carousel -->
                            <div class="latest-arrival-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <template v-for="each in categories_product.latest_arrivals.slice(0, 3)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                                <div class="item">
                                    <template v-for="each in categories_product.latest_arrivals.slice(3, 6)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                                <div class="item">
                                    <template v-for="each in categories_product.latest_arrivals.slice(6, 9)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                            </div>

                        </div>
                        <div class="p-3">

                            <!-- Top viewed -->
                            <div class="row mb-4">
                                <div class="col-7">
                                    <div class="fw-medium fs-4"> Top Viewed</div>
                                </div>
                                <div class="col-5">
                                    <hr class="border border-secondary w-100">
                                </div>
                            </div>

                            <!-- Top viewed carousel -->
                            <div class="top-viewed-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <template v-for="each in categories_product.top_view.slice(0, 3)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                                <div class="item">
                                    <template v-for="each in categories_product.top_view.slice(3, 6)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                                <div class="item">
                                    <template v-for="each in categories_product.top_view.slice(6, 9)">
                                        <router-link :to="{name:'singleProduct',params:{id:each.id}}" class="text-decoration-none">
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <img :src="each.file_path" class="img-fluid" alt="product">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="text-secondary text-opacity-75"> {{each.category}} </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                                <i class="mx-1 bi bi-star-fill text-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="py-1 fw-bold line-height-2 text-dark">
                                                            {{each.title}}
                                                        </div>
                                                        <div class="d-flex align-items-center small">
                                                            <span class="text-secondary me-3"> {{parseFloat(each.price).toFixed(2)}} </span>
                                                            <span class="text-danger"> {{(parseFloat(each.price) * 0.8).toFixed(2)}} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </template>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Arrival & products amazing -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="position-relative w-100 background-effect overflow-hidden">
                        <div class="overflow-hidden before-effect">
                            <img :src="`/images/banner/banner-6.jpg`"
                                 class="img-fluid object-fit-cover w-100 height-320 image-effect extra-effect" alt="">
                        </div>
                        <div
                            class="position-absolute top-0 bottom-0 start-0 p-3 d-flex justify-content-start align-items-center z-1">
                            <div class="p-3 col-md-8">
                                <div class="fw-bold small mb-3"> New Arrivals</div>
                                <div class="fw-medium fs-3 mb-3 line-height-2"> White Sneakers For Men’s</div>
                                <div class="mt-3">
                                    <router-link :to="{name: 'shop'}" class="text-decoration-none text-dark border-bottom border-2 border-dark pb-1 fw-bold">
                                        SHOP NOW
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="position-relative w-100 background-effect overflow-hidden">
                        <div class="overflow-hidden before-effect">
                            <img :src="`/images/banner/banner-7.jpg`"
                                 class="img-fluid object-fit-cover w-100 height-320 image-effect extra-effect" alt="">
                        </div>
                        <div
                            class="position-absolute top-0 bottom-0 start-0 p-3 d-flex justify-content-start align-items-center z-1">
                            <div class="p-3 col-md-8">
                                <div class="fw-bold small mb-3">Products amazing!</div>
                                <div class="fw-medium fs-3 mb-3 line-height-2"> Short T-Shirts For Women’s</div>
                                <div class="mt-3">
                                    <router-link :to="{name: 'shop'}" class="text-decoration-none text-dark border-bottom border-2 border-dark pb-1 fw-bold">
                                        SHOP NOW
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Boxes -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                    <div class="mb-4">
                        <img :src="`/images/boxes/box-1.webp`" class="width-75 height-75" alt="box 1">
                    </div>
                    <div class="mb-3">
                        <div class="fw-bold"> Free Shipping Worldwide</div>
                    </div>
                    <div class="text-center text-secondary text-opacity-75 px-4 line-height-2">
                        Mirum est notare quam littera gothica, quam nunc putamus parum claram
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                    <div class="mb-4">
                        <img :src="`/images/boxes/box-2.webp`" class="width-75 height-75" alt="box 2">
                    </div>
                    <div class="mb-3">
                        <div class="fw-bold"> Money Back Guarantee</div>
                    </div>
                    <div class="text-center text-secondary text-opacity-75 px-4 line-height-2">
                        Mirum est notare quam littera gothica, quam nunc putamus parum claram
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center flex-column">
                    <div class="mb-4">
                        <img :src="`/images/boxes/box-3.webp`" class="width-75 height-75" alt="box 3">
                    </div>
                    <div class="mb-3">
                        <div class="fw-bold"> Online Support 24/7</div>
                    </div>
                    <div class="text-center text-secondary text-opacity-75 px-4 line-height-2">
                        Mirum est notare quam littera gothica, quam nunc putamus parum claram
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <hr class="w-100 border">
            </div>
        </div>
    </section>

    <!-- From Our Blog -->
    <section class="py-5">
        <div class="container">
            <div class="fs-1 text-center fw-medium mb-3">
                From Our Blog
            </div>
            <div class="d-flex justify-content-center text-center">
                <div class="col-lg-6 text-secondary text-opacity-75 mb-4 line-height-2">
                    Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                    formas.
                </div>
            </div>
            <div class="blog-owl-carousel owl-carousel owl-theme">
                <div class="item p-3 background-effect">
                    <div class="position-relative overflow-hidden">
                        <img :src="`/images/blog/blog-1.jpg`" class="img-fluid object-fit-cover height-350 image-effect"
                             alt="blog 1">
                        <div class="position-absolute top-0 end-0 p-3">
                            <div class="px-4 py-3 bg-white shadow-sm fw-bold text-center">
                                <div class="text-light-gray"> AUG</div>
                                <div class="fs-4"> 12</div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 fw-medium fs-5"> Bypi non habent claritatem insitam.</div>
                    <div class="pb-3 text-secondary text-opacity-75"> HasTech</div>
                    <div class="pb-3 text-opacity-75 text-secondary line-height-2">
                        Aypi non habent claritatem insitam. Aypi non habent claritatem
                        insitam. Aypi non habent claritatem insitam.Aypi non habent
                        claritatem insitam. Aypi non habent claritatem insitam.
                    </div>
                    <router-link :to="{name: 'singleBlog',params:{id:'1'}}"
                                 class="pb-1 text-decoration-none text-light-gray-hover">
                        Read more . . .
                    </router-link>
                </div>
                <div class="item p-3 background-effect">
                    <div class="position-relative overflow-hidden">
                        <img :src="`/images/blog/blog-2.jpg`" class="img-fluid object-fit-cover height-350 image-effect"
                             alt="blog 2">
                        <div class="position-absolute top-0 end-0 p-3">
                            <div class="px-4 py-3 bg-white shadow-sm fw-bold text-center">
                                <div class="text-light-gray"> AUG</div>
                                <div class="fs-4"> 12</div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 fw-medium fs-5"> Bypi non habent claritatem insitam.</div>
                    <div class="pb-3 text-secondary text-opacity-75"> HasTech</div>
                    <div class="pb-3 text-opacity-75 text-secondary line-height-2">
                        Aypi non habent claritatem insitam. Aypi non habent claritatem
                        insitam. Aypi non habent claritatem insitam.Aypi non habent
                        claritatem insitam. Aypi non habent claritatem insitam.
                    </div>
                    <router-link :to="{name: 'singleBlog',params:{id:'1'}}"
                                 class="pb-1 text-decoration-none text-light-gray-hover">
                        Read more . . .
                    </router-link>
                </div>
                <div class="item p-3 background-effect">
                    <div class="position-relative overflow-hidden">
                        <img :src="`/images/blog/blog-3.jpg`" class="img-fluid object-fit-cover height-350 image-effect"
                             alt="blog 3">
                        <div class="position-absolute top-0 end-0 p-3">
                            <div class="px-4 py-3 bg-white shadow-sm fw-bold text-center">
                                <div class="text-light-gray"> AUG</div>
                                <div class="fs-4"> 12</div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 fw-medium fs-5"> Bypi non habent claritatem insitam.</div>
                    <div class="pb-3 text-secondary text-opacity-75"> HasTech</div>
                    <div class="pb-3 text-opacity-75 text-secondary line-height-2">
                        Aypi non habent claritatem insitam. Aypi non habent claritatem
                        insitam. Aypi non habent claritatem insitam.Aypi non habent
                        claritatem insitam. Aypi non habent claritatem insitam.
                    </div>
                    <router-link :to="{name: 'singleBlog',params:{id:'1'}}"
                                 class="pb-1 text-decoration-none text-light-gray-hover">
                        Read more . . .
                    </router-link>
                </div>
            </div>
        </div>
    </section>

</template>

<script>

export default {
    data() {
        return {
            sliderData: [
                {
                    id: 1,
                    file_path: '/images/banner/banner-5.jpg',
                    category: 'CLOTHING',
                    short_title: 'NEW ARRIVALS!',
                    fashion_type: 'SUMMER',
                    short_description: 'We crack for this purely rock style with stitched quills in relief and metallic hardware.'
                },
                {
                    id: 2,
                    file_path: '/images/banner/banner-4.jpg',
                    category: 'T-SHIRT',
                    short_title: 'CLEAN & ELEGANT!',
                    fashion_type: 'MODERN',
                    short_description: 'BlackBird collection of minimal, sleek and functional Carryalls were designed with creatives in mind.'
                },
            ],
            aboutData: {
                title: 'Who Are We',
                subTitle: 'Welcome To Mimosa',
                description: 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.',
                file_path: '/images/barrier.webp',
                person: 'John Doe',
                designation: 'CEO',
            },
            shop_collection: [
                {
                    id: 1,
                    file_path: '/images/product/product-01.jpg',
                    product_count: '03',
                    category: 'Sweaters',
                },
                {
                    id: 2,
                    file_path: '/images/product/product-02.jpg',
                    product_count: '09',
                    category: 'Jackets',
                },
                {
                    id: 3,
                    file_path: '/images/product/product-03.jpg',
                    product_count: '01',
                    category: 'Porridge',
                },
                {
                    id: 4,
                    file_path: '/images/product/product-04.jpg',
                    product_count: '05',
                    category: 'T-Shirt',
                },
                {
                    id: 5,
                    file_path: '/images/product/product-05.jpg',
                    product_count: '07',
                    category: 'Accessories',
                },
            ],
            featured_products: {
                short_description: '',
                categories: [ 'Clothing', 'Handbags', 'Shoes', 'Accessories' ],
                products: [
                    {
                        id: 1,
                        file_path: '/images/product/product-04.jpg',
                        type: 'Sale',
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 98
                    },
                    {
                        id: 2,
                        file_path: '/images/product/product-05.jpg',
                        type: null,
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 94
                    },
                    {
                        id: 3,
                        file_path: '/images/product/product-06.jpg',
                        type: 'Sale',
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 64
                    },
                    {
                        id: 4,
                        file_path: '/images/product/product-07.jpg',
                        type: null,
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 39
                    },
                    {
                        id: 5,
                        file_path: '/images/product/product-08.jpg',
                        type: 'Sale',
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 32
                    },
                    {
                        id: 6,
                        file_path: '/images/product/product-09.jpg',
                        type: null,
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 89
                    },
                    {
                        id: 7,
                        file_path: '/images/product/product-10.jpg',
                        type: 'Sale',
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 73
                    },
                    {
                        id: 8,
                        file_path: '/images/product/product-11.jpg',
                        type: null,
                        fabric: 'Chanel',
                        short_description: 'Dopo Designs Woolrich Klettersack Backpack',
                        price: 42
                    },
                ],
            },
            overViewContent: {
                file_path: '/images/overview.webp',
                title: 'EXPLORE EVERY PART OF THIS PRODUCTS',
                short_description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            },
            categories_product: {
                on_sale: [
                    {
                        id: 1,
                        file_path: '/images/product/product-01.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 2,
                        file_path: '/images/product/product-02.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 3,
                        file_path: '/images/product/product-03.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 4,
                        file_path: '/images/product/product-04.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 5,
                        file_path: '/images/product/product-05.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 6,
                        file_path: '/images/product/product-06.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 7,
                        file_path: '/images/product/product-07.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 8,
                        file_path: '/images/product/product-08.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 9,
                        file_path: '/images/product/product-09.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 10,
                        file_path: '/images/product/product-10.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                ],
                latest_arrivals: [
                    {
                        id: 1,
                        file_path: '/images/product/product-01.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 2,
                        file_path: '/images/product/product-02.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 3,
                        file_path: '/images/product/product-03.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 4,
                        file_path: '/images/product/product-04.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 5,
                        file_path: '/images/product/product-05.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 6,
                        file_path: '/images/product/product-06.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 7,
                        file_path: '/images/product/product-07.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 8,
                        file_path: '/images/product/product-08.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 9,
                        file_path: '/images/product/product-09.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 10,
                        file_path: '/images/product/product-10.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                ],
                top_view: [
                    {
                        id: 1,
                        file_path: '/images/product/product-01.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 2,
                        file_path: '/images/product/product-02.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 3,
                        file_path: '/images/product/product-03.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 4,
                        file_path: '/images/product/product-04.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 5,
                        file_path: '/images/product/product-05.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 6,
                        file_path: '/images/product/product-06.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 7,
                        file_path: '/images/product/product-07.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 8,
                        file_path: '/images/product/product-08.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 9,
                        file_path: '/images/product/product-09.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                    {
                        id: 10,
                        file_path: '/images/product/product-10.jpg',
                        title: 'Copo Designs Woolrich',
                        category: 'H&M',
                        price: '100',
                    },
                ]
            },
        }
    },
    mounted() {
        this.bannerOwlCarousel();
        this.collectionOwlCarousel();
        this.featureProductOwlCarousel();
        this.blogOwlCarousel();
        this.onSaleOwlCarousel();
        this.latestArrivalOwlCarousel();
        this.topViewedOwlCarousel();
    },
    methods: {

        /* Function to banner owl carousel */
        bannerOwlCarousel() {
            $('.banner-owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                animateOut: 'fadeOut',
                // autoplay: true,
                // autoplaySpeed: 7000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        },

        /* Function to collection owl carousel */
        collectionOwlCarousel() {
            $('.collection-owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                // autoplay: true,
                slideTransition: 'linear',
                // autoplaySpeed: 4000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    991: {
                        items: 3
                    },
                    1200: {
                        items: 5
                    }
                }
            })
        },

        /* Function to feature product owl carousel */
        featureProductOwlCarousel() {
            $('.feature-product-owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                // autoplay: true,
                slideTransition: 'linear',
                // autoplaySpeed: 4000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    991: {
                        items: 3
                    },
                    1200: {
                        items: 5
                    }
                }
            })
        },

        /* Function to blog owl carousel */
        blogOwlCarousel() {
            $('.blog-owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                // autoplay: true,
                slideTransition: 'linear',
                // autoplaySpeed: 4000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    991: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            })
        },

        /* Function to on sale owl carousel */
        onSaleOwlCarousel() {
            $('.on-sale-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                // autoplay: true,
                slideTransition: 'linear',
                // autoplaySpeed: 4000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        },

        /* Function to the latest arrival owl carousel */
        latestArrivalOwlCarousel() {
            $('.latest-arrival-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                // autoplay: true,
                slideTransition: 'linear',
                // autoplaySpeed: 4000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        },

        /* Function to top viewed owl carousel */
        topViewedOwlCarousel() {
            $('.top-viewed-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                // autoplay: true,
                slideTransition: 'linear',
                // autoplaySpeed: 4000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        },

    }
}

</script>
