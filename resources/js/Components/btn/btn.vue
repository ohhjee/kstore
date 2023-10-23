<template>
    <div>
        <button :class="['btn', btn]">
            <slot />
        </button>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        btn: {
            type: String,
        },
    },
    setup() {
        return {};
    },
});
</script>

<style scoped lang="scss">
.btn {
    padding: 14px 30px;
    border-radius: 8px;
    width: 100%;
    text-transform: capitalize;
    color: white;
    &.primary {
        background: blue;
    }
    &.jumia-color {
        background-color: #f68b1e;
    }
    &.out-of-stock {
        background-color: gray;
        cursor: not-allowed;
    }
}
</style>
