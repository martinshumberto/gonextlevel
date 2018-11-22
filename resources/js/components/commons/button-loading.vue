<template>
    <button @click="$emit('click', $event)" :class="className">
        <i v-if="loading" class="fas fa-spinner-third fa-spin"></i>
        <slot v-else>Button</slot>
    </button>
</template>

<script>
    export default {
        props: ['className', 'loading']
    }
</script>

<style scoped>

</style>