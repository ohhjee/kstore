<template>
    <Head title="cart"></Head>
    <authenticated-layout :user="user" :cart="cart">
        <carts
            :cart="cart"
            :product="product"
            :total="total"
            :nigeria="nigeria"
        />
    </authenticated-layout>
</template>

<script lang="ts">
import Carts from "@/Components/cart/carts.vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { defineComponent, ref } from "vue";

export default defineComponent({
    components: { Head, AuthenticatedLayout, Carts },
    props: {
        cart: {
            type: Object,
            required: true,
        },
        product: {
            type: Object,
            required: true,
        },
        total: {
            type: Number,
            required: true,
        },
        user: {
            type: Object,
        },
        // count: {
        //     type: Array,
        // },
        // q: {
        //     type: Array,
        // },
    },
    setup(props) {
        const counter = ref();
        // console.log(props.count[0].id);

        // console.log(
        //     Object.keys(props.cart).map((key) => [key, props.cart[key]])
        // );

        // console.log(counter);

        // const mapped = Object.entries(props.cart[1]).map((res) => {
        // res;
        // // });
        // const cartCount = Object.keys(props.cart);
        // cartCount.forEach((key, index) => {
        //     console.log(`${key}:${props.cart}`);
        // });
        // for (const key in props.cart) {
        //     if (props.cart.hasOwnProperty(key))
        //         console.log(`${key}:${props.cart[key]}`);
        // }
        // console.log(mapped);

        interface IsCurrency {
            currency: string;
            style: string;
        }
        const nigeria = new Intl.NumberFormat("en-NG", {
            style: "currency",
            currency: "NGN",
        });
        return { nigeria, counter };
    },
});
</script>

<style scoped></style>
