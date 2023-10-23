<template>
    <Head>
        <title>Home</title>
    </Head>
    <div>
        <AuthenticatedLayoutVue :user="user" :cart="cart">
            <HomeHeader />

            <Products :product="product" />
        </AuthenticatedLayoutVue>
    </div>
</template>

<script lang="ts">
import AuthenticatedLayoutVue from "@/Layouts/AuthenticatedLayout.vue";
import { computed, defineComponent, ref } from "vue";
import { Head } from "@inertiajs/vue3";
import HomeHeader from "@/Components/homeHeader/HomeHeader.vue";
import Products from "@/Components/products/products.vue";
import store from "@/store";
import { useStore } from "vuex";

export default defineComponent({
    components: { AuthenticatedLayoutVue, Head, HomeHeader, Products },
    props: {
        user: {
            type: Object,
        },
        product: {
            type: Array,
        },
        cart: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        console.log(Object.keys(props.cart));
        // console.log(props.cart);

        // const User =  computed(()=>{
        //     ...mapGetters(['auth'])
        // })
        // computed: mapGetters(["auth", "product"]);
        // const store = useStore();
        // const auth = computed(() => store.getters.product);
        // console.log("Auth", auth);
    },
});
</script>

<style scoped></style>
