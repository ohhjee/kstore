<template>
    <div>

        <Head title="password"></Head>
this is passowrd
        <!-- <div class="flex flex-col items-center justify-center">
            <GuestLayout>
                <div class="mx-auto" v-if="formStep == 2">
          <div class="flex flex-col items-center justify-center space-y-4">
            <img :src="image_1" class="w-14 h-14" alt="" />
            <p class="text-[1.25rem] leading-normal text-[#000000] font-bold text-center">
              Create your account
            </p>

            <div
              class="w-[432px] mt-[8px] mb-[16px] text-center text-[#4a4a4a] text-[1rem]"
            >
              Let's get started by creating your account.
              <div>To keep you account safe, we need a strong password</div>
            </div>
          </div>

          <div class="flex items-center justify-between text-center bg-gray-400">
            <div>{{ status.email }}</div>
            <Link href="/login">edit</Link>
          </div>

          <div class="mt-[16px]">
            <div class="relative z-0 w-full group mt-4">
              <label
                for="first_name"
                class="font-bold flex items-center text-[.8rem] absolute h-full px-1 group-focus-within:text-[.7rem] transition-all duration-[300ms] group-focus-within:bg-gray-100 group-focus-within:h-fit group-focus-within:-top-[.5rem] top-0 left-3 w-auto group-focus-within:text-[#f68b1e]"
              >
                Password*
              </label>

              <input
                :type="type"
                name="password"
                id="password"
                v-model="form.password"
                class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                autofocus
              />
              <div
                @click="displayPassword"
                class="absolute top-0 bottom-0 right-2 h-full flex items-center"
              >
                <EyeIcon class="w-6 h-6" v-if="type === 'text'" />
                <EyeSlashIcon class="w-6 h-6" v-else />
              </div>
            </div>

            <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.password">{{ form.errors.password }}</small>

            <div class="relative z-0 w-full group mt-4">
              <label
                for="first_name"
                class="font-bold flex items-center text-[.8rem] absolute h-full px-1 group-focus-within:text-[.7rem] transition-all duration-[300ms] group-focus-within:bg-gray-100 group-focus-within:h-fit group-focus-within:-top-[.5rem] top-0 left-3 w-auto group-focus-within:text-[#f68b1e]"
              >
                Repeat Password*
              </label>

              <input
                :type="type"
                name="password"
                id="con_password"
                v-model="form.password_confirmation"
                class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                autofocus
              />
            </div>
            <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.password_confirmation"
              >{{ form.errors.password_confirmation }}</small
            >
          </div>
          <div class="mt-[1rem]">
            <Button type="jumia-color" @click="next2"  v-if="formStep == 2"> continue </Button>
          </div>
        </div>
            <div class="w-full">
              <div class="mt-[64px]"></div>
              <div class="w-full h-[48px] bg-[#1877f2] rounded">
                <a
                  href="https://facebook.com"
                  target="_blank"
                  class="flex items-center justify-center w-full h-full text-white"
                  >Log in with Facebook</a
                >
              </div>
            </div>
          </GuestLayout>
        </div> -->
      </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Navbar from "@/Components/Navbar.vue";
export default defineComponent({
    props: {
        status: {
            type: Object,
            required: true
        }
    },
    components: { GuestLayout, Head, Navbar, Link },

    setup(props) {
        // console.log(props.status );

        const image_1 = new URL(
            "../../../assets/images/logo/login/myjumia-top-logo.png",
            import.meta.url
        ).href;
    const type = ref("password");

        const form = useForm({
            password: "",
            password_confirmation: "",
            //   remember: false,
        });
        const submit = () => {
            form.post(route("password"));
            // console.log("hey");

        };
         const displayPassword = () => {
      if (type.value === "password") type.value = "text";
      else {
        type.value = "password";
      }
    };

        return { image_1, submit, form,displayPassword };
    },
});
</script>

<style scoped>

</style>
,
