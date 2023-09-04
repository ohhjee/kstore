<template>
    <div>
<label for="">
{{label}}
</label>
<input type="text">
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    props:{
label:{
    type:String,
    required:true
},

    },
    setup () {


        return {}
    }
})
</script>

<style scoped>

</style>
