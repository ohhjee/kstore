<template>
  <div class="w-full">
    <div class="bg-[#f8991e] relative w-full">
      <img
        src="../../../assets/images/header/free-delivery-banner.gif"
        class="w-[80%] mx-auto px-[8px] object-cover"
        alt=""
      />
    </div>
    <div class="bg-gray-200">
      <div class="container mx-auto py-1">
        <div class="flex items-center justify-between">
          <div>
            <Link href="/" class="flex items-center justify-center text-[#f68b1e]">
              <img
                src="../../../assets/images/header/asset.svg"
                class="h-[18px]"
                alt=""
              />
              <p class="text-[12px] ml-[5px]">sell on jumia</p>
            </Link>
          </div>
          <div>
            <img src="../../../assets/svg/assets/asset_3.svg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Link } from "@inertiajs/vue3";
import { defineComponent } from "vue";

export default defineComponent({
  components: { Link },
  setup() {
    return {};
  },
});
</script>

<style scoped></style>
