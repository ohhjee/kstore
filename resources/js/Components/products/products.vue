<template>
    <div>
        <div
            class="border rounded-[.4rem] bg-white space-y-[2rem] mb-[2rem] p-3 sm:mx-3 md:mx-0"
        >
            <div class="grid grid-cols-4 gap-4 lg:grid-cols-6">
                <div v-for="products in products" :key="products.id">
                    <!-- {{ products.title }} -->
                    <Link :href="`/product/${products?.href}`" class="oso">
                        <div class="oso">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-image">
                                        <img :src="products.image" alt="" />
                                    </div>
                                    <div
                                        class="title text-[.6rem] flex sm:text-[.8rem] md:text-[1rem]"
                                    >
                                        {{ products?.title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- <div class="card">
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
                <div class="card-body">
                    <div class="card-image"></div>
                    <div class="title">{{ product.title }}</div>
                </div>
            </div> -->
        </div>
        <div
            class="border bg-white space-y-[2rem] mb-[2rem] p-3 sm:mx-3 md:mx-0 rounded-[4px]"
        >
            <div
                v-if="product.length > 0"
                class="grid h-full grid-cols-4 gap-4 lg:grid-cols-6"
            >
                <div v-for="products in product" :key="products.id">
                    <!-- {{ products.title }} -->
                    <div class="h-full oso">
                        <div class="card">
                            <Link :href="`/product/${products?.slug}`" class="">
                                <div class="card-body">
                                    <div class="card-image h-[175px] border">
                                        <img
                                            :src="products.image"
                                            alt=""
                                            class="h-full"
                                        />
                                    </div>
                                    <div
                                        class="title text-center flex md:block md:text-start text-[.6rem] sm:text-[.8rem] md:text-[1rem]"
                                    >
                                        {{ products?.title }}
                                        <!-- {{}} -->
                                        <br />
                                        {{
                                            nigeria
                                                .format(products?.price)
                                                .replace(/(\.|,)00$/g, "")
                                        }}
                                    </div>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-else
                class="flex items-center justify-center capitalize w-fit"
            >
                <div id="" class="text-center">
                    no products yet😞 <br />
                    product will be added soon
                    <br />
                    Bear with us
                </div>
            </div>
        </div>

        <div>
            <product-slider></product-slider>
        </div>
    </div>
</template>

<script lang="ts">
import { Link } from "@inertiajs/vue3";
import { defineComponent, ref, defineProps } from "vue";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
import productSlider from "../ProductComp/productSlider.vue";
// import Link

export default defineComponent({
    components: {
        productSlider,
        Link,
    },
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        interface jumia {
            id: number;
            title: string;
            href: string;
            image: string;
        }

        const phonetable = new URL(
            "../../../assets/images/cat/phones-tablets_300x240.png",
            import.meta.url,
        ).href;
        const groceries = new URL(
            "../../../assets/images/cat/groceries_300x240v2.png",
            import.meta.url,
        ).href;
        const generic = new URL(
            "../../../assets/images/cat/generic_300x240.jpg",
            import.meta.url,
        ).href;
        const health_beauty = new URL(
            "../../../assets/images/cat/generic_300x240(1).jpg",
            import.meta.url,
        ).href;
        const television = new URL(
            "../../../assets/images/cat/televisions_300x240.png",
            import.meta.url,
        ).href;
        const fashion = new URL(
            "../../../assets/images/cat/fash_300x240.jpg",
            import.meta.url,
        ).href;
        const refrigerators = new URL(
            "../../../assets/images/cat/refrigerators_300x240.png",
            import.meta.url,
        ).href;
        const earphones = new URL(
            "../../../assets/images/cat/earphones_300x240.png",
            import.meta.url,
        ).href;
        const generators = new URL(
            "../../../assets/images/cat/generator.gif",
            import.meta.url,
        ).href;
        const mensSneaker = new URL(
            "../../../assets/images/cat/fashion_300x240.png",
            import.meta.url,
        ).href;
        const watches = new URL(
            "../../../assets/images/cat/watches_300x240.png",
            import.meta.url,
        ).href;
        const clearance = new URL(
            "../../../assets/images/cat/Clearance.gif",
            import.meta.url,
        ).href;

        const products = ref<jumia[]>([
            {
                id: 1,
                title: "phone & tablets",
                href: "phone-tablet",
                image: phonetable,
            },
            {
                id: 2,
                title: "groceries",
                href: "phone-tablet",
                image: groceries,
            },
            {
                id: 3,
                title: "computer deals",
                href: "phone-tablet",
                image: generic,
            },
            {
                id: 4,
                title: "health & beauty",
                href: "phone-tablet",
                image: health_beauty,
            },
            {
                id: 5,
                title: "television",
                href: "phone-tablet",
                image: television,
            },
            {
                id: 6,
                title: "fashion",
                href: "phone-tablet",
                image: fashion,
            },
            {
                id: 7,
                title: "refrigerators",
                href: "phone-tablet",
                image: refrigerators,
            },
            {
                id: 8,
                title: "mobile accessories",
                href: "phone-tablet",
                image: earphones,
            },
            {
                id: 9,
                title: "generators",
                href: "phone-tablet",
                image: generators,
            },
            {
                id: 10,
                title: "men's sneakers",
                href: "phone-tablet",
                image: mensSneaker,
            },
            {
                id: 11,
                title: "watches",
                href: "phone-tablet",
                image: watches,
            },
            {
                id: 12,
                title: "clearance sales",
                href: "phone-tablet",
                image: clearance,
            },
        ]);
        const nigeria = new Intl.NumberFormat("en-NG", {
            style: "currency",
            currency: "NGN",
        });
        return { products, nigeria };
    },
});
</script>

<style lang="scss" scoped>
.oso {
    &:hover {
        transform: scale(1.05);
        box-shadow: 0px 0px 5px lightgray;
        //border-radius: ;
    }
}
.card {
    display: flex;
    .card-body {
        //border-radius: 5px;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        flex: 100%;
        display: flex;
        .card-image {
            //  border-radius: 10px;
            width: 100%;
            //border-radius: 10px;
        }
        .title {
            text-align: start;
            width: 100%;
            //display: flex;
            justify-content: center;
            align-self: center;
            text-transform: capitalize;
        }
    }
}
</style>
