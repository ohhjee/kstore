<template>
    <Head title="product"></Head>
    <authenticated-layout :user="user" :cart="cart">
        <ProductLink :product="product" :products="products" />
        {{ product }}
    </authenticated-layout>
</template>

<script lang="ts">
import HomeHeader from "@/Components/homeHeader/HomeHeader.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { defineComponent } from "vue";
import { Head } from "@inertiajs/vue3";
import ProductLink from "@/Components/products/productLink.vue";

export default defineComponent({
    components: { AuthenticatedLayout, HomeHeader, Head, ProductLink },
    props: {
        product: {
            type: Object,
        },
        products: {
            type: Object,
        },
        user: {
            type: Object,
        },
        cart: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        console.log(props.products);

        return {};
    },
});
</script>

<style scoped></style>
