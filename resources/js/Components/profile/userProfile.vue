<template>
    <div class="">
        <div class="bg-white rounded-[4px] p-4" id="">
            <div id="user_picture_details" class="">
                <div>
                    <div
                        id="user_image"
                        class="mx-auto rounded-full h-[25vh] w-[25vh] overflow-hidden"
                    >
                        <img
                            src="../../../assets/images/slider/profile_2.avif"
                            class="w-full h-full object-cover object-center object-top"
                            alt=""
                        />
                    </div>
                    <div id="user_name" class="text-center mt-4 font-semibold">
                        {{ user?.first_name }}
                        {{ user?.last_name }}
                    </div>
                </div>
                <div id="user_detail" class="mt-[3rem]">
                    <div id="" class="flex justify-between items-center">
                        <div id="" class="capitalize font-medium">details</div>
                        <div
                            id=""
                            class="text-end text-[#f68b1e] bg-slate-200 py-1 px-2 rounded text-[.8rem]"
                        >
                            premium user
                        </div>
                    </div>
                </div>
                <hr class="border border-dashed my-3 border-black/30" />
                <div id="user_account_id" class="space-y-4">
                    <div id="account_id" class="">
                        <div class="text-[1rem] font-semibold">Account ID</div>
                        <div class="text-[.8rem]">#1234</div>
                    </div>
                    <div id="account_id" class="">
                        <div class="text-[1rem] font-semibold">
                            Billing Email
                        </div>
                        <div class="text-[.8rem]">{{ user?.email }}</div>
                    </div>
                    <div id="account_id" class="">
                        <div class="text-[1rem] font-semibold">
                            Delivery Address
                        </div>
                        <div class="text-[.8rem]">#1234</div>
                    </div>
                    <div id="account_id" class="">
                        <div class="text-[1rem] font-semibold">Language</div>
                        <div class="text-[.8rem] capitalize">english</div>
                    </div>
                    <div id="account_id" class="">
                        <div class="text-[1rem] font-semibold">
                            Latest Transaction
                        </div>
                        <div class="text-[.8rem]" v-if="date">
                            {{ date?.created_at }}
                        </div>
                        <div id="" class="capitalize" v-else>
                            {{ msg }}
                        </div>

                        <!-- <div v-for="dates in date" :key="dates.created_at">
                            {{ dates }}
                        </div> -->
                        {{ date }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        user: {
            type: Object,
        },
        date: { type: String, required: true },
        msg: {
            type: String,
        },
    },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
