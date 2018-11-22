<template>
    <div class="menu-w color-scheme-light color-style-default menu-position-top menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-bright menu-activated-on-hover menu-has-selected-link">
        <div class="logo-w">
            <a class="logo" :href="toHome">
                <div class="logo-element"></div>
                <div class="logo-label">Go Next Level</div>
            </a>
        </div>

        <logged-user :user="user"/>
        
        <h1 class="menu-page-header">Menu</h1>
        <ul class="main-menu">
            <li class="sub-header"><span>Navegação</span></li>
            <top-items
                    v-for="(item, index) in topItems"
                    :key="index"
                    :headMenu="item.head"
                    :subMenu="item.submenu"
            ></top-items>
        </ul>
    </div>
</template>

<script>
    import TopItems from './top-items';
    import LoggedUser from './logged-user';

    export default {
        components: {
            TopItems,
            LoggedUser,
        },

        props: ['user'],

        computed: {
            toHome() {
                return laroute.route('home')
            },
            topItems() {
                return [
                    {
                        head: {
                            title: 'Dashboard',
                            icon : 'fas fa-chart-pie',
                            href: '#',
                        },                      
                    },
                    {
                        head: {
                            title: 'Prospectos',
                            icon : 'fas fa-user-tag',
                            href: '#',
                        },
                        submenu: {
                        	title: 'Sub Prospectos',
                        	items: [{
                        		title: 'Teste 1', 
                        		href: laroute.route('user-info'),
                                badge: 'badge badge-warning',
                        	}]
                        }
                    },
                    {
                        head: {
                            title: 'Treinamentos',
                            icon : 'fas fa-dumbbell',
                            href: '#',
                        },
                    },
                    {
                        head: {
                            title: 'Aplicativos',
                            icon : 'fas fa-mobile-alt',
                            href: '#',
                        },
                    },
                    {
                        head: {
                            title: 'Configurações',
                            icon : 'fas fa-cog',
                            href: '#',
                        },                                         
                    },
                ];
            }
        }
    };
</script>

<style>
</style>
