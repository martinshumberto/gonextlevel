<template>
    <div class="menu-w color-scheme-light color-style-default menu-position-top menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-bright menu-activated-on-hover menu-has-selected-link">
        <div class="logo-w">
            <a class="logo" href="#">
                <div class="logo-element"></div>
                <div class="logo-label">Go Next Level</div>
            </a>
        </div>

        <div class="logged-user-w avatar-inline">
            <div class="logged-user-i">
                <div class="avatar-w"><img alt="" src="img/avatar3.jpg"></div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">Gabriel</div>
                    <div class="logged-user-role">Admin</div>
                </div>
                <div class="logged-user-toggler-arrow">
                    <div class="os-icon os-icon-chevron-down"></div>
                </div>
                <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                        <div class="avatar-w"><img alt="" src="img/avatar3.jpg"></div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">Gabriel</div>
                            <div class="logged-user-role">Admin</div>
                        </div>
                    </div>
                    <div class="bg-icon"><i class="icon-feather-user"></i></div>
                    <ul>
                        <li><a href="#"><i class="os-icon os-icon-ui-46"></i><span>Meus dados</span></a></li>
                        <li><a href="#"><i class="os-icon os-icon-user-male-circle2"></i><span>Perfil</span></a></li>
                        <li><a href="#"><i class="os-icon os-icon-feather-award"></i><span>Assinatura</span></a></li>
                        <li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notificações</span></a></li>
                        <li><a href="#"><i class="os-icon os-icon-signs-11"></i><span>Sair</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <h1 class="menu-page-header">Menu</h1>
        <ul class="main-menu">
            <li class="sub-header"><span>Navegação</span></li>
            <top-items
                    v-for="(item, index) in topItems"
                    :key="index"
                    :headMenu="item.head"
            ></top-items>
            <!--<li class="active">-->
                <!--<a href="#">-->
                    <!--<div class="icon-w">-->
                        <!--<div class="os-icon os-icon-layout"></div>-->
                    <!--</div>-->
                    <!--<span>Sariema</span>-->
                <!--</a>-->
            <!--</li>-->
            <!--<li class="has-sub-menu active">-->
                <!--<a href="#pros">-->
                    <!--<div class="icon-w">-->
                        <!--<div class="icon-feather-trending-up"></div>-->
                    <!--</div>-->
                    <!--<span>Prospectos</span>-->
                <!--</a>-->
                <!--<div id="pros" class="sub-menu-w">-->
                    <!--<div class="sub-menu-header">Prospectos</div>-->
                    <!--<div class="sub-menu-icon"><i class="icon-feather-trending-up"></i></div>-->
                    <!--<div class="sub-menu-i">-->
                        <!--<ul class="sub-menu">-->
                            <!--<li><a href="#" data-target="#modal-register" data-toggle="modal">Adicionar</a></li>-->
                            <!--<li><a href="#">Pipeline de Prospectos</a></li>-->
                            <!--<li><a href="#">Visão Geral</a></li>-->
                            <!--<li><a href="#">Relatório <strong class="badge badge-warning">Em breve</strong></a></li>-->
                        <!--</ul>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</li>-->
            <!--<li class=" has-sub-menu">-->
                <!--<a href="#">-->
                    <!--<div class="icon-w">-->
                        <!--<div class="icon-feather-play-circle"></div>-->
                    <!--</div>-->
                    <!--<span>Treinamentos</span>-->
                <!--</a>-->
                <!--<div class="sub-menu-w">-->
                    <!--<div class="sub-menu-header">Treinamentos</div>-->
                    <!--<div class="sub-menu-icon"><i class="icon-feather-play-circle"></i></div>-->
                    <!--<div class="sub-menu-i">-->
                        <!--<ul class="sub-menu">-->
                            <!--<li><a href="#">Convidar</a></li>-->
                            <!--<li><a href="#">Apresentar</a></li>-->
                            <!--<li><a href="#">Acompanhar</a></li>-->
                            <!--<li><a href="#">Fechamento</a></li>-->
                            <!--<li><a href="#">SETA</a></li>-->
                            <!--<li><a href="#">Materiais de apoio <strong class="badge badge-danger">Novo</strong></a></li>-->
                        <!--</ul>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</li>-->

            <!--<li class="sub-header"><span>Apps</span></li>-->
            <!--<li class="has-sub-menu">-->
                <!--<a href="#">-->
                    <!--<div class="icon-w">-->
                        <!--<div class="icon-feather-zap"></div>-->
                    <!--</div>-->
                    <!--<span>Aplicativos</span>-->
                <!--</a>-->
                <!--<div class="sub-menu-w">-->
                    <!--<div class="sub-menu-header">Aplicativos</div>-->
                    <!--<div class="sub-menu-icon"><i class="icon-feather-zap"></i></div>-->
                    <!--<div class="sub-menu-i">-->
                        <!--<ul class="sub-menu">-->
                            <!--<li><a href="#">Chat <strong class="badge badge-warning">Em breve</strong></a></li>-->
                            <!--<li><a href="#">Agenda</a></li>-->
                            <!--<li><a href="#">Gestor de equipe <strong class="badge badge-warning">Em breve</strong></a></li>-->
                        <!--</ul>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</li>-->

            <!--<li class="sub-header"><span>Config</span></li>-->
            <!--<li class="has-sub-menu">-->
                <!--<a href="#">-->
                    <!--<div class="icon-w">-->
                        <!--<div class="icon-feather-settings"></div>-->
                    <!--</div>-->
                    <!--<span>Configurações</span>-->
                <!--</a>-->
                <!--<div class="sub-menu-w">-->
                    <!--<div class="sub-menu-header">Configurações</div>-->
                    <!--<div class="sub-menu-icon"><i class="icon-feather-settings"></i></div>-->
                    <!--<div class="sub-menu-i">-->
                        <!--<ul class="sub-menu">-->
                            <!--<li><a href="/config/grupos">Grupos</a></li>-->
                            <!--<li><a href="/config/modelos-de-email">Modelos de e-mail</a></li>-->
                        <!--</ul>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</li>-->
        </ul>
    </div>
</template>

<script>
    import TopItems from './top-items';
export default {
    components: {
        TopItems,
    },

    computed: {
        topItems() {
            return [
                {
                    head: {
                        title: 'Dashboard',
                        icon: 'fas fa-chart-pie',
                    },
                },
                {
                    head: {
                        title: 'Prospectos',
                        icon: 'fas fa-user-tag',
                    },
                },
                {
                    head: {
                        title: 'Treinamentos',
                        icon: 'fas fa-dumbbell',
                    },
                },
                {
                    head: {
                        title: 'Aplicativos',
                        icon: 'fas fa-mobile-alt',
                    },
                },
                {
                    head: {
                        title: 'Configurações',
                        icon: 'fas fa-cog',
                    }
                }
            ];
        }
    }
};
</script>

<style>
</style>
