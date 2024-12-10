<template>
    <!-- <Head>{{ products }}</Head> -->
    <div>
        <div
            class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-[3rem] px-4 lg:px-0 mb-4"
        >
            <div class="w-full col-span-3 bg-white rounded shadow">
                <div class="grid grid-cols-3 gap-4">
                    <div class="w-full">
                        <div class="w-full h-full p-4">
                            <img
                                :src="'http://kstore.test/' + products?.image"
                                class="w-full h-full rounded-md"
                                alt=""
                            />
                        </div>
                    </div>
                    <div class="w-full col-span-2 p-2">
                        <div
                            class="grid items-center grid-cols-6 place-content-center"
                        >
                            <div class="col-span-5">
                                <div class="flex items-center space-x-2">
                                    <div
                                        class="bg-[#276076] text-[.8rem] text-white p-1 rounded"
                                    >
                                        official store
                                    </div>
                                    <div
                                        class="text-[.6rem] p-1 text-white rounded bg-[#f68b1e]"
                                    >
                                        free delivery
                                    </div>
                                </div>
                            </div>
                            <div class="grid place-content-end">
                                <i
                                    @click="addFavorite(products)"
                                    :class="[]"
                                    class="fa-regular fa-heart text-[#f68b1e]"
                                ></i>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div
                                class="text-[1rem] sm:text-[2rem] capitalize text-[#313133]"
                            >
                                {{ products?.title }}
                            </div>
                            <div>
                                <div
                                    class="flex flex-col sm:items-center sm:flex-row sm:space-x-2"
                                >
                                    <div class="flex items-center">
                                        <span class="mr-2">Brand:</span>
                                        <span class="text-[.7rem]">
                                            {{ products?.brand }}
                                        </span>
                                    </div>
                                    <div class=""></div>
                                    <div class="text-[.7rem]">
                                        Similar products from
                                        {{ products?.brand }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FLASH SALE SECTION -->
                        <div class="my-2">
                            <div class="border border-[#e61601] rounded">
                                <div
                                    v-if="products?.brand == 'Samsung'"
                                    class="bg-[#e61601] px-2 py-1"
                                >
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <div
                                            class="text-[.9rem] capitalize text-white"
                                        >
                                            flash sales
                                        </div>
                                        <div
                                            class="text-[.9rem] capitalize text-white"
                                        >
                                            time left: 19h : 07m : 40s
                                        </div>
                                    </div>
                                </div>
                                <div class="px-2 py-1">
                                    <div class="flex items-center space-x-1">
                                        <div
                                            class="font-bold text-[1.5rem] text-[#313133]"
                                        >
                                            {{
                                                nigeria
                                                    .format(products?.price)
                                                    .replace(/(\.|,)00$/g, "")
                                            }}
                                        </div>
                                        <div>
                                            <s
                                                class="text-[1rem] text-[#75757a]"
                                            >
                                                ₦ 130,000
                                            </s>
                                        </div>
                                    </div>
                                    <div class="text-[.75rem]">
                                        {{ products?.stock }} items left
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <!-- <form> -->
                                <div v-if="loading">
                                    <Btn
                                        disabled
                                        class="cursor-not-allowed"
                                        btn="out-of-stock"
                                        type="button"
                                    >
                                        <spinner />
                                    </Btn>
                                </div>
                                <div v-else>
                                    <Btn
                                        v-if="products?.stock > 0"
                                        disabled
                                        btn="jumia-color"
                                        type="submit"
                                        @click="addToCart"
                                    >
                                        Add to cart
                                    </Btn>
                                    <Btn
                                        v-else
                                        disabled
                                        class="cursor-not-allowed"
                                        btn="out-of-stock"
                                        type="button"
                                    >
                                        out of stock
                                    </Btn>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div>lrem</div> -->
                </div>
            </div>
            <div class="w-full col-span-2 lg:col-span-1">
                <deliveryArrive />
            </div>
            <div class="w-full col-span-3 bg-white rounded shadow">
                <div class="">
                    <div id="title" class="p-2">product details</div>
                    <hr class="mt-0 mb-2" />
                    <div class="px-2">
                        <div
                            v-html="products?.description"
                            class="text-[.8rem]"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import Btn from "../btn/btn.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Spinner from "../spinner/spinner.vue";
import deliveryArrive from "./delivery-arrive.vue";
import store from "@/store";

export default defineComponent({
    components: { Btn, Head, Spinner, deliveryArrive },
    props: {
        products: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const loading = ref(false);
        const datas = useForm(props.products);
        const nigeria = new Intl.NumberFormat("en-NG", {
            style: "currency",
            currency: "NGN",
        });

        const addFavorite = (product: number[]) => {
            // TODO:: ADD FAVORITE TO LS
            // localStorage.setItem("fav", JSON.stringify([product.id]));
        };
        const addToCart = async () => {
            loading.value = true;
            await datas.post(route("cart.addToCart", props.products?.id), {
                onFinish: () => {
                    loading.value = false;
                },
            });
        };
        return { loading, addToCart, datas, addFavorite, nigeria };
    },
});
</script>

<style scoped></style>
