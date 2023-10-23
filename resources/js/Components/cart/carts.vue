<template>
    <div class="mt-4">
        <!-- <div v-if="Object.keys(cart).length >= 1">
            {{ product }}
        </div>
        <div v-else>nortin</div> -->
        <div class="mb-4" v-if="Object.keys(cart).length >= 1">
            <div class="rounded grid md:grid-cols-4 gap-4 relative">
                <div class="col-span-3 gap-y-4 grid">
                    <!-- cart-> ({{ cart }})
                    <br />
                    product ({{ product }}) -->

                    <div
                        class="gap-4 bg-white p-4"
                        v-for="carts in product"
                        :key="carts.id"
                    >
                        <div class="grid grid-cols-2 md:grid-cols-9 gap-4">
                            <div class="h-[15vh] md:order-1">
                                <img
                                    :src="carts?.image"
                                    class="h-full w-full col-span-2 object-left object-cover"
                                    alt=""
                                />
                            </div>
                            <div
                                class="order-3 md:order-2 col-span-1 md:col-span-6 h-fit"
                            >
                                <div>
                                    {{ carts?.description }}
                                </div>
                                <div class="text-[.7rem] text-[#f68b1e]">
                                    Few units left
                                </div>
                            </div>
                            <div
                                class="col-span-1 md:col-span-2 text-end md:order-3"
                            >
                                <!-- PRODUCT PRICE -->
                                {{ nigeria.format(carts?.price) }}
                            </div>
                        </div>
                        <!-- DELETE ITEM FRO CART -->
                        <div class="mt-4 grid grid-cols-2 gap-3">
                            <div
                                class="text-[#f68b1e] text-[.8rem] flex items-start w-fit"
                                @click="removeCartModal"
                            >
                                <TrashIcon class="w-5 h-5" />
                                <span class="uppercase cursor-pointer"
                                    >remove</span
                                >
                            </div>
                            <div class="text-end">
                                <form class="flex items-center justify-end">
                                    <button
                                        class="text-[.8em] bg-[#f68b1e] h-6 w-6 rounded-[3px] text-white"
                                    >
                                        <MinusIcon
                                            class="w-3 flex items-center justify-center h-3 mx-auto"
                                        />
                                    </button>

                                    <div>
                                        <!-- <input
                                            type="text"
                                            class="text-center"
                                            :value="carter.quantity"
                                            name=""
                                            id=""
                                        /> -->
                                        <!-- {{ getProductQuantity(carts.id) }} -->
                                    </div>
                                    <!-- {{ carts.id }} -->
                                    <!-- <div v-for="qs in quantity" :key="qs.id">
                                        <div
                                            v-for="(qin, index) in qs"
                                            :key="index"
                                        >
                                            {{ qin }}
                                        </div>
                                        {{ qs }}
                                    </div> -->
                                    <!-- {{ quantity }} -->
                                    <button
                                        class="text-[.8em] bg-[#f68b1e] h-6 w-6 rounded-[3px] text-white"
                                    >
                                        <PlusIcon
                                            class="w-3 flex items-center justify-center h-3 mx-auto"
                                        />
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div>
                            <Modal>
                                <deleteModalVue
                                    @cancel="cancel"
                                    @removeCart="removeCart(carts?.id)"
                                    :cart="cart"
                                    :class="[
                                        showModal
                                            ? 'transition-all duration-[500ms] ease-in-out z-20'
                                            : 'opacity-0 pointer-events-none z-[-10]',
                                        'transition-all duration-[500ms] ease-in-out',
                                    ]"
                                />
                            </Modal>
                        </div>
                    </div>
                </div>
                <!-- TOTAL PRICE  -->
                <div class="relative col-span-3 md:col-span-1">
                    <div class="bg-white rounded h-fit">
                        <div class="text-[.8rem] lg:text-[1rem] p-2">
                            cart summary
                        </div>
                        <hr />
                        <div
                            class="p-2 flex justify-between items-center text-[.8rem] lg:text-[1rem]"
                        >
                            <div class="text-capitalize">subtotal</div>
                            {{ nigeria.format(total) }}
                        </div>
                        <hr />
                        <div class="p-2">
                            <button
                                @click="proceedToCheckout"
                                class="bg-[#f68b1e] p-2 rounded-[3px] text-white w-full text-[.8rem] lg:text-[1rem]"
                            >
                                <!-- <Link :href="`/checkout/${product}`"> -->
                                checkout( {{ nigeria.format(total) }})
                                <!-- </Link> -->
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div
                class="bg-white rounded-sm shadow-sm py-7 md:py-10 w-full flex items-center justify-center"
            >
                <emptyVue />
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { TrashIcon, MinusIcon, PlusIcon } from "@heroicons/vue/24/outline";
import { Link, useForm, router } from "@inertiajs/vue3";
import { defineComponent, onMounted, ref } from "vue";
// useForm
import Modal from "../modals/modal.vue";
import Btn from "../btn/btn.vue";
import emptyVue from "./empty.vue";
import deleteModalVue from "../modalComp/deleteModal.vue";
// TrashIcon

export default defineComponent({
    components: {
        TrashIcon,
        Btn,
        MinusIcon,
        PlusIcon,
        Link,
        emptyVue,
        Modal,
        deleteModalVue,
    },

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
        nigeria: {
            type: Object,
            required: true,
        },
        count: {
            type: Object,
            required: true,
        },
        q: {
            type: Array,
            required: true,
        },
    },
    setup(props) {
        onMounted(() => {});
        console.log("this: ", props.count);
        const checkout = useForm({
            product: props.product,
            total: props.total,
            cart: props.cart,
        });
        const showModal = ref(false);
        const cancel = () => {
            showModal.value = false;
        };

        const removeCartModal = () => {
            showModal.value = true;
        };
        const getProductQuantity = () => {
            // const product = props.cart.find(
            //     (item: any) => item.product_id == id
            // );
            // const product = props.cart;
            // product.find();
            // return product.quantity;
        };
        getProductQuantity();

        const removeCart = (id: number) => {
            checkout.delete(route("cart", id));
        };

        const proceedToCheckout = () => {
            checkout.post("/checkout");
        };

        return {
            proceedToCheckout,
            getProductQuantity,
            removeCart,
            removeCartModal,
            showModal,
            cancel,
        };
    },
});
</script>
product
<style scoped></style>
