<template>
    <div
        class="flex items-center h-[100vh] justify-center bg-black/60 fixed w-full left-0 top-0 right-0 bottom-0"
    >
        <div
            class="h-fit w-11/12 sm:w-6/12 md:w-5/12 lg:w-4/12 bg-white rounded-md"
        >
            <div class="p-2 flex justify-end">
                <XMarkIcon
                    @click="cancel"
                    class="w-4 h-4 hover:text-red-500 cursor-pointer transition-all duration-[400ms] ease-in-out"
                />
            </div>
            <hr />

            <div class="p-2 text-center my-4">
                Are you sure you want to remove product from cart?
            </div>
            <div class="flex items-center justify-end space-x-4 p-2">
                <button
                    @click="cancel"
                    class="border px-4 py-1 rounded border-blue-[#f68b1e] bg-[#f68b1e] text-white capitalize"
                >
                    cancel
                </button>
                <button
                    @click="deleteItem"
                    class="border px-4 py-1 rounded border-red-500 bg-red-500 text-white capitalize"
                >
                    delete
                </button>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { XMarkIcon } from "@heroicons/vue/24/outline";
import { defineComponent, ref } from "vue";

export default defineComponent({
    components: { XMarkIcon },

    emits: ["cancel", "removeCart"],
    setup(_, { emit }) {
        const cancel = () => {
            emit("cancel");
        };
        const deleteItem = (id: number) => {
            emit("removeCart");
        };
        return { cancel, deleteItem };
    },
});
</script>

<style scoped></style>
