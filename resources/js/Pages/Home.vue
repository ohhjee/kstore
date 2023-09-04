<template>
    <Head>
        <title>Home</title>
    </Head>
    <div>
        <AuthenticatedLayoutVue>
            <HomeHeader />
            <Products :product="product" />
        </AuthenticatedLayoutVue>
    </div>
</template>

<script lang="ts">
import AuthenticatedLayoutVue from "@/Layouts/AuthenticatedLayout.vue";
import { defineComponent } from "vue";
import { Head } from "@inertiajs/vue3";
import HomeHeader from "@/Components/homeHeader/HomeHeader.vue";
import Products from "@/Components/products/products.vue";

export default defineComponent({
    components: { AuthenticatedLayoutVue, Head, HomeHeader, Products },
    props: {
        user: {
            type: Object,
        },
        product: {
            type: Array,
        },
    },
    setup(props) {
        return {};
    },
});
</script>

<style scoped></style>
