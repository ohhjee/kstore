<template>
    <div>
        <Head title="Profile"> </Head>

        <authenticated-layout :user="user" :cart="cart">
            {{ $page.props.flash.message }}
            <!-- <div class="grid grad-cols-4"> -->
            <div>
                <profile
                    :form="form"
                    :hidForm="hidForm"
                    :user="user"
                    :loading="loading"
                    :showForm="showForm"
                    :show="show"
                />
                <orders class="mt-[5rem]" />
            </div>
        </authenticated-layout>
    </div>
</template>

<script lang="ts">
import Orders from "@/Components/profile/Orders.vue";
import profile from "@/Components/profile/profile.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import { useForm, Head } from "@inertiajs/vue3";
import { defineComponent, onMounted, ref } from "vue";

export default defineComponent({
    props: {
        user: {
            type: Object,
            required: true,
        },
        cart: {
            type: Object,
            required: true,
        },
    },
    components: { profile, AuthenticatedLayout, Head, Orders },
    setup(props) {
        // console.log("profile-user", props.user);

        const form = useForm({
            first_name: props.user.first_name,
            last_name: props.user.last_name,

            email: props.user.email,
        });

        // console.log("typeOf", typeof form);

        const loading = ref(true);
        setTimeout(() => {
            loading.value = false;
        }, 5000);
        const showForm = ref(false);
        const hidForm = ref(true);
        const show = (e) => {
            //   console.log(e.target.name);
            showForm.value = true;
            hidForm.value = false;
        };

        const UpdateUser = () => {
            form.put(route("profile.update"));
            showForm.value = false;
            hidForm.value = true;
        };
        return { loading, show, showForm, hidForm, UpdateUser, form };
    },
});
</script>

<style scoped></style>
