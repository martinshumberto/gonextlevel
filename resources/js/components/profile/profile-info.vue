<template>
    <div class="user-profile compact">
        <div class="up-head-w" :style="avatar">
            <div class="up-social cursor-pointer">
                <label for="upload-photo"><i class="fas fa-images"></i></label>
                <input ref="file" @change="processFile" id="upload-photo" type="file" hidden>
            </div>
            <div class="up-main-info">
                <h2 class="up-header">{{ user.name }}</h2>
            </div>
            <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                    <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
                </g>
            </svg>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                avatarProfile: this.user.profile && this.user.profile.avatar,
            }
        },

        computed: {
            avatar() {
                return `background-image:url(${this.avatarProfile || 'img/no-avatar.jpg'})`;
            }
        },

        methods: {
            processFile() {
                const file = this.$refs.file.files[0];

                console.log(file);
                let form = new FormData;
                form.append('avatar', file);
                form.append('old_path', this.avatarProfile);

                axios.post(laroute.route('profile.upload'), form)
                    .then(({data}) => this.avatarProfile = data.path)
            }
        }
    }
</script>
