<template>
    <div>

        <Head title="About"></Head>

        <div>
            <AuthenticatedLayoutVue>
                this is about
            </AuthenticatedLayoutVue>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { Head } from "@inertiajs/vue3"
import Links from "@/Components/Links.vue"

import AuthenticatedLayoutVue from '@/Layouts/AuthenticatedLayout.vue'


export default defineComponent({

    components: { Head, Links, AuthenticatedLayoutVue },
    setup() {


        return {}
    }
})
</script>

<style scoped>

</style>
