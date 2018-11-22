<template>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="d-flex justify-content-between" v-click-outside="hideMenu" @click="toggleMenu">
                <div class="avatar-w" :style="avatar"></div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">{{ user.name }}</div>
                </div>
            </div>

            <transition name="fade">
                <div v-if="showMenu" class="logged-user-menu color-style-bright">
                    <div class="bg-icon"><i class="icon-feather-user"></i></div>
                    <ul>
                        <li><a :href="toProfile"><span><i class="fas fa-user-circle mr-2"></i>Perfil</span></a></li>
                        <li><a href="#"><span><i class="fas fa-credit-card mr-2"></i>Assinatura</span></a></li>
                        <li @click="logoutUser"><a href="#"><span><i class="fas fa-sign-out-alt mr-2"></i>Sair</span></a></li>
                    </ul>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                showMenu: false,
            }
        },

        computed: {
            logout() {
                return laroute.route('logout')
            },

            toProfile() {
                return laroute.route('profile.index')
            },

            avatar() {
                return {
                    backgroundImage: `url(${(this.user.profile && this.user.profile.avatar) || 'img/no-avatar.jpg'})`,
                    backgroundSize: '35px 35px',
                    borderRadius: '50%',
                    width: '35px',
                    height: '35px',
                };
            }
        },

        methods: {
            logoutUser() {
                document.getElementById('logout-form').submit();
            },

            toggleMenu() {
                this.showMenu = !this.showMenu;
            },

            hideMenu() {
                this.showMenu = false;
            }
        }
    }
</script>

<style lang="scss">
    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
