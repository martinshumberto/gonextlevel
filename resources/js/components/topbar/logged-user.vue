<template>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w"><img alt="" :src="user.profile.avatar || 'img/avatar3.jpg'"></div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">{{ user.name }}</div>
                <div class="logged-user-role">Role</div>
            </div>

            <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w"><img alt="" src="img/avatar3.jpg"></div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">{{ user.name }}</div>
                        <div class="logged-user-role">Admin</div>
                    </div>
                </div>
                <div class="bg-icon"><i class="icon-feather-user"></i></div>
                <ul>
                    <li><a href="#"><i class="os-icon os-icon-ui-46"></i><span>Meus dados</span></a></li>
                    <li><a href="#"><i class="os-icon os-icon-user-male-circle2"></i><span>Perfil</span></a></li>
                    <li><a href="#"><i class="os-icon os-icon-feather-award"></i><span>Assinatura</span></a></li>
                    <li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notificações</span></a></li>
                    <li @click="logoutUser"><a href="#"><i class="os-icon os-icon-signs-11"></i><span>Sair</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        computed: {
            logout() {
                return laroute.route('logout')
            },
        },

        methods: {
            logoutUser() {
                document.getElementById('logout-form').submit();
            }
        }
    }
</script>
