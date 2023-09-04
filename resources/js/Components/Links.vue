<template>
  <div>
    <Link
      :href="href"
      :class="$page.component == comp && '!text-blue-700'"
      class="block py-2 pl-3 pr-4 w-full text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
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
