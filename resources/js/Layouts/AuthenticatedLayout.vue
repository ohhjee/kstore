<template>
    <div class>
        <Header />
        <NavbarVue :user="user" :cart="cart" :count="count" />
        <main class="container mx-auto px-4 sm:px-0">
            <slot></slot>
        </main>
    </div>
</template>

<script lang="ts">
import Header from "@/Components/Header/Header.vue";
import NavbarVue from "@/Components/Navbar.vue";
import { defineComponent } from "vue";

export default defineComponent({
    components: { NavbarVue, Header },
    props: {
        user: {
            type: Object,
        },
        cart: {
            type: Object,
        },
        count: {
            type: Array,
        },
    },
    setup(props) {
        // console.log(props.user);

        return {};
    },
});
</script>

<style scoped></style>
