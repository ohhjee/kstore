<template>
    <div>
        <delete-modal> </delete-modal>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import deleteModal from "./deleteModal.vue";

export default defineComponent({
    components: { deleteModal },
    setup() {
        return {};
    },
});
</script>

<style scoped></style>
