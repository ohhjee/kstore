<template>
    <div>
        <form @submit.prevent="submitForm">
            <div class="text-[.8rem] capitalize">add new address</div>
            <div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="relative z-0 w-full group mt-4">
                        <label
                            for="first_name"
                            class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                        >
                            First Name
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            id="first_name"
                            :value="user?.first_name"
                            class="h-[40px] text-[.7rem] text-black/70 border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                        />
                    </div>
                    <div class="relative z-0 w-full group mt-4">
                        <label
                            for="first_name"
                            class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                        >
                            last Name
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            id="first_name"
                            :value="user?.last_name"
                            class="h-[40px] text-[.7rem] text-black/70 border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                        />
                    </div>

                    <div class="relative z-0 w-full group mt-4">
                        <div class="grid md:grid-cols-5 lg:grid-cols-7">
                            <div>
                                <label
                                    for="first_name"
                                    class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                                >
                                    prefix
                                </label>
                                <div
                                    class="h-[40px] text-[.7rem] text-black/70 bg-transparent text-sm flex items-center w-fit p-2.5"
                                >
                                    +234
                                </div>
                            </div>
                            <div class="md:col-span-4 lg:col-span-6">
                                <div class="relative z-0 w-full group">
                                    <label
                                        for="tel"
                                        class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                                    >
                                        Phone number
                                    </label>
                                </div>
                                <input
                                    placeholder="enter phone number"
                                    type="tel"
                                    name="tel_1"
                                    id="tel"
                                    :value="user?.phone"
                                    class="h-[40px] text-[.7rem] text-black/70 placeholder:uppercase placeholder:text-[.7rem] border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="relative z-0 w-full group mt-4">
                        <div
                            class="grid md:grid-cols-5 lg:grid-cols-7 items-center"
                        >
                            <div class="">
                                <label
                                    for="tel_2"
                                    class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                                >
                                    prefix
                                </label>
                                <div
                                    class="h-[40px] text-[.7rem] text-black/70 flex items-center bg-transparent text-sm w-fit p-2.5"
                                >
                                    +234
                                </div>
                            </div>
                            <div class="md:col-span-4 lg:col-span-6">
                                <div class="relative z-0 w-full group">
                                    <label
                                        for="tel_2"
                                        class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                                    >
                                        additional phone number
                                    </label>
                                </div>
                                <input
                                    placeholder="enter your additional phone number"
                                    type="tel"
                                    name="tel_2"
                                    id="tel_2"
                                    v-if="address"
                                    :value="address?.tel_2"
                                    class="h-[40px] text-[.7rem] text-black/70 border placeholder:uppercase placeholder:text-[.7rem] bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                                />
                                <input
                                    placeholder="enter your additional phone number"
                                    type="tel"
                                    name="tel_2"
                                    v-else
                                    id="tel_2"
                                    v-model="addressForm.tel_2"
                                    class="h-[40px] text-[.7rem] text-black/70 border placeholder:uppercase placeholder:text-[.7rem] bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2 relative">
                        <label
                            for="address_1"
                            class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                        >
                            delivery address
                        </label>
                        <input
                            placeholder="enter your address"
                            type="text"
                            name="address_1"
                            id="address_1"
                            v-if="address"
                            :value="address?.address_1"
                            class="h-[40px] text-[.7rem] text-black/70 border placeholder:uppercase placeholder:text-[.7rem] bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                        />
                        <div v-else>
                            <input
                                placeholder="enter your address"
                                type="text"
                                name="address_1"
                                id="address_1"
                                v-model="addressForm.address_1"
                                class="h-[40px] text-[.7rem] text-black/70 border placeholder:uppercase placeholder:text-[.7rem] bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                                :class="[
                                    errors?.address_1
                                        ? 'border border-red-500'
                                        : '',
                                ]"
                            />

                            <small
                                class="text-red-500"
                                v-if="errors?.address_1"
                            >
                                The address field is required.
                            </small>
                        </div>
                    </div>

                    <div class="col-span-2 relative">
                        <label
                            for="address_2"
                            class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                        >
                            additional information
                        </label>
                        <input
                            placeholder="enter additional information"
                            type="text"
                            name="address_2"
                            id="address_2"
                            :value="address?.address_2"
                            v-if="address"
                            class="h-[40px] text-[.7rem] text-black/70 border placeholder:uppercase placeholder:text-[.7rem] bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                        />
                        <div v-else>
                            <input
                                placeholder="enter additional information"
                                type="text"
                                name="address_2"
                                id="address_2"
                                v-model="addressForm.address_2"
                                class="h-[40px] text-[.7rem] text-black/70 border placeholder:uppercase placeholder:text-[.7rem] bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                            />
                        </div>
                    </div>

                    <div class="relative z-0 w-full group mt-4">
                        <label
                            for="first_name"
                            class="font-bold capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                        >
                            region
                        </label>

                        <select
                            name="region"
                            v-if="address"
                            :value="address.region"
                            class="h-[40px] text-[.7rem] text-black/70 border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                            id=""
                        >
                            <option value="place select">
                                place select region
                            </option>
                            <option value="oyo">oyo</option>
                        </select>
                        <div v-else>
                            <select
                                name="region"
                                v-model="addressForm.region"
                                :class="[
                                    errors?.region
                                        ? 'border border-red-500'
                                        : '',
                                ]"
                                class="h-[40px] text-[.7rem] text-black/70 border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                                id=""
                            >
                                <option value="place select">
                                    place select region
                                </option>
                                <option value="oyo">oyo</option>
                            </select>
                            <small class="text-red-500" v-if="errors?.region">
                                {{ errors?.region }}
                            </small>
                        </div>
                    </div>
                    <div class="relative z-0 w-full group mt-4">
                        <label
                            for="first_name"
                            class="font-bold z-10 capitalize flex items-center absolute px-1 text-[.7rem] transition-all duration-[300ms] bg-white 0 h-fit -top-[.5rem] left-3 w-auto text-gray-400"
                        >
                            city
                        </label>
                        <select
                            name="city"
                            v-if="address"
                            :value="address?.city"
                            class="h-[40px] text-[.7rem] text-black/70 border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                            id=""
                        >
                            <option value="">place select city</option>
                            <option value="ogbomosho">ogbomosho</option>
                        </select>
                        <div v-else>
                            <select
                                name="city"
                                v-model="addressForm.city"
                                :class="[
                                    errors?.city ? 'border border-red-500' : '',
                                ]"
                                class="h-[40px] text-[.7rem] text-black/70 border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                                id=""
                            >
                                <option value="">place select city</option>
                                <option value="ogbomosho">ogbomosho</option>
                            </select>
                            <small class="text-red-500" v-if="errors?.city">
                                {{ errors?.city }}
                            </small>
                        </div>
                        <!-- <div class="absolute -top-[4px] w-full">
                            <Listbox v-model="selectedPerson">
                                <div class="relative mt-1">
                                    <ListboxButton
                                        class="h-[40px] text-[.7rem] text-black/70 border bg-transparent text-sm rounded focus:ring-0 focus:outline-none focus:border-gray-400 border-gray-400 block w-full p-2.5"
                                    >
                                        <span class="block truncate">{{
                                            selectedPerson.name
                                        }}</span>
                                        <span
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
                                        >
                                            <ChevronUpDownIcon
                                                class="h-5 w-5 text-gray-400"
                                                aria-hidden="true"
                                            />
                                        </span>
                                    </ListboxButton>

                                    <transition
                                        leave-active-class="transition duration-100 ease-in"
                                        leave-from-class="opacity-100"
                                        leave-to-class="opacity-0"
                                    >
                                        <ListboxOptions
                                            class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                                        >
                                            <ListboxOption
                                                v-slot="{ active, selected }"
                                                v-for="person in people"
                                                :key="person.name"
                                                :value="person"
                                                as="template"
                                            >
                                                <li
                                                    :class="[
                                                        active
                                                            ? 'bg-amber-100 text-amber-900'
                                                            : 'text-gray-900',
                                                        'relative cursor-default select-none py-2 pl-10 pr-4',
                                                    ]"
                                                >
                                                    <span
                                                        :class="[
                                                            selected
                                                                ? 'font-medium'
                                                                : 'font-normal',
                                                            'block truncate',
                                                        ]"
                                                        >{{ person.name }}</span
                                                    >
                                                    <span
                                                        v-if="selected"
                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600"
                                                    >
                                                        <CheckIcon
                                                            class="h-5 w-5"
                                                            aria-hidden="true"
                                                        />
                                                    </span>
                                                </li>
                                            </ListboxOption>
                                        </ListboxOptions>
                                    </transition>
                                </div>
                            </Listbox>
                        </div> -->
                    </div>
                </div>
            </div>
            <hr class="my-4" />
            <div class="">
                <div class="flex items-start space-x-4 justify-end">
                    <div>
                        <button class="text-[#f68b1e] px-3 py-2">cancel</button>
                    </div>
                    <div>
                        <div class="">
                            <div v-if="loading">
                                <button
                                    disabled
                                    type="button"
                                    class="bg-[#f68b1e] px-3 py-2 text-white rounded cursor-not-allowed flex items-center justify-center"
                                >
                                    <spinner class="!mr-0" />
                                </button>
                            </div>
                            <div v-else>
                                <button
                                    type="submit"
                                    class="bg-[#f68b1e] px-3 py-2 text-white rounded"
                                >
                                    save
                                </button>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script lang="ts">
import { defineComponent, onMounted, ref } from "vue";
import {
    CheckIcon,
    TicketIcon,
    ChevronUpDownIcon,
} from "@heroicons/vue/24/outline";
import {
    Listbox,
    ListboxLabel,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
} from "@headlessui/vue";
import { useForm } from "@inertiajs/vue3";
import spinner from "../spinner/spinner.vue";
export default defineComponent({
    components: {
        Listbox,
        CheckIcon,
        ListboxLabel,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
        ChevronUpDownIcon,
        spinner,
    },
    props: {
        people: {
            type: Object,
            required: true,
        },
        user: {
            type: Object,
            required: true,
        },
        selectedPerson: {
            type: Object,
            required: true,
        },
        errors: {
            type: Object,
        },
        address: {
            type: Object,
        },
    },
    setup(props) {
        const loading = ref(false);
        // console.log($page.);

        onMounted(() => {
            props.address;
        });
        const addressForm = useForm({
            address_1: "",
            address_2: "",
            tel_1: props.user.phone,
            tel_2: "",
            region: "",
            city: "",
        });

        const submitForm = async () => {
            loading.value = true;
            await addressForm.post(route("checkout"), {
                onFinish: () => {
                    loading.value = false;
                },
            });
            // await addressForm.post(route("checkout.save"), {
            //     onFinish: () => {
            //         loading.value = false;
            //     },
            // });
        };
        return { submitForm, addressForm, loading };
    },
});
</script>

<style scoped></style>
