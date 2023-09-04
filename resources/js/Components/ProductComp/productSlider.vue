<template>
    <div>
        <div class=" rounded-[.4rem] bg-white space-y-[2rem] mb-[2rem] p-2">
            <Carousel v-bind="settings">
                <Slide v-for="product in productCarousel" :key="product.id" class="w-full">
                    <div class="card">
                        <div class="card-body w-full">
                            <div class="card-image w-full border border-red-500"></div>
                            <div class="title">{{ product.title }}</div>
                        </div>
                    </div>
                </Slide>
            </Carousel>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

export default defineComponent({
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    setup() {
        interface Products {
            id: number;
            title: string;
            price: number;
            prev_price: number;
        }
        const productCarousel = ref < Products[] > ([{
                id: 1,
                title: "1st product",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 2,
                title: "2st product",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 3,
                title: "3st product",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 4,
                title: "4st product",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 5,
                title: "5st product",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 6,
                title: "6st product",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 7,
                title: "1st product seven",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 8,
                title: "2st product seven",
                price: 2000,
                prev_price: 100,
            },{
                id: 9,
                title: "3st product seven",
                price: 2000,
                prev_price: 100,
            },{
                id: 10,
                title: "4st product seven",
                price: 2000,
                prev_price: 100,
            },{
                id: 11,
                title: "5st product seven",
                price: 2000,
                prev_price: 100,
            },{
                id: 12,
                title: "6st product seven",
                price: 2000,
                prev_price: 100,
            },{
                id: 13,
                title: "7st product seven",
                price: 2000,
                prev_price: 100,
            },
            {
                id: 14,
                title: "8st product seven",
                price: 2000,
                prev_price: 100,
            },{
                id: 15,
                title: "9th product seven",
                price: 2000,
                prev_price: 100,
            },
        ]);
        const settings = {
            itemsToShow: 6,
            snapAlign: "start",
            itemsToScroll: 4,
            mouseDrag: true,
            touchDrag: true,
        };
        return { productCarousel, settings };
    }
})
</script>

<style scoped lang="scss">
.card {
    display: flex;
    .card-body {
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
        flex: 100%;
        display: flex;
        width: 100%;
        .card-image {
            border-radius: 5px;
            background: gray;
            padding: 20px;
            height: 25vh;
            margin: 0px 4px;
            width: 100%;
        }
        .title {
            font-size: 0.8rem;
            text-align: center;
            display: flex;
            justify-content: center;
            align-self: center;
        }
    }

}
.carousel__slide{
    display: block;
}
</style>
