<template>
  <div>
    <Head title="login"></Head>

    <div class="flex flex-col items-center justify-center">
      <GuestLayout>
        <div class="mx-auto" v-if="formStep == 1">
          <div class="flex flex-col items-center justify-center space-y-4">
            <img :src="image_1" class="w-14 h-14" alt="" />
            <p class="text-[1.25rem] leading-normal text-[#000000] text-center">
              Welcome to Kstore
            </p>

            <p
              class="sm:w-[432px] w-full  mt-[8px] mb-[16px] text-center text-[#4a4a4a] text-[1rem]"
            >
              Type your e-mail or phone number to log in or create a kstore account
            </p>
          </div>
          <div class="mt-[16px]">

          </div>
          <div class="mt-[5px]">
            <div class="relative z-0 w-full group">
              <label
                for="first_name"
                class="font-bold flex items-center text-[.8rem] absolute h-full px-1 group-focus-within:text-[.7rem] transition-all duration-[300ms] group-focus-within:bg-gray-100 group-focus-within:h-fit group-focus-within:-top-[.5rem] top-0 left-3 w-auto group-focus-within:text-[#f68b1e]"
              >
                Email or Mobile Number*
              </label>
              <input
                type="email"
                name="email"
                id="email"
                v-model="form.email"
                class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                autofocus
              />
            </div>
            <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.email"
              >{{ form.errors.email }}</small
            >
          </div>
          <div class="mt-[1rem]">
            <Button type="jumia-color" @click="next" v-if="formStep == 1">
              continue
            </Button>
          </div>
        </div>

        <div class="mx-auto" v-if="formStep == 2">
          <div class="flex flex-col items-center justify-center space-y-4">
            <img :src="image_1" class="w-14 h-14" alt="" />
            <p class="text-[1.25rem] leading-normal text-[#000000] font-bold text-center">
              Create your account
            </p>

            <div
              class="sm:w-[432px] w-full   mt-[8px] mb-[16px] text-center text-[#4a4a4a] text-[1rem]"
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
        <div class="mx-auto" v-if="formStep == 3">
          <div class="flex flex-col items-center justify-center space-y-4">
            <img :src="image_1" class="w-14 h-14" alt="" />
            <p class="text-[1.25rem] leading-normal text-[#000000] font-bold text-center">
              Personal Details
            </p>

            <div
              class="sm:w-[432px] w-full  mt-[8px] mb-[16px] text-center text-[#4a4a4a] text-[1rem]"
            >
              We just need you to fill in some details.
            </div>
          </div>

          <div class="mt-[16px]">
            <div class="relative z-0 w-full group mt-4">
              <label
                for="first_name"
                class="font-bold flex items-center text-[.8rem] absolute h-full px-1 group-focus-within:text-[.7rem] transition-all duration-[300ms] group-focus-within:bg-gray-100 group-focus-within:h-fit group-focus-within:-top-[.5rem] top-0 left-3 w-auto group-focus-within:text-[#f68b1e]"
              >
                First Name*
              </label>

              <input
                type="text"
                name="first_name"
                id="first_name"
                v-model="form.first_name"
                class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                autofocus
              />
            </div>

            <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.first_name"
              >{{ form.errors.first_name }}</small
            >

            <div class="relative z-0 w-full group mt-4">
              <label
                for="first_name"
                class="font-bold flex items-center text-[.8rem] absolute h-full px-1 group-focus-within:text-[.7rem] transition-all duration-[300ms] group-focus-within:bg-gray-100 group-focus-within:h-fit group-focus-within:-top-[.5rem] top-0 left-3 w-auto group-focus-within:text-[#f68b1e]"
              >
                Last Name*
              </label>

              <input
                type="text"
                name="last_name"
                id="last_name"
                v-model="form.last_name"
                class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                autofocus
              />
            </div>
                <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.last_name"
              >{{ form.errors.last_name }}</small
            >
            <div class="relative z-0 w-full group mt-4 flex justify-between">
              <div class="w-2/12 relative">
                <label
                  for="first_name"
                  class="font-bold flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-gray-100 -top-[.5rem] w-fit mx-auto left-0 right-0"
                >
                  prefix
                </label>

                <div
                  class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                >
                  <Popover v-slot="{ open }" class="relative">
                    <PopoverButton
                      :class="open ? '' : 'text-opacity-90'"
                      class="group inline-flex items-center rounded-md px-3 py-2 text-base font-medium text-white hover:text-opacity-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                    >
                      <div class="text-black">+234</div>
                    </PopoverButton>

                    <transition
                      enter-active-class="transition duration-200 ease-out"
                      enter-from-class="translate-y-1 opacity-0"
                      enter-to-class="translate-y-0 opacity-100"
                      leave-active-class="transition duration-150 ease-in"
                      leave-from-class="translate-y-0 opacity-100"
                      leave-to-class="translate-y-1 opacity-0"
                    >
                      <PopoverPanel
                        class="absolute bottom-0 z-10 mt-3 w-screen max-w-sm transform px-4 sm:px-0 lg:w-fit"
                      >
                        <div
                          class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                        >
                          <div class="bg-white p-4">
                            <a
                              v-for="item in solutions"
                              :key="item.name"
                              :href="item.href"
                              class="-m-3 rounded-lg flex items-center p-2 transition duration-150 ease-in-out focus:outline-none focus-visible:ring focus-visible:ring-orange-500 focus-visible:ring-opacity-50"
                            >
                              <div class="ml-4 flex items-start">
                                <p class="text-sm font-medium text-gray-900">
                                  {{ item.name }}
                                </p>
                                <p class="text-sm text-gray-500">
                                  {{ item.description }}
                                </p>
                              </div>
                            </a>
                          </div>
                        </div>
                      </PopoverPanel>
                    </transition>
                  </Popover>
                </div>
              </div>
              <div class="w-9/12 relative">
                <label
                  for="first_name"
                  class="font-bold flex items-center text-[.8rem] absolute h-full px-1 group-focus-within:text-[.7rem] transition-all duration-[300ms] group-focus-within:bg-gray-100 group-focus-within:h-fit group-focus-within:-top-[.5rem] top-0 left-3 w-auto group-focus-within:text-[#f68b1e]"
                >
                  Phone Number*
                </label>

                <input
                  type="tel"
                  name="tel"
                  id="last_name"
                  v-model="form.phone"
                  class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                  autofocus
                />
              </div>
            </div>
            <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.phone"
              >{{ form.errors.phone }}</small
            >
          </div>


          <div class="mt-[1rem]">
            <Button type="jumia-color" @click="next3"> continue </Button>
          </div>
        </div>

           <div class="mx-auto" v-if="formStep == 4">
          <div class="flex flex-col items-center justify-center space-y-4">
            <img :src="image_1" class="w-14 h-14" alt="" />
            <p class="text-[1.25rem] leading-normal text-[#000000] font-bold text-center">
              Personal Details
            </p>

            <div
              class="sm:w-[432px] w-full  mt-[8px] mb-[16px] text-center text-[#4a4a4a] text-[1rem]"
            >
              We just need you to fill in some details.
            </div>
          </div>

          <div class="mt-[16px]">
            <div class="relative z-0 w-full group mt-4">


              <select

                name="gender"

v-model="form.gender"
:value="form.gender"
                class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                autofocus
              >
              <option value="" selected>gender</option>

              <option value="male">Male</option>
              <option value="female">Female</option>

              </select>
            </div>

            <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.gender"
              >{{ form.errors.gender }}</small
            >

            <div class="relative z-0 w-full group mt-4">


              <input
                type="date"
                name="dob"
                max="2005-12-31"
                v-model="form.dob"
                class="h-[56px] border py-55-rem bg-transparent text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-[#f68b1e] border-[#f68b1e] block w-full p-2.5"
                autofocus
              />
            </div>
                <small
              class="flex items-center justify-center mt-2 text-red-500"
              v-if="form.errors.dob"
              >{{ form.errors.dob }}</small
            >

          </div>


          <div class="mt-[1rem]">
            <Button type="jumia-color" @click="submit"> continue </Button>
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
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Navbar from "@/Components/Navbar.vue";
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import Button from "@/Components/btn/btn.vue";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/outline";
export default defineComponent({
  components: {
    GuestLayout,
    Head,
    Navbar,
    Link,
    Button,
    EyeIcon,
    EyeSlashIcon,
    Popover,
    PopoverButton,
    PopoverPanel,
  },
  props: {
    status: {
      type: Object,
      required: true
    },
  },

  setup(props) {
    const image_1 = new URL(
      "../../../assets/images/logo/login/myjumia-top-logo.png",
      import.meta.url
    ).href;

    const formStep = ref(1);
    const type = ref("password");
    const form = useForm({
        first_name:"",
      last_name: "",
      email: "",
      phone: "",
      password: "",
      password_confirmation: "",
      dob:"",
      gender:""
      //   remember: false,
    });
    const displayPassword = () => {
      if (type.value === "password") {
        type.value = "text";
      } else {
        type.value = "password";
      }
    };
    const next = () => {
      form.post(route("login.step.one"), {
        onSuccess: () => {
          formStep.value++;
        },
      });
    };
    const next2 = () => {
      form.post(route("login.step.two"), {
        onSuccess: () => {
          formStep.value++;
        },
      });
    };
        const next3 = () => {
      form.post(route("login.step.three"), {
        onSuccess: () => {
          formStep.value++;
        },
      });
    };
    const submit = () => {
      form.post(route("login.store"), {
        onFinish: () => {
                    form.reset('password');
                },
      });
    };
    const solutions = [
      {
        name: "Nigeria",
        description: "+234",
        href: "##",
      },
      {
        name: "niger",
        description: "+222",
        href: "##",
      },
      {
        name: "US",
        description: "+1",
        href: "##",
      },
    ];
    return {
      image_1,
      submit,
      form,
      formStep,
      next,
      type,
      next2,
      next3,
      displayPassword,
      solutions,
    };
  },
});
</script>

<style scoped lang="scss">
input:valid {
}
</style>
