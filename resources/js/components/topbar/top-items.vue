<template>
    <li @mouseover="active = true" @mouseout="active = false" :class="{'has-sub-menu': hasSubMenu, 'active': active, 'selected': selected}">
        <a>
            <div class="icon-w">
                <slot name="head-icon">
                    <div :class="headMenu.icon || 'icon-feather-trending-up'"></div>
                </slot>
            </div>
            <span>
                <slot name="head-title">{{ headMenu.title }}</slot>
            </span>
        </a>
        <div v-if="hasSubMenu" class="sub-menu-w">
            <div v-if="subMenu.title" class="sub-menu-header">{{ subMenu.title }}</div>
            <div class="sub-menu-icon"><i class="icon-feather-trending-up"></i></div>
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li v-for="item in subMenu.items">
                        <a :href="item.href || '#'">{{ item.title }} <strong v-if="item.badge" :class="item.badge || 'badge badge-warning'">Em breve</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                active: false,
            }
        },

        computed: {
            hasSubMenu() {
                return !!this.subMenu;
            }
        },

        props: {
            selected: { type: Boolean, default: false },
            headMenu: { type: Object, default: () => {} },
            subMenu: { type: Object, default: () => {} },
        },
    }
</script>

<style scoped>
    li {
        cursor: pointer;
    }
</style>