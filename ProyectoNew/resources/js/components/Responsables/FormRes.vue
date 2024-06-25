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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellidos" v-model="responsables.apellidos" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" v-model="responsables.email" required maxLength="30">
                            <div v-if="$v.responsables.email.$error" class="text-danger">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="telefono" v-model="responsables.telefono" required minlength="10" >
                            <div v-if="$v.responsables.telefono.$error" class="text-danger">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" v-if="!$v.$invalid" class="btn btn-success ml-2 text-white mr-2">Save</button>
                            <button @click="goBack()" class="btn btn-secondary ml-2">Back</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { required, email, numeric, maxLength, minLength } from 'vuelidate/lib/validators';
import axios from 'axios';

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
            email: { required, email, minLength: minLength(5), maxLength: maxLength(30) },
            telefono: { required, numeric, minLength: minLength(10), maxLength: maxLength(10) }
        }
    },
    methods: {
        saveResponsable() {
            if (!this.$v.$invalid) {
                axios.post('/responsables', this.responsables)
                    .then(response => {
                        this.$router.push({ path: '/listRes', query: { successMessage: 'Responsable created successfully!' } });
                    })
                    .catch(error => { console.log(error.response) });
                this.responsables = {
                    nombres: '',
                    apellidos: '',
                    email: '',
                    telefono: ''
                };
            }
        },
        goBack() {
            this.$router.push('/listRes');
        },
    }
};
</script>
