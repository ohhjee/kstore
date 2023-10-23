<template>
    <div class="bg-white shadow-[0px_0px_10px_2px] shadow-slate-400">
        <div class="container mx-auto">
            <div class="grid grid-cols-3 py-4 items-center">
                <div>
                    <Link href="/" class="flex items-center w-[20%]">
                        <img
                            src="../../../assets/images/header/download.png"
                            class="h-4 mr-[5rem]"
                            alt="Flowbite Logo"
                        />
                    </Link>
                </div>
                <div class="text-center">select payment</div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Link } from "@inertiajs/vue3";
import { defineComponent } from "vue";

export default defineComponent({
    components: {
        Link,
    },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
