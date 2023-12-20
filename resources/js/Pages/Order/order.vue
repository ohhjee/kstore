<template>
    <Head title="order"></Head>

    <authenticated-layout :user="user" :cart="cart">
        <orderpage v-for="n in 4" :key="n" />
    </authenticated-layout>
</template>

<script lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { defineComponent } from "vue";
import { Head } from "@inertiajs/vue3";
import orderpage from "@/Components/Order/orderpage.vue";

export default defineComponent({
    components: { AuthenticatedLayout, Head, orderpage },
    props: {
        user: { type: Object },
        cart: {
            type: Object,
            required: true,
        },
    },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
