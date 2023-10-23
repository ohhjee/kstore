<template>
    <GuestLayout>
        <Head title="reset-password"></Head>
        <div>
            <!-- {{ $page.props.flash }} -->
            <form @submit.prevent="checkMail">
                <div class="my-[5px]">
                    <div class="relative z-0 w-full">
                        <label
                            for="first_name"
                            class="font-bold flex items-center text-[.8rem] absolute px-1 group-focus-within:text-[.7rem] transition-all duration-[300ms] bg-gray-200 top-[-9px] left-3 w-auto group-focus-within:text-[#f68b1e]"
                        >
                            Email or Mobile Number*
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            v-model="mailVerification.email"
                            class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                            autofocus
                        />
                    </div>
                    <small
                        class="flex items-center justify-center mt-2 text-red-500"
                        v-if="error"
                        >{{ error }}</small
                    >

                    <small
                        class="flex items-center justify-center mt-2 text-green-500"
                        v-if="success"
                        >{{ success }}</small
                    >
                    <small
                        class="flex items-center justify-center mt-2 text-red-500"
                        v-if="errorM"
                        >{{ errorM }}</small
                    >
                    <small
                        class="flex items-center justify-center mt-2 text-red-500"
                        v-if="netWork"
                        >{{ netWork }}</small
                    >
                </div>
                <div v-if="loading">
                    <Button
                        disabled
                        class="cursor-not-allowed"
                        btn="out-of-stock"
                        type="button"
                    >
                        <spinner />
                    </Button>
                </div>
                <div v-else>
                    <Button
                        btn="jumia-color"
                        :disabled="mailVerification.processing"
                        type="submit"
                    >
                        verify mail
                    </Button>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>

<script lang="ts">
import Button from "@/Components/btn/btn.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { useForm, Head, usePage } from "@inertiajs/vue3";
import { computed, defineComponent, onMounted, ref } from "vue";
import { useToast, POSITION, TYPE } from "vue-toastification";
import Spinner from "@/Components/spinner/spinner.vue";

// import useToast
// import btnVue

export default defineComponent({
    components: { GuestLayout, Head, Button, Spinner },
    props: { errors: { type: Object } },
    setup(props) {
        const mailVerification = useForm({
            email: "",
        });

        onMounted(() => {
            // console.log(props.errors);
        });
        const loading = ref(false);
        const toast = useToast();
        const error = computed(() => usePage().props?.flash.mailVerification);
        const success = computed(() => usePage().props?.flash.success);
        const errorM = computed(() => usePage().props?.flash.errorM);
        const netWork = computed(() => usePage().props?.flash.netWork);

        const checkMail = () => {
            // console.log(message.value);
            loading.value = true;
            mailVerification.post(route("mailVerification"), {
                onFinish: () => {
                    loading.value = false;
                },
                onError: () => {
                    toast(`${props.errors?.email}`, {
                        // transition: ,
                        type: TYPE.ERROR,
                        position: POSITION.TOP_RIGHT,
                        timeout: 5000,
                    });
                },
            });
        };

        return {
            mailVerification,
            checkMail,
            error,
            success,
            errorM,
            netWork,
            loading,
        };
    },
});
</script>

<style scoped></style>
