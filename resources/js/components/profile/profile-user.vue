<template>
    <section class="container">
        <section class="row">
            <section class="col-12 col-md-4">
                <profile-info :user="user"></profile-info>
            </section>
            <section class="col-12 col-md-8">
                <profile-form :user="user"></profile-form>
            </section>
        </section>
    </section>
</template>

<script>
    import ProfileInfo from './profile-info';
    import ProfileForm from './profile-form';
    export default {
        components: {
            ProfileInfo,
            ProfileForm,
        },
        props: ['user'],
    }
</script>

<style scoped>

</style>