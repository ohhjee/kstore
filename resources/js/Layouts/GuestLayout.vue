<template>
  <header />

  <div class="flex items-center justify-center px-4 sm:px-6 lg:px-8 w-full">
    <div class="w-full max-w-md space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
          {{ title }}
        </h2>
      </div>
      <form class="mt-8 space-y-6" @submit.prevent="submit">
        <slot></slot>
      </form>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    title: { type: String },
  },
emits:["submitForm"],

  setup(_, { emit }) {
    const submit = () => {
      emit("submitForm");
    };

    return { submit };
  },
});
</script>

<style scoped></style>
