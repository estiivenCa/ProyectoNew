<template>
    <div class="container mt-5 bg-light p-5 rounded shadow-sm">
        <h1 class="text-center mb-4">Edit Responsable {{ id }}</h1>
        <form @submit.prevent="saveResponsable">
            <div class="form-group">
                <label for="nombre" class="form-label">Name:</label>
                <input type="text" id="nombre" v-model="responsables.nombres" required placeholder="Nombre"
                    class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-3">
                <label for="apellidos" class="form-label">Last Name:</label>
                <input type="text" id="apellidos" v-model="responsables.apellidos" required placeholder="Apellidos"
                    class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" v-model="responsables.email" required maxlength="30" placeholder="Email"
                    class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-3">
                <label for="telefono" class="form-label">Phone:</label>
                <input type="text" id="telefono" v-model="responsables.telefono" required minlength="10"
                    placeholder="Teléfono" class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-4 text-center">
                <div class="col-sm-10 offset-sm-1">
                <button type="submit" v-if="!$v.$invalid" class="btn btn-success ml-2 px-5">
                    Save</button>
                <button @click="goBack" type="button" class="btn btn-secondary ml-2 px-5">Back</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import { required, email, numeric, maxLength, minLength } from 'vuelidate/lib/validators';

export default {
    data() {
        return {
            id: this.$route.params.id,
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
            nombres: { required, minLength: minLength(3), maxLength: maxLength(18) },
            apellidos: { required, minLength: minLength(3), maxLength: maxLength(18) },
            email: { required, email, minLength: minLength(5), maxLength: maxLength(20) },
            telefono: { required, numeric, minLength: minLength(10), maxLength: maxLength(10) }
        }
    },
    created() {
        axios.get(`/responsables/${this.id}/edit`)
            .then(response => {
                this.responsables = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {
        saveResponsable() {
            if (!this.$v.$invalid) {
                axios.put(`/responsables/${this.id}`, this.responsables)
                    .then(response => {
                        console.log(response.data);
                        this.$router.push('/listRes');
                    })
                    .catch(error => {
                        console.error(error.response);
                    });
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
        }
    }
};
</script>
