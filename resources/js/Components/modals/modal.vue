<template>
    <div>
        <div class="">
            <slot></slot>
            <!-- {{ payments }} -->
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        payments: { type: Object },
    },
    setup() {
        return {};
    },
});
</script>

<style scoped lang="scss"></style>
