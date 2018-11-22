<template>
    <div class="element-wrapper">
        <div class="element-box">
            <div class="element-info">
                <div class="element-info-with-icon">
                    <div class="element-info-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="element-info-text">
                        <h3 class="element-inner-header">Seu Perfil</h3>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nome</label>
                <input v-model="form.name" class="form-control" :class="{'is-invalid': hasError('name')}" placeholder="Seu Nome" type="text" required>
                <div class="invalid-feedback">{{ getError('name') }}</div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input v-model="form.email" class="form-control" :class="{'is-invalid': hasError('email')}" placeholder="Seu Email" type="email" required>
                <div class="invalid-feedback">{{ getError('email') }}</div>
            </div>
            <div class="form-group">
                <label>Data de Nascimento</label>
                <input v-model="form.profile.birth_date" class="single-daterange form-control" placeholder="Data do seu Nascimento" type="text" disabled>
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input v-model="form.profile.cpf" class="single-daterange form-control" placeholder="Data do seu Nascimento" type="text" disabled>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Telefone Residêncial</label>
                        <input v-model="form.profile.phone" type="text" class="form-control" :class="{'is-invalid': hasError('phone')}" placeholder="Seu Telefone Residêncial">
                        <div class="invalid-feedback">{{ getError('phone') }}</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Telefone Celular</label>
                        <input v-model="form.profile.cell_phone" type="text" class="form-control" :class="{'is-invalid': hasError('cell_phone')}" placeholder="Seu Telefone Celular">
                        <div class="invalid-feedback">{{ getError('cell_phone') }}</div>
                    </div>
                </div>
                <button class="btn btn-link" @click="toggleChangePassword">Mudar senha</button>
            </div>

            <change-password-form :toggle="changePassword"></change-password-form>

            <fieldset class="form-group">
                <legend>
                    <span>Seu Endereço</span>
                </legend>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Logradouro</label>
                            <input v-model="form.address.street" class="form-control" placeholder="Seu Logradouro" type="text">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Complemento</label>
                            <input v-model="form.address.complement" class="form-control" placeholder="Complemento"  type="text">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>CEP</label>
                            <input v-model="form.address.cep" type="text" class="form-control" placeholder="Seu CEP">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Número</label>
                            <input v-model="form.address.number" type="text" class="form-control" placeholder="Número (Opcional)">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Bairro</label>
                            <input v-model="form.address.district" type="text" class="form-control" placeholder="Seu Bairro">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Cidade</label>
                            <input v-model="form.address.city" type="text" class="form-control" placeholder="Sua Cidade">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Estado</label>
                            <select v-model="form.address.state" class="form-control">
                                <option :value="null" selected disabled>Selecione o Estado</option>
                                <option v-for="state in states" :value="state">{{ state }}</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="d-flex justify-content-center">
                <button-loading @click="save" :loading="form.submitting" className="btn btn-primary btn-save">Salvar</button-loading>
            </div>
        </div>
    </div>
</template>

<script>
    import states from '../../utils/brazil_states';
    import ChangePasswordForm from './change-password-form';
    import Form from "../../utils/Form";

    export default {
        components: {
            ChangePasswordForm,
        },

        props: ['user'],

        data() {
            return {
                form: this.setupForm(this.user),
                changePassword: false,
            }
        },

        computed: {
            states() {
                return states;
            }
        },

        methods: {
            getError(error) {
                return this.form.errors.get(error);
            },

            hasError(error) {
                return this.form.errors.has(error);
            },

            save() {
                this.form.put(laroute.route('profile.update', { profile: this.form.profile.id }))
                    .then(({data}) => alert('Success.'))
            },

            toggleChangePassword() {
                this.changePassword = !this.changePassword;
            },

            setupForm(user) {
                return new Form({
                    name: user.name || '',
                    email: user.email || '',
                    profile: {
                        id: (user.profile && user.profile.id) || '',
                        cpf: (user.profile && user.profile.cpf) || '',
                        birth_date: (user.profile && user.profile.birth_date) || '',
                        phone: (user.profile && user.profile.phone) || '',
                        cell_phone: (user.profile && user.profile.cell_phone) || '',
                    },
                    address: {
                        id: (user.profile.address && user.profile.address.id) || '',
                        street: (user.profile.address && user.profile.address.street) || '',
                        complement: (user.profile.address && user.profile.address.complement) || '',
                        cep: (user.profile.address && user.profile.address.cep) || '',
                        number: (user.profile.address && user.profile.address.number) || '',
                        district: (user.profile.address && user.profile.address.district) || '',
                        city: (user.profile.address && user.profile.address.city) || '',
                        state: (user.profile.address && user.profile.address.state) || '',
                    }
                })
            }
        }
    }
</script>

<style lang="scss">
    .btn-save {
        width: 100%;
    }
</style>