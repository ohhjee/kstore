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
            <!-- {{ payments }} -->
            <div class="p-2 my-4 text-center">
                <div class="space-y-4">
                    <div class="grid grid-cols-12">
                        <div class="col-span-8 font-bold uppercase text-start">
                            Payment method
                        </div>
                        <div class="col-span-4 text-end">
                            {{ payments[0].pay_method }}
                        </div>
                    </div>
                    <div class="grid grid-cols-12">
                        <div class="col-span-8 font-bold uppercase text-start">
                            order no
                        </div>
                        <div class="col-span-4 text-end">
                            {{ payments[0].order_no }}
                        </div>
                    </div>
                    <div class="grid grid-cols-12">
                        <div class="col-span-8 font-bold uppercase text-start">
                            reference
                        </div>
                        <div class="col-span-4 text-end">
                            {{ payments[0].reference }}
                        </div>
                    </div>
                    <div class="grid grid-cols-12">
                        <div class="col-span-8 font-bold uppercase text-start">
                            date
                        </div>
                        <div class="col-span-4 text-end">
                            {{
                                moments(payments[0].created_at).format(
                                    "ddd MMM D yyy, h:m a",
                                )
                            }}
                        </div>
                    </div>
                    <div class="grid grid-cols-12">
                        <div class="col-span-8 font-bold uppercase text-start">
                            total
                        </div>
                        <div class="col-span-4 text-end">
                            {{ payments[0].total }}
                        </div>
                    </div>
                    <!-- <div ref="coops">
                        {{ payments[0]?.reference }}
                    </div>
                    <input type="download" value="download" />
                    <a :href="payments[0].reference" download> download</a>
                    <button @click="copy">copy</button> -->
                </div>
                <!-- {{ payments }} -->
            </div>
            <!-- <div class="flex items-center justify-end p-2 space-x-4">
                this is invoice
            </div> -->
        </div>
    </div>
</template>

<script lang="ts">
import { XMarkIcon } from "@heroicons/vue/24/outline";
import { defineComponent, ref } from "vue";
import moment from "moment";

export default defineComponent({
    components: { XMarkIcon },
    props: {
        payments: {
            type: Array,
            required: true,
        },
        cart: {
            type: Array,
        },
    },
    emits: ["cancel"],
    setup(_, { emit }) {
        const cancel = () => {
            emit("cancel");
        };
        const copy = () => {
            const link = document.createElement("a");
        };
        const moments = moment;
        return { cancel, moments };
    },
});
</script>

<style scoped></style>
