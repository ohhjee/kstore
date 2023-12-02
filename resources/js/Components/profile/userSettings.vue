<template>
    <div class="">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mb-[2rem]">
            <div id="reward_point" class="bg-white rounded-[4px] p-2 space-y-2">
                <div id="Reward_points" class="font-semibold text-[1rem]">
                    Reward Points
                </div>
                <div id="" class="flex space-x-2">
                    <HeartIcon class="h-6 w-6 text-red-500 overflow-hidden" />
                    <div>
                        4,571
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
        <div class="bg-white rounded-[4px] p-3" id="">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi
            obcaecati quam non officia ipsum, illo, nemo dolorum nobis placeat
            ad consequuntur delectus molestiae possimus soluta reprehenderit
            facilis. Ipsa, asperiores nam?
        </div>
    </div>
</template>

<script lang="ts">
import { HeartIcon } from "@heroicons/vue/24/outline";
import { defineComponent } from "vue";

export default defineComponent({
    components: { HeartIcon },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
