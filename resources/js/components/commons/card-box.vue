<template>
    <a class="element-box el-tablo" href="#">
        <div class="label">{{ label }}</div>
        <div class="value">{{ content }}</div>
        <div class="trending trending-up-basic">
            <span>{{ badge.text }}</span>
            <i :class="badge.icon"></i>
        </div>
    </a>
</template>

<script>
export default {
    props: {
        label: { type: String, default: 'Card Box' },
        content: { type: [String, Number], default: 55 },
        badge: {
            type: Object,
            default: () => ({
                text: '12%',
                icon: 'os-icon os-icon-arrow-up2',
            }),
        },
    },
};
</script>

<style>
</style>
