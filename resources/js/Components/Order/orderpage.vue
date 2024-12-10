<template>
    <!-- <div class="my-5"> -->
    <div class="p-3 my-4 bg-white rounded shadow">
        <table class="w-full">
            <thead class="w-full border-b">
                <tr>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-center"
                    >
                        S/N
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-center"
                    >
                        total
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-center"
                    >
                        time
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-center"
                    >
                        invoice
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-center"
                    >
                        status
                    </th>
                </tr>
            </thead>
            <!-- {{
                payments
            }} -->
            <!-- <div v-for="payments of payments" :key="payments.id"> -->
            <!-- {{
                payments.order_no
            }} -->
            <tr
                v-for="payments of payments"
                :key="payments.order_no"
                class="h-[6vh] border-b text-center"
            >
                <td>{{ payments.order_no }}</td>
                <td>
                    {{ payments.total }}
                </td>
                <td class="text-center w-fit">
                    {{
                        moments(payments.created_at).format(
                            "ddd MMM D yyy, h:m a",
                        )
                    }}
                </td>
                <td>
                    <button
                        @click="show"
                        class="p-2 text-sm hover:bg-[#f68b1e] hover:text-white border rounded-md"
                    >
                        download
                    </button>
                </td>
                <td class="flex items-center justify-center h-[inherit]">
                    <div
                        class="flex items-center justify-center px-1 py-2 text-center border rounded-md w-fit h-fit place-content-center"
                        :class="[
                            payments.status ? 'bg-green-500 text-white ' : '',
                        ]"
                    >
                        <div class="w-full text-center h-fit" id="">
                            {{ payments.status }}
                        </div>
                    </div>
                </td>
            </tr>
            <!-- </div> -->
        </table>
        <div
            class="grid items-center justify-between grid-cols-12 gap-4 border"
        >
            <!-- <div class="col-span-11 border">
                {{ payment }}
            </div>
            <div
                class="items-center justify-center col-span-1 text-center border h-fit place-content-center"
                :class="[payment.status ? 'bg-green-500 text-white ' : '']"
            >
                <div class="w-full text-center h-fit" id="">
                    {{ payment.status }}
                </div>
            </div> -->
        </div>
    </div>
    <Modal v-if="showModal" :payments="payments">
        <invoice
            :payments="payments"
            @cancel="cancel"
            :class="[
                showModal
                    ? 'transition-all duration-[5000s] ease-in-out z-20'
                    : 'opacity-0 pointer-events-none z-[-10]',
                'transition-all duration-[5000s] ease-in-out',
            ]"
        />
    </Modal>
    <!-- ll -->
    <!-- </div> -->
</template>

<script lang="ts">
import { defineAsyncComponent, defineComponent, ref } from "vue";
import moment from "moment";
const invoice = defineAsyncComponent({
    loader: () => import("../modalComp/invoce.vue"),
});
const Modal = defineAsyncComponent({
    loader: () => import("../modals/modal.vue"),
});

export default defineComponent({
    components: { invoice, Modal },
    props: {
        payments: {
            type: Object,
            required: true,
        },
        date: {
            type: Date,
        },
    },
    setup() {
        const moments = moment;
        const showModal = ref(false);

        const cancel = () => {
            showModal.value = false;
        };
        const show = () => {
            showModal.value = true;
        };
        return { moments, showModal, show, cancel };
    },
});
</script>

<style scoped></style>
