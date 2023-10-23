<template>
    <div>
        orem
        <guest-layout @submitForm="submit">
            <Head title="New Password"></Head>
            <input type="hidden" name="_token" v-model="token" />
            <!-- <div v-if="show"> -->
            <!-- <div v-if="notification">
                <div class="text-white py-4 bg-red-500 text-center">
                    {{ notification }}
                </div>
            </div> -->
            <!-- <div v-else-if="success">
                    <div class="text-white py-4 bg-green-500 text-center">
                        {{ success }}
                    </div>
                </div>
                <div v-else>
                    <div class="text-white py-4 bg-green-500 text-center">
                        {{ confirm[0] }}
                        <br />
                        {{ confirm[1] }}
                    </div>
                </div>
            </div> -->
            <div class="space-y-4 rounded-md shadow-sm">
                <div>
                    <label for="" class="sr-only">Password</label>
                    <input
                        id="email-address"
                        v-model="Pass.password"
                        name="password"
                        type="password"
                        autocomplete="password"
                        class="relative block w-full appearance-none rounded-lg p-4 border border-gray-300 text-gray-900 placeholder-gray-500 focus:z-10 focus:ring-0 focus:border-gray-300 focus:outline-none sm:text-sm"
                        placeholder="New Password"
                    />
                </div>
                <div>
                    <label for="password" class="sr-only"
                        >Confirm Password</label
                    >
                    <input
                        id="password"
                        v-model="Pass.password_confirmation"
                        name="password_confirmation"
                        type="password"
                        autocomplete="password"
                        class="relative block w-full appearance-none rounded-lg p-4 border border-gray-300 text-gray-900 placeholder-gray-500 focus:z-10 focus:ring-0 focus:border-gray-300 focus:outline-none sm:text-sm"
                        placeholder="Confirm Password"
                    />
                </div>
            </div>

            <div>
                <Button class="relative" btn="jumia-color">
                    <span
                        class="absolute inset-y-0 right-0 left-0 flex items-center"
                    >
                        <LockClosedIcon
                            class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                            aria-hidden="true"
                        />
                    </span>
                    Reset Password
                </Button>
            </div>
        </guest-layout>
    </div>
</template>

<script lang="ts">
import Button from "@/Components/btn/btn.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { LockClosedIcon } from "@heroicons/vue/24/outline";
import { Link, Head, usePage, useForm } from "@inertiajs/vue3";
import { computed, defineComponent } from "vue";
// import LockClosedIcon

export default defineComponent({
    components: { GuestLayout, Head, Button, LockClosedIcon },
    props: { token: { type: String } },
    setup(props) {
        // const notification = computed(
        //     () => usePage().props?.flash.notification
        // );
        const Pass = useForm({
            token: props.token,
            password: "",
            password_confirmation: "",
        });
        const submit = () => {
            Pass.put(route("updatePassword"));
        };
        return { submit, Pass };
    },
});
</script>

<style scoped></style>
