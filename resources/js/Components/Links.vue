<template>
    <div>
        <Link
            :href="href"
            :class="$page.component == comp && 'text-blue-700'"
            class="block py-2 pl-3 pr-4 w-full text-gray-900 rounded md:p-0 dark:border-gray-700"
        >
            {{ name }}
        </Link>
    </div>
</template>

<script lang="ts">
import { defineComponent, defineProps } from "vue";
import { Link } from "@inertiajs/vue3";

export default defineComponent({
    props: {
        name: {
            type: String,
        },
        comp: {
            type: String,
        },
        href: {
            type: String,
        },
    },
    components: { Link },
    setup() {
        // const defProps = defineProps("name", "component", "href")

        return {};
    },
});
</script>

<style scoped></style>
