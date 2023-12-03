<template>
    <div>
        <table class="md:w-full min-w-[100vh]">
            <thead class="border-b border-gray-300">
                <tr>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-left"
                    >
                        order no
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-left"
                    >
                        status
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-left"
                    >
                        amount
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-left"
                    >
                        reward
                    </th>
                    <th
                        class="uppercase text-[.8rem] py-3 tracking-wide font-semibold text-left"
                    >
                        date
                    </th>
                </tr>
            </thead>
            <tr class="border-b border-gray-300">
                <td class="py-4 text-xs">#1234</td>
                <td>
                    <span
                        class="bg-green-300 uppercase tracking-wider rounded-lg p-1.5 bg-opacity-50 text-green-900 text-xs text-white"
                    >
                        paid
                    </span>
                </td>
                <td class="text-xs">$400</td>
                <td class="text-xs">40</td>
                <td>
                    <div class="text-xs">02 Dec 2023 05:33:12</div>
                </td>
            </tr>
            <tr>
                <td class="py-4 text-xs">#1234</td>
                <td>
                    <span
                        class="bg-yellow-300 uppercase tracking-wider rounded-lg p-1.5 bg-opacity-50 text-yellow-900 text-xs"
                    >
                        pending
                    </span>
                </td>
                <td class="text-xs">$400</td>
                <td class="text-xs">40</td>
                <td>
                    <div class="text-xs">02 Dec 2023 05:33:12</div>
                </td>
            </tr>
        </table>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
await new Promise((res) => setTimeout(res, 1000));
export default defineComponent({
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
