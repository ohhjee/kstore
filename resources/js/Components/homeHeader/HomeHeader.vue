<template>
    <div class="container mx-auto my-[2rem] px-[3rem] sm:px-0">
        <div
            class="relative flex items-center justify-between md:space-x-3"
            id="show_on_1115_width"
        >
            <div
                class="px-2 w-2/12 rounded hidden md:block bg-white shadow-[0px_0px_5px] shadow-gray-300"
            >
                <div class="h-full">
                    <div>
                        <!-- <Link
              v-for="nav in Navbar"
              :key="nav.id"
              :href="nav.href"
              class="flex items-center h-[32px] capitalize text-[.8rem]"
            >
              {{ nav.title }}
            </Link> -->

                        <div
                            class="text-[.8rem]"
                            @mouseleave="supout"
                            @mouseenter="sup"
                        >
                            <Link
                                href="#"
                                class="flex items-center h-[32px] capitalize"
                            >
                                supermarket
                            </Link>
                            <div
                                id="sup"
                                class="absolute w-[80%] overflow-hidden h-full bg-white top-0 p-2 mx-auto border-l border right-0 opacity-0 pointer-events-none"
                            >
                                <div
                                    class="flex items-start space-x-2 justify-between text-[#313133]"
                                >
                                    <div class="w-4/12">
                                        <div class="w-full pb-2 border-b">
                                            <Link href="#" class="block w-full"
                                                >FOOD AND CUPBOARD</Link
                                            >
                                        </div>
                                        <ul class="space-y-1 text-[#75757a]">
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Grains & Rice</Link
                                                >
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Pasta & Noodles
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Breakfast Foods
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Herbs, Spices & Seasoning
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Flours & Meals
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Malt Drinks
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Coffee
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Water
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Cooking Oil
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Juices
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Soft Drinks
                                                </Link>
                                            </li>
                                            <li>
                                                <Link
                                                    href="#"
                                                    class="hover:text-[#f68b1e]"
                                                >
                                                    Canned & Packaged Foods
                                                </Link>
                                            </li>
                                            <li>
                                                <Link href="#">
                                                    Candy & Chocolate
                                                </Link>
                                            </li>
                                            <li>
                                                <Link href="#">
                                                    Syrups, Sugars & Sweeteners
                                                </Link>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="w-4/12">
                                        <div class="pb-[16px]">
                                            <div class="w-full pb-2 border-b">
                                                <Link
                                                    href="#"
                                                    class="block w-full"
                                                >
                                                    BEVERAGES
                                                </Link>
                                            </div>
                                            <ul
                                                class="space-y-1 text-[#75757a]"
                                            >
                                                <li>
                                                    <Link href="#">
                                                        Soft Drink Milk & Cream
                                                    </Link>
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Energy Drink Bottled
                                                    </Link>
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Beverages
                                                    </Link>
                                                </li>
                                            </ul>
                                            <!-- <Link></Link> -->
                                        </div>
                                        <div class="pb-[16px]">
                                            <!-- <div>Household Cleaning</div> -->
                                            <div class="w-full pb-2 border-b">
                                                <Link
                                                    href="#"
                                                    class="block w-full"
                                                >
                                                    Household Cleaning</Link
                                                >
                                            </div>
                                            <ul
                                                class="space-y-1 text-[#75757a]"
                                            >
                                                <li>
                                                    <Link href="#">
                                                        Laundry</Link
                                                    >
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Air Fresheners</Link
                                                    >
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Toilet Paper & Wipes
                                                    </Link>
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Bathroom Cleaners
                                                    </Link>
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Dishwashing
                                                    </Link>
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Cleaning Tools
                                                    </Link>
                                                </li>
                                            </ul>
                                        </div>
                                        <div>
                                            <div></div>
                                            <div class="w-full pb-2 border-b">
                                                <Link
                                                    href="#"
                                                    class="block w-full"
                                                    >Beer, Wine & Spirits</Link
                                                >
                                            </div>
                                            <ul
                                                class="space-y-1 text-[#75757a] capitalize"
                                            >
                                                <li>
                                                    <Link href="#"> Beer</Link>
                                                </li>
                                                <li>
                                                    <Link href="#">vodka</Link>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="w-4/12">
                                        <div class="w-full pb-2 border-b">
                                            <Link href="#" class="block w-full">
                                                Baby Products
                                            </Link>
                                        </div>
                                        <div>
                                            <ul
                                                class="space-y-1 text-[#75757a] capitalize"
                                            >
                                                <li>
                                                    <Link href="#">
                                                        Disposable Diapers</Link
                                                    >
                                                </li>
                                                <li>
                                                    <Link href="#"
                                                        >Bottle Feeding</Link
                                                    >
                                                </li>
                                                <li>
                                                    <Link href="#">
                                                        Wipes & Refills
                                                    </Link>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <Link
                            @mouseenter="health"
                            @mouseleave="healthout"
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            health & beauty
                            <div
                                id="health"
                                class="absolute w-[80%] overflow-hidden h-full bg-white top-0 p-2 mx-auto border-l border right-0 opacity-0 pointer-events-none"
                            >
                                lorem
                            </div>
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            home & office
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            appliances
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            phone & tablet
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            computing
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            electronics
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            fashion
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            baby product
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            gaming
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            sporting goods
                        </Link>
                        <Link
                            href="#"
                            class="flex items-center h-[32px] capitalize text-[.8rem]"
                        >
                            other categories
                        </Link>
                    </div>
                    <div></div>
                </div>
            </div>
            <div class="md:w-7/12 w-full rounded-[4px] h-[386px]" id="width">
                <Carousel
                    v-bind="settings"
                    class="w-full h-full rounded-[4px]"
                    :wrap-around="true"
                >
                    <slide
                        v-for="image in imageSlider"
                        :key="image.id"
                        class="!h-full rounded-[4px] !w-full"
                    >
                        <div class="carousel__item w-full h-full">
                            <img
                                :src="image.title"
                                alt=""
                                srcset=""
                                class="h-full w-full rounded-[4px]"
                            />
                        </div>
                    </slide>
                    <template #addons>
                        <Pagination />
                        <Navigation />
                    </template>
                </Carousel>
            </div>
            <div
                class="flex justify-between flex-col w-2/12 h-[386px]"
                id="_screen_1115"
            >
                <div class="">
                    <div>
                        <img :src="image_ls_2" class="rounded-[4px]" alt="" />
                    </div>
                </div>
                <div class="">
                    <div>
                        <img :src="image_ls_1" class="rounded-[4px]" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Link } from "@inertiajs/vue3";
import { defineComponent, ref } from "vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

export default defineComponent({
    components: { Link, Carousel, Slide, Pagination, Navigation },
    setup() {
        interface IsSlider {
            title: string;
            id: number;
        }

        const image_ls_1 = new URL(
            "../../../assets/images/slider/ls/JForce.png",
            import.meta.url
        ).href;
        const image_ls_2 = new URL(
            "../../../assets/images/slider/ls/official-store.jpg",
            import.meta.url
        ).href;

        const image_1 = new URL(
            "../../../assets/images/slider/Desktop-Homepage-Slider_712x384-updated.jpg",
            import.meta.url
        ).href;
        const image_2 = new URL(
            "../../../assets/images/slider/Desktop_Homepage_Slider__712x384 (1).png",
            import.meta.url
        ).href;
        const image_3 = new URL(
            "../../../assets/images/slider/Desktop_Homepage_Slider__712x384.png",
            import.meta.url
        ).href;
        const image_4 = new URL(
            "../../../assets/images/slider/DesktopHomepageSlider712x384.jpg",
            import.meta.url
        ).href;
        const image_5 = new URL(
            "../../../assets/images/slider/homepage_slider.jpg",
            import.meta.url
        ).href;
        const image_6 = new URL(
            "../../../assets/images/slider/Mensfashion-slider.jpg",
            import.meta.url
        ).href;
        const image_7 = new URL(
            "../../../assets/images/slider/Slider.png",
            import.meta.url
        ).href;

        const imageSlider = ref<IsSlider[]>([
            {
                title: image_1,
                id: 1,
            },
            {
                title: image_2,
                id: 2,
            },
            {
                title: image_3,
                id: 3,
            },
            {
                title: image_4,
                id: 4,
            },
            {
                title: image_5,
                id: 5,
            },
            {
                title: image_6,
                id: 6,
            },
            {
                title: image_7,
                id: 7,
            },
        ]);
        const settings = {
            itemsToShow: 1,
            snapAlign: "center",
            itemsToScroll: 1,
            autoplay: 5000,
        };

        const supermarket = ref(false);
        const sup = () => {
            document.getElementById("sup")?.classList.add("sup");
            supermarket.value = true;
        };
        const supout = () => {
            document.getElementById("sup")?.classList.remove("sup");
        };
        const health = () => {
            document.getElementById("health")?.classList.add("sup");
        };
        const healthout = () => {
            document.getElementById("health")?.classList.remove("sup");
        };
        return {
            sup,
            supout,
            health,
            healthout,
            supermarket,
            imageSlider,
            settings,
            image_ls_1,
            image_ls_2,
        };
    },
});
</script>

<style lang="scss">
.sup {
    opacity: 1;
    pointer-events: all;
    transition: 400ms all ease-in;
    z-index: 99;
    left: 180px;
}
.health {
    opacity: 1;
    pointer-events: all;
    transition: 400ms all ease-in;
}

.carousel__viewport {
    height: 100% !important;
    .carousel__track {
        height: 100% !important;
    }
}
.carousel__pagination {
    position: absolute;
    bottom: 0;
    right: 0;
    left: 0;
    .carousel__pagination-item {
        .carousel__pagination-button {
            &::after {
                height: 8px;
                width: 8px;
                border-radius: 50%;
            }
            &.carousel__pagination-button--active::after {
                background-color: #f68b1e;
            }
        }
    }
}
.carousel__next,
.carousel__prev {
    opacity: 0;
    height: 34px;
    width: 34px;
    border-radius: 50%;
    background: #313133;
    color: white;
    pointer-events: all;
    .carousel__icon {
        height: 15px;
        width: 15px;
    }
    &:hover {
        height: 34px;
        width: 34px;
        border-radius: 50%;
        background: #313133;
        color: white;
        pointer-events: all;
        opacity: 1;
        pointer-events: all;
    }
}
@media only screen and (max-width: 1115px) {
    #_screen_1115 {
        display: none !important;
    }
    #show_on_1115_width {
        justify-content: flex-start;
        #width {
            width: 100%;
        }
    }
    .sup {
        left: 85px !important;
    }
}
</style>
