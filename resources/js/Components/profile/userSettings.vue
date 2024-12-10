<template>
    <div class="">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mb-[2rem]">
            <div id="reward_point" class="bg-white rounded-[4px] p-2 space-y-2">
                <div id="Reward_points" class="font-semibold text-[1rem]">
                    Reward Points
                </div>
                <div id="" class="flex space-x-2">
                    <HeartIcon class="w-6 h-6 overflow-hidden text-red-500" />
                    <div>
                        <span v-if="reward?.total">
                            {{ reward?.total / 1000 }}
                        </span>
                        <span v-else> 0 </span>
                        <span class="text-[.8rem] text-gray-500"
                            >Points earn</span
                        >
                    </div>
                </div>
                <div id="" class="text-[.7rem] text-gray-500">
                    Earn reward point with your purchase
                </div>
            </div>
            <div id="" class="bg-[#f68b1e] rounded-[4px] p-2 relative">
                <div class="mb-4">trrr</div>
                <!-- <div class="bottom-0"> -->
                <div
                    id=""
                    class="text-white capitalize text-[1rem] font-semibold"
                >
                    premium member
                </div>
                <div id="" class="capitalize text-white text-[.5rem]">
                    tier milestone reached
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="bg-white rounded-[4px] p-3 h-fit" id="">
            <Suspense>
                <user-transaction
                    :reward="reward"
                    class="overflow-x-scroll md:overflow-x-hidden"
                />
                <template #fallback>
                    <spinner />
                </template>
            </Suspense>
        </div>
    </div>
</template>

<script lang="ts">
import { HeartIcon } from "@heroicons/vue/24/outline";
import { defineComponent, defineAsyncComponent } from "vue";
const Spinner = defineAsyncComponent({
    loader: () => import("../spinner/spinner.vue"),
});
const UserTransaction = defineAsyncComponent({
    loader: () => import("./transaction_table/userTransaction.vue"),
    loadingComponent: Spinner,
    delay: 500,
});

export default defineComponent({
    components: { HeartIcon, UserTransaction, Spinner },
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
