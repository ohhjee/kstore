<template>
    <div>
        <!-- TODO:: adjust the with of the table  -->
        <table
            class="md:w-full block min-w-[100vh] h-[400px] overflow-y-scroll"
        >
            <thead class="sticky top-0 block bg-slate-100">
                <tr class="w-full inline-table">
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
            <table-content
                class=""
                :rewards="reward"
                v-for="rewards in reward"
                :key="rewards.id"
            />
        </table>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import tableContent from "./table-content.vue";
await new Promise((res) => setTimeout(res, 1000));
export default defineComponent({
    components: { tableContent },
    props: {
        reward: {
            type: Object,
        },
    },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
