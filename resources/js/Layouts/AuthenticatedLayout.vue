<template>
  <div class>
    <Header />
    <NavbarVue></NavbarVue>
    <main class="container mx-auto">
      <slot></slot>
    </main>
  </div>
</template>

<script lang="ts">
import Header from "@/Components/Header/Header.vue";
import NavbarVue from "@/Components/Navbar.vue";
import { defineComponent } from "vue";

export default defineComponent({
  components: { NavbarVue, Header },
  setup() {
    return {};
  },
});
</script>

<style scoped></style>
