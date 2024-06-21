<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Create Responsable</h2>
            </div>
            <div class="card-body">
                <form method="POST" v-on:submit.prevent="saveResponsable()">
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombres:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" v-model="responsables.nombres" required>
                            <div v-if="$v.responsables.nombres.$error" class="text-danger">Campo obligatorio</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellidos" v-model="responsables.apellidos" required>
                            <div v-if="$v.responsables.apellidos.$error" class="text-danger">Campo obligatorio</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" v-model="responsables.email" required>
                            <div v-if="$v.responsables.email.$error" class="text-danger">
                                <div v-if="!$v.responsables.email.required">Email es requerido</div>
                                <div v-if="!$v.responsables.email.email">Email no es válido</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="telefono" v-model="responsables.telefono" required>
                            <div v-if="$v.responsables.telefono.$error" class="text-danger">
                                <div v-if="!$v.responsables.telefono.required">Teléfono es requerido</div>
                                <div v-if="!$v.responsables.telefono.numeric">Teléfono debe contener solo números</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" v-if="!$v.$invalid" class="btn btn-success ml-2 text-white mr-2">Guardar</button>
                            <button @click="goBack()" class="btn btn-secondary ml-2">Back</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { required, email, numeric } from 'vuelidate/lib/validators';

export default {
    data() {
        return {
            responsables: {
                nombres: '',
                apellidos: '',
                email: '',
                telefono: ''
            }
        };
    },
    validations: {
        responsables: {
            nombres: { required },
            apellidos: { required },
            email: { required, email },
            telefono: { required, numeric }
        }
    },
    methods: {
        saveResponsable() {
            if (!this.$v.$invalid) {
                axios.post('/responsables', this.responsables)
                    .then(response => { console.log(response) })
                    .catch(error => { console.log(error.response) });
                this.responsables = {
                    nombres: '',
                    apellidos: '',
                    email: '',
                    telefono: ''
                };
                this.$router.push('/listRes');
            }
        },
        goBack() {
            this.$router.push('/listRes');
        },
    }
};
</script>