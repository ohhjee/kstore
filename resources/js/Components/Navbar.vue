<template>
    <div>
        <!-- TODO:: make user see all except profile nav -->
        <nav class="bg-white shadow-[0px_0px_5px_0px] shadow-slate-300 w-full">
            <div class="container mx-auto">
                <div
                    class="max-w-screen-xl flex flex-wrap items-center mx-auto space-x-2 p-4"
                >
                    <Link href="/" class="flex items-center w-[20%]">
                        <img
                            src="../../assets/images/header/download.png"
                            class="h-4 mr-[5rem]"
                            alt="Flowbite Logo"
                        />
                    </Link>
                    <!-- {{ $page.props.auth.user }} -->
                    <div
                        class="items-center justify-start flex md:order-1 w-9/12"
                        id="navbar-cta"
                    >
                        <div class="w-8/12">
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
                                            v-if="!$page.props.auth.isLoggedIn"
                                        >
                                            <UserIcon
                                                class="ml-2 mr-2 h-5 w-5 text-black hover:text-violet-100"
                                                aria-hidden="true"
                                            />
                                            Account
                                        </div>
                                        <div v-else>
                                            {{
                                                $page.props.auth.user
                                                    ?.first_name
                                            }}
                                            {{
                                                $page.props.auth.user?.last_name
                                            }}
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
                                                    <!-- <UserIcon class="mr-2 h-5 w-5" aria-hidden="true" /> -->
                                                    Sign in
                                                </Link>
                                            </MenuItem>
                                        </div>
                                        <div class="px-1 py-1" v-else>
                                            <div class="px-1 py-1">
                                                <MenuItem>
                                                    <Link
                                                        href="#"
                                                        name="profile"
                                                        comp="profile"
                                                        class="flex w-full items-center rounded-md px-2 justify-center bg-[#f68b1e] text-white py-2 text-sm text-center border"
                                                    >
                                                        <!-- <UserIcon class="mr-2 h-5 w-5" aria-hidden="true" /> -->
                                                        logout
                                                    </Link>
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
                                                    href="/profile"
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

                                        <!-- <MenuItem>
                      <Link
                        href="/logout"
                        as="button"
                        name="logout"
                        method="get"
                        type="button"
                        comp="logout"
                        class="flex w-full items-center rounded-md text-black px-2 py-2 text-sm"
                      >
                        <div class="w-6 h-6 mr-2">
                          <ArrowLeftOnRectangleIcon
                            class="w-full h-full mr-2 text-black"
                          />
                        </div>
                        logout
                      </Link>
                    </MenuItem> -->
                                    </MenuItems>
                                </transition>
                            </Menu>
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
                                                <!-- <div></div> -->

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

                        <div class="flex items-center justify-center">
                            <ShoppingBagIcon class="w-4 h-4" />
                            <p>cart</p>
                        </div>
                        <!-- <ul
                  class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                  <li>
                    <Links href="/" name="Home" comp="Home" />
                  </li>
                  <li>
                    <Links href="/test" name="Test" comp="Test" />
                  </li>
                  <li>
                    <Links href="/about" name="About" comp="about" />
                  </li>
                </ul> -->
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";
import { Link } from "@inertiajs/vue3";
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
} from "@heroicons/vue/24/outline";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import Links from "./Links.vue";

export default defineComponent({
    props: { user: { type: Array } },
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
    },
    setup(props) {
        // console.log();
        interface Islink {
            id: number;
            link: string;
            href: string;
        }

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

        return { navbar, links };
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
