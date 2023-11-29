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
//  padding: 14px 30px;
//     border-radius: 8px;
//     width: 100%;
//     text-transform: capitalize;
//     color: white;
</script>

<style scoped lang="scss">
.btn {
    height: 1.5rem;
    width: 1.5rem;
    &.primary {
        background: blue;
    }
    &.jumia-color {
        background-color: #f68b1e;
    }
    &.out-of-stock {
        background-color: gray;
        cursor: not-allowed;
        border-radius: 4px;
    }
}
</style>
