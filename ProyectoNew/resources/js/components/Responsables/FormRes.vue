<template>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center mb-0">Create Responsable</h2>
            </div>
            <div class="card-body">
                <form method="POST" v-on:submit.prevent="saveResponsable()">
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nmae:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" v-model="responsables.nombres" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellidos" v-model="responsables.apellidos"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" v-model="responsables.email" required
                                maxLength="30">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Phone:</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="telefono" v-model="responsables.telefono"
                                required minlength="10" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" v-if="!$v.$invalid" class="btn btn-success text-white mr-2">
                                Save</button>
                            <button @click="goBack()" class="btn btn-secondary">Back</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { required, email, numeric, maxLength, minLength, alpha } from 'vuelidate/lib/validators';
import axios from 'axios';
const alphaSpaces = value => /^[A-Za-z\s]+$/.test(value);

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
            nombres: { required, alphaSpaces, minLength: minLength(3), maxLength: maxLength(18) },
            apellidos: { required, alphaSpaces, minLength: minLength(3), maxLength: maxLength(18) },
            email: { required, email, minLength: minLength(5), maxLength: maxLength(20) },
            telefono: { required, numeric, minLength: minLength(10), maxLength: maxLength(10) }
        }
    },
    methods: {
        saveResponsable() {
            if (!this.$v.$invalid) {
                axios.post('/responsables', this.responsables)
                    .then(response => {
                        this.$router.push({ path: '/listRes', query: { successMessage: 'Responsable create successfully!' } });
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
