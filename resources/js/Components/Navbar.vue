<template>
    <div>
        <!-- TODO:: make user see all except profile nav -->
        <nav class="bg-white shadow-[0px_0px_5px_0px] shadow-slate-300 w-full">
            <div class="container mx-auto">
                <div
                    class="justify-between flex flex-wrap items-center mx-auto md:space-x-2 p-4"
                >
                    <div class="flex">
                        <div class="md:hidden">
                            <Bars3Icon class="h-5 w-5 mr-1" />
                        </div>
                        <Link href="/" class="flex items-center w-full">
                            <img
                                src="../../assets/images/header/download.png"
                                class="h-4 mr-[4rem]"
                                alt="Flowbite Logo"
                            />
                        </Link>
                    </div>

                    <div
                        class="items-center justify-end flex md:order-1 md:w-9/12"
                        id="navbar-cta"
                    >
                        <div class="w-8/12 hidden md:block">
                            <form
                                class="flex items-center justify-center w-full"
                            >
                                <div
                                    class="flex items-center border-[1px] w- rounded-[4px] w-full border-gray-400 justify-center"
                                >
                                    <div class="px-4">
                                        <MagnifyingGlassIcon class="w-6 h-6" />
                                    </div>
                                    <input
                                        type="text"
                                        class="text-[1rem] w-full truncate whitespace-nowrap border-0 focus:shadow-none focus:ring-0 focus:outline-none rounded-[4px]"
                                        placeholder="Search product and brands categories"
                                    />
                                </div>
                                <div class="ml-2">
                                    <button
                                        class="px-[16px] shadow-[0_4px_8px_0_rgba(0,0,0,.2)] rounded-[4px] py-[12px] leading-[16px] bg-[#f68b1e] text-[.8rem] text-white"
                                    >
                                        search
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div
                            class="z-99999 relative flex items-center justify-center text-right"
                        >
                            <Menu
                                as="div"
                                class="relative inline-block text-left"
                            >
                                <div>
                                    <MenuButton
                                        class="flex w-full px-[16px] py-[12px] items-center justify-center rounded-md text-sm font-medium hover:bg-opacity-30 focus:outline-none"
                                    >
                                        <div
                                            class="flex items-center"
                                            v-if="!$page.props.auth.isLoggedIn"
                                        >
                                            <UserIcon
                                                class="ml-2 mr-2 h-5 w-5 text-black hover:text-violet-100"
                                                aria-hidden="true"
                                            />
                                            <span class="hidden md:block">
                                                Account
                                            </span>
                                        </div>
                                        <div
                                            v-else
                                            class="whitespace-nowrap mx-[10px]"
                                        >
                                            {{ user?.first_name }}
                                            {{ user?.last_name }}
                                        </div>
                                    </MenuButton>
                                </div>

                                <transition
                                    enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0"
                                >
                                    <MenuItems
                                        class="absolute right-0 mt-2 w-56 origin-top-right divide-y z-[9] divide-gray-300 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    >
                                        <div
                                            class="px-1 py-1"
                                            v-if="!$page.props.auth.isLoggedIn"
                                        >
                                            <MenuItem>
                                                <Link
                                                    href="/login"
                                                    name="profile"
                                                    comp="profile"
                                                    class="flex w-full items-center rounded-md px-2 justify-center bg-[#f68b1e] text-white py-2 text-sm text-center border"
                                                >
                                                    Sign in
                                                </Link>
                                            </MenuItem>
                                        </div>
                                        <div class="px-1 py-1" v-else>
                                            <div class="px-1 py-1">
                                                <MenuItem>
                                                    <Links
                                                        href="/logout"
                                                        as="button"
                                                        name="logout"
                                                        method="get"
                                                        type="button"
                                                        comp="logout"
                                                        class="flex w-full items-center rounded-md px-2 justify-center bg-[#f68b1e] !text-white py-2 text-sm text-center border"
                                                    >
                                                        logout
                                                    </Links>
                                                </MenuItem>
                                            </div>
                                            <MenuItem>
                                                <Link
                                                    href="/profile"
                                                    class="flex w-full items-center capitalize rounded-md text-black px-2 py-2 text-sm"
                                                >
                                                    <div class="w-6 h-6 mr-2">
                                                        <UserIcon
                                                            class="ml-2 mr-2 h-5 w-5 text-black hover:text-violet-100"
                                                            aria-hidden="true"
                                                        />
                                                    </div>
                                                    profile
                                                </Link>
                                            </MenuItem>

                                            <MenuItem>
                                                <Link
                                                    href="/order"
                                                    class="flex w-full items-center capitalize rounded-md text-black px-2 py-2 text-sm"
                                                >
                                                    <div class="w-6 h-6 mr-2">
                                                        <UserIcon
                                                            class="ml-2 mr-2 h-5 w-5 text-black hover:text-violet-100"
                                                            aria-hidden="true"
                                                        />
                                                    </div>
                                                    order
                                                </Link>
                                            </MenuItem>
                                            <MenuItem>
                                                <Link
                                                    href="/profile"
                                                    class="flex w-full items-center capitalize rounded-md text-black px-2 py-2 text-sm"
                                                >
                                                    <div class="w-6 h-6 mr-2">
                                                        <UserIcon
                                                            class="ml-2 mr-2 h-5 w-5 text-black hover:text-violet-100"
                                                            aria-hidden="true"
                                                        />
                                                    </div>
                                                    saved items
                                                </Link>
                                            </MenuItem>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </div>
                        <div
                            class="z-99999 relative hidden md:flex items-center justify-center text-right"
                        >
                            <Menu
                                as="div"
                                class="relative inline-block text-left"
                            >
                                <div>
                                    <MenuButton
                                        class="flex w-full px-[16px] py-[12px] items-center justify-center rounded-md text-sm font-medium hover:bg-opacity-30 focus:outline-none"
                                    >
                                        <QuestionMarkCircleIcon
                                            class="ml-2 mr-2 h-5 w-5 text-black"
                                            aria-hidden="true"
                                        />
                                        Help
                                    </MenuButton>
                                </div>

                                <transition
                                    enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0"
                                >
                                    <MenuItems
                                        class="absolute right-0 mt-2 w-56 origin-top-right divide-y z-[9] divide-gray-300 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    >
                                        <div class="px-1 py-1">
                                            <MenuItem
                                                class="flex w-full items-center capitalize rounded-md text-black px-2 py-2 text-sm"
                                                v-for="link in links"
                                                :key="link.id"
                                                :href="link.href"
                                                as="a"
                                            >
                                                {{ link.link }}
                                            </MenuItem>
                                        </div>
                                        <div class="px-1 py-1">
                                            <MenuItem>
                                                <Link
                                                    href="/logout"
                                                    as="button"
                                                    name="logout"
                                                    method="get"
                                                    type="button"
                                                    comp="logout"
                                                    class="flex w-full items-center rounded-md text-white px-2 py-2 text-sm bg-[#f68b1e]"
                                                >
                                                    <div class="w-6 h-6 mr-2">
                                                        <ChatBubbleBottomCenterTextIcon
                                                            class="w-full h-full mr-2 text-white"
                                                        />
                                                    </div>
                                                    Live chat
                                                </Link>
                                            </MenuItem>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </div>

                        <Link
                            href="/cart"
                            class="flex items-center justify-center relative"
                        >
                            <div
                                v-if="Object.keys(cart).length > 0"
                                class="bg-[#f68b1e] flex items-center justify-center rounded-full absolute top-[-10px] left-0 h-4 w-4"
                            >
                                <span class="text-[.7rem] text-white">
                                    {{ Object.keys(cart).length }}
                                </span>
                            </div>
                            <ShoppingBagIcon class="w-4 h-4" />
                            <p class="hidden md:block">cart</p>
                        </Link>
                    </div>

                    <div id="mobile_form" class="w-full md:hidden relative">
                        <form class="flex items-center justify-center w-full">
                            <div
                                class="flex items-center w-full border-gray-400 justify-center relative"
                            >
                                <div class="px-4 absolute left-0">
                                    <MagnifyingGlassIcon class="w-6 h-6" />
                                </div>
                                <input
                                    type="text"
                                    class="text-[1rem] w-full truncate whitespace-nowrap pl-[2.8rem] focus:shadow-none focus:ring-0 focus:outline-none rounded-3xl"
                                    placeholder="Search product and brands categories"
                                />
                                <!-- <input
                                    type="text"
                                    class="w-full rounded-3xl"
                                    placeholder="Search product brands and categories"
                                /> -->
                            </div>
                        </form>
                        <!-- <form>
                            <div class="relative">
                                <div class="px-4">
                                    <MagnifyingGlassIcon class="w-6 h-6" />
                                </div>
                                <input
                                    type="text"
                                    class="w-full rounded-3xl"
                                    placeholder="Search product brands and categories"
                                />
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import {
    ShoppingCartIcon,
    ArrowLeftOnRectangleIcon,
    ChevronDownIcon,
    UserCircleIcon,
    UserIcon,
    MagnifyingGlassIcon,
    QuestionMarkCircleIcon,
    ChatBubbleBottomCenterTextIcon,
    ShoppingBagIcon,
    Bars3Icon,
} from "@heroicons/vue/24/outline";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import Links from "./Links.vue";

export default defineComponent({
    props: {
        user: { type: Object },
        cart: {
            type: Object,
            required: true,
        },
        // count: {
        //     type: Object,
        // },
    },
    components: {
        Link,
        Links,
        ShoppingCartIcon,
        ArrowLeftOnRectangleIcon,
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
        ChevronDownIcon,
        UserCircleIcon,
        UserIcon,
        MagnifyingGlassIcon,
        QuestionMarkCircleIcon,
        ChatBubbleBottomCenterTextIcon,
        ShoppingBagIcon,
        Bars3Icon,
    },
    setup(props) {
        // console.log(props.count);
        // const getCartLength = Object.entries(props.cart).map(
        //     (res) => res.length
        // );
        // console.log(getCartLength);

        interface Islink {
            id: number;
            link: string;
            href: string;
        }

        // const searchForm = useForm();

        const search = ref(null);
        const searched = () => {};

        const links = ref<Islink[]>([
            { id: 1, href: "#", link: "help center" },
            { id: 2, href: "#", link: "Place and track order" },
            { id: 3, href: "#", link: "Order cancellation" },
            { id: 4, href: "#", link: "return & refund" },
            { id: 5, href: "#", link: "Payment & jumia account" },
        ]);
        const navbar = () => {
            document.getElementById("nth")?.classList.toggle("close");
            document.getElementById("left")?.classList.toggle("left");
            document.getElementById("right")?.classList.toggle("right");

            console.log("working");
        };
        const logout = () => {
            // console.log("hey");

            router.post("/auth/logout");
        };
        // const number = Object.entries(props.count);
        // console.log("cart-Number", number);

        return { navbar, links, logout };
    },
});
</script>

<style scoped type="scss">
.close:nth-child(2) {
    opacity: 0;
    visibility: none;
    transition: 300ms all ease-in;
}

.left {
    transform: rotate(45deg);
    transition: 300ms all ease-in;
    position: absolute;
}

.right {
    transform: rotate(-45deg);
    transition: 300ms all ease-in;
    position: absolute;
    width: 30px !important;
}
</style>
