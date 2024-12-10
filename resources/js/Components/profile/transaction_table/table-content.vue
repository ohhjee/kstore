<template>
    <tr class="w-full border-b border-gray-300 inline-table">
        <td class="py-4 text-xs">{{ rewards?.order_id }}</td>
        <td class="w-[20%] mx-auto text-center">
            <span
                class="bg-green-500 uppercase text-center tracking-wider rounded-lg p-1.5 text-xs text-white"
            >
                {{ rewards?.status }}
            </span>
        </td>
        <td class="text-xs text-center">{{ rewards?.total }}</td>
        <td class="text-xs text-center">{{ rewards?.total / 1000 }}</td>
        <td class="text-xs w-[20%]">02 Dec 2023 05:33:12</td>
    </tr>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        rewards: {
            type: Object,
        },
    },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
