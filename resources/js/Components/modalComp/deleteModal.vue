<template>
    <div
        class="flex items-center h-[100vh] justify-center bg-black/60 fixed w-full left-0 top-0 right-0 bottom-0"
    >
        <div
            class="w-11/12 bg-white rounded-md h-fit sm:w-6/12 md:w-5/12 lg:w-4/12"
        >
            <div class="flex justify-end p-2">
                <XMarkIcon
                    @click="cancel"
                    class="w-4 h-4 hover:text-red-500 cursor-pointer transition-all duration-[400ms] ease-in-out"
                />
            </div>
            <hr />

            <div class="p-2 my-4 text-center">
                Are you sure you want to remove product from cart?

                <div>
                    <!-- {{ cart }} -->
                    {{ products }}
                </div>

                <!-- <div v-for="(car, index) in cart" :key="index">

                    {{ index }}
                </div> -->
            </div>
            <div class="flex items-center justify-end p-2 space-x-4">
                <button
                    @click="cancel"
                    class="border px-4 py-1 rounded border-blue-[#f68b1e] bg-[#f68b1e] text-white capitalize"
                >
                    cancel
                </button>
                <!-- <div v-for="(car, index) in cart" :key="index">
                    {{ index }} -->
                <button
                    @click="deleteItem(products)"
                    class="px-4 py-1 text-white capitalize bg-red-500 border border-red-500 rounded"
                >
                    delete
                </button>
                <!-- </div> -->
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { XMarkIcon } from "@heroicons/vue/24/outline";
import { defineComponent, ref } from "vue";
import Carts from "../cart/carts.vue";

export default defineComponent({
    components: { XMarkIcon },
    props: {
        products: {
            type: Object,
        },
    },
    emits: ["cancel", "removeCart"],
    setup(props, { emit }) {
        const cancel = () => {
            emit("cancel");
        };
        const deleteItem = (id: number) => {
            console.log("modal", id);
            // const show = props.cart?.filter((item) => item.id === id);
            // // props.cart.splice(carts, 1);
            // console.log("show: ", show);

            emit("removeCart", id);
        };
        return { cancel, deleteItem };
    },
});
</script>

<style scoped></style>
