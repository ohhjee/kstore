<template>
    <Head title="checkout"></Head>
    <Nav />
    <div class="container mx-auto my-[3rem]">
        <div class="rounded grid md:grid-cols-4 gap-4 relative">
            <div class="col-span-4 lg:col-span-3 gap-y-4 grid">
                <div class="gap-4 col-span-4 bg-white">
                    <div class="flex items-center justify-between p-2">
                        <div class="flex items-center">
                            <div
                                class="border flex items-center justify-center h-4 w-4 rounded-full bg-gray-300"
                                :class="address ? ['bg-green-500'] : []"
                            >
                                <CheckIcon class="w-3 h-3 text-white" />
                            </div>
                            <div class="ml-[.7rem] text-[.7rem]">
                                1. CUSTOMER ADDRESS
                            </div>
                        </div>
                    </div>
                    <hr />

                    <div class="p-2">
                        <Address
                            :radioCheck="radioCheck"
                            :user="user"
                            :people="people"
                            :selectedPerson="selectedPerson"
                            :errors="errors"
                            :address="address"
                        />
                    </div>
                </div>
                <div class="gap-4 col-span-4 bg-white p-4"></div>
                <div class="gap-4 col-span-4 bg-white p-4">
                    <div class="gap-4 col-span-3 bg-white">
                        <div class="flex items-center justify-between p-2">
                            <div class="flex items-center">
                                <div
                                    class="border flex items-center justify-center h-4 w-4 rounded-full bg-gray-300"
                                    :class="radioCheck ? ['bg-green-500'] : []"
                                >
                                    <CheckIcon class="w-2 h-2 text-white" />
                                </div>
                                <div class="ml-[.7rem] uppercase text-[.7rem]">
                                    3. payment method
                                </div>
                            </div>

                            <!-- <div class="text-[.7rem]">
                            <a href="#" class="text-blue-600">change ></a>
                        </div> -->
                        </div>
                        <hr />

                        <div class="p-2">
                            <form @submit.prevent="PaymentMethod">
                                <div class="text-[.8rem] capitalize"></div>
                                <div>
                                    <div>Payment on delivery</div>
                                    <div
                                        class="flex mt-3 items-center space-x-2 leading-3"
                                    >
                                        <div>
                                            <input
                                                type="radio"
                                                name=""
                                                v-model="radioCheck"
                                                id="onD"
                                                value="Payment on delivery"
                                                class="text-[#f68b1e] h-3 w-3 !ring-[#f68b1e]"
                                            />
                                        </div>
                                        <label for="onD" class="text-[.9rem]"
                                            >Pay on delivery(large only)
                                            <div class="text-[.7rem]">
                                                with cash, Bank Transfer or
                                                cards
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div>
                                    <div>Cards</div>
                                    <div
                                        class="flex mt-3 items-center space-x-2 leading-3"
                                    >
                                        <div>
                                            <input
                                                type="radio"
                                                name=""
                                                id="card"
                                                v-model="radioCheck"
                                                value="Cards"
                                                class="text-[#f68b1e] h-3 w-3 !ring-[#f68b1e]"
                                            />
                                        </div>
                                        <label for="card" class="text-[.9rem]">
                                            Pay with card transfer or USSD
                                            <div class="text-[.7rem]">
                                                with cash, Bank Transfer or
                                                cards
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="">
                                    <div
                                        class="flex items-start space-x-4 justify-end"
                                    >
                                        <div>
                                            <button
                                                type="submit"
                                                :disabled="!radioCheck"
                                                :class="
                                                    radioCheck
                                                        ? ['bg-[#f68b1e]']
                                                        : [
                                                              'cursor-not-allowed bg-gray-500',
                                                          ]
                                                "
                                                class="bg-[#f68b1e] text-[.9rem] uppercase px-3 py-2 text-white rounded"
                                            >
                                                confirm payment method
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TOTAL PRICE  -->
            <div class="relative grid col-span-4 lg:col-span-1">
                <div class="bg-white rounded h-fit">
                    <div class="text-[.8rem] lg:text-[1rem] p-2">
                        Order summary
                    </div>
                    <hr />
                    <div
                        class="p-2 flex justify-between items-center text-[.8rem]"
                    >
                        <div class="text-capitalize">
                            Item's total({{ count }})
                        </div>
                        {{ nigeria.format(total) }}
                    </div>
                    <hr />
                    <div
                        class="p-2 flex justify-between items-center text-[.8rem] lg:text-[1rem]"
                    >
                        <div class="text-capitalize">Total</div>
                        {{ nigeria.format(total) }}
                    </div>
                    <hr />

                    <div
                        class="p-2 grid grid-cols-6 items-center text-[.8rem] lg:text-[1rem]"
                    >
                        <div class="grid-col-1">
                            <div class="">
                                <TicketIcon class="w-6 h-6 text-[#f68b1e]" />
                            </div>
                        </div>
                        <div class="text-[.7rem] col-span-5">
                            you wil be able to add a voucher when <br />
                            selecting your payment method
                        </div>
                    </div>
                    <hr />
                    <div class="p-2">
                        <form @click.prevent="tet">
                            <input
                                type="hidden"
                                name="reference"
                                :value="reference"
                            />
                            <button
                                :disabled="!address || !radioCheck"
                                :class="
                                    address && radioCheck
                                        ? ['bg-[#f68b1e]']
                                        : ['cursor-not-allowed bg-gray-500']
                                "
                                class="uppercase bg-[#f68b1e] p-2 rounded-[3px] text-white w-full text-[.8rem] lg:text-[1rem]"
                            >
                                confirm order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import Nav from "@/Components/checkoutnav/nav.vue";
import {
    CheckIcon,
    TicketIcon,
    ChevronUpDownIcon,
} from "@heroicons/vue/24/outline";
import { Head, useForm } from "@inertiajs/vue3";
import { defineComponent, onMounted, ref } from "vue";
import {
    Listbox,
    ListboxLabel,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
} from "@headlessui/vue";
import axios from "axios";
import Address from "@/Components/checkoutnav/address.vue";
// CheckIcon
// Head

export default defineComponent({
    components: {
        Nav,
        Head,
        CheckIcon,
        Listbox,
        ListboxLabel,
        ListboxButton,
        ListboxOptions,
        ListboxOption,
        TicketIcon,
        ChevronUpDownIcon,
        Address,
    },

    props: {
        total: {
            type: Number,
            required: true,
        },
        user: {
            type: Object,
        },
        errors: {
            type: Object,
        },
        address: {
            type: Object,
        },
        reference: {
            type: String,
        },
        count: {
            type: Number,
            required: true,
        },
    },
    setup(props) {
        console.log(props.count);

        interface IsCurrency {
            currency: string;
            style: string;
        }
        const nigeria = new Intl.NumberFormat("en-NG", {
            style: "currency",
            currency: "NGN",
        });
        const people = [
            { name: "Wade Cooper" },
            { name: "Arlene Mccoy" },
            { name: "Devon Webb" },
            { name: "Tom Cook" },
            { name: "Tanya Fox" },
            { name: "Hellen Schmidt" },
        ];
        const selectedPerson = ref(people[0]);

        const radioCheck = ref(localStorage.getItem("payment") || "");

        var config = {
            method: "get",
            url: "https://api.countrystatecity.in/v1/countries",
            headers: {
                "X-CSCAPI-KEY": "API_KEY",
            },
        };
        const checkouts = useForm({
            amount: props.total * 100,
            email: props.user?.email,
            reference: props.reference,
            first_name: props.user?.first_name,
            last_name: props.user?.last_name,
            phone: props.user?.phone,
        });
        onMounted(() => {
            // console.log(props.reference);
        });

        const PaymentMethod = () => {
            localStorage.setItem("payment", JSON.stringify(radioCheck.value));
        };
        const getPaymentType = () => {
            if (radioCheck.value === "Cards") {
                localStorage.getItem("payment");
            }
        };
        getPaymentType();
        // axios(config)
        //     .then(function (response) {
        //         console.log(JSON.stringify(response.data));
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });
        // console.log("selectedPerson: ", typeof selectedPerson);
        // console.log("person: ", typeof people);
        // console.log("radioCheck: ", typeof radioCheck);
        // console.log("nigeria: ", typeof nigeria);
        const tet = () => {
            checkouts.post(route("pay"));
        };

        return {
            selectedPerson,
            people,
            nigeria,
            radioCheck,
            tet,
            PaymentMethod,
        };
        // return { nigeria };
    },
});
</script>

<style scoped></style>
