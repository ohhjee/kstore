<template>
    <div>
        <div
            class="grid grid-cols-2 lg:grid-cols-3 gap-4 mt-[3rem] px-4 lg:px-0"
        >
            <div class="w-full col-span-2 bg-white rounded shadow">
                <div class="grid grid-cols-3 gap-4">
                    <div class="w-full"></div>
                    <div class="col-span-2 w-full p-2">
                        <div
                            class="grid grid-cols-6 place-content-center items-center"
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
                                    class="fa-regular fa-heart text-[#f68b1e]"
                                ></i>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="text-[2rem] capitalize text-[#313133]">
                                {{ product?.title }}
                            </div>
                            <div>
                                <div class="flex items-center space-x-2">
                                    <div>Brand:</div>
                                    <div class="text-[.7rem]">samusng</div>
                                    <div class="border bg-"></div>
                                    <div class="text-[.7rem]">
                                        Similar products from Samsung
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FLASH SALE SECTION -->
                        <div class="my-2">
                            <div class="border border-[#e61601] rounded">
                                <div class="bg-[#e61601] px-2 py-1">
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
                                            ₦ 121,750
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
                                        {{ product?.quantity }} items left
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <Btn type="jumia-color "> Add to cart </Btn>
                            </div>
                        </div>
                    </div>
                    <!-- <div>lrem</div> -->
                </div>
            </div>
            <div class="w-full col-span-2 lg:col-span-1 h-[20vh] bg-green-300">
                thid
            </div>
            <div class="w-full col-span-2 bg-white rounded shadow">
                <div class="">
                    <div id="title" class="p-2">product details</div>
                    <hr class="mb-2 mt-0" />
                    <div class="px-2">
                        <div
                            v-html="product?.description"
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

export default defineComponent({
    components: { Btn },
    props: {
        product: {
            type: Object,
        },
    },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
