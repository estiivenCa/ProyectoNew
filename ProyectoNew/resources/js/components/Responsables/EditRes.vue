<template>
    <div class="container mt-5 bg-light p-5 rounded shadow-sm">
        <h1 class="text-center mb-4">Edit Responsable {{ id }}</h1>
        <form method="POST" v-on:submit.prevent="saveResponsable">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" v-model="responsable.nombres" placeholder="Nombre"
                    class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" v-model="responsable.apellidos" placeholder="Apellidos"
                    class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" v-model="responsable.email" placeholder="Email"
                    class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" v-model="responsable.telefono" placeholder="Teléfono"
                    class="form-control border-0 border-bottom border-dark text-center">
            </div>
            <div class="form-group mt-4 text-center">
                <input type="submit" value="Save" class="btn btn-success border-0 px-5">
                <button @click="goBack()" class="btn btn-secondary ml-2 px-5">Back</button>
            </div>
        </form>
    </div>
</template>


<script>
import axios from "axios";

export default {
    data() {
        return {
            id: this.$route.params.id,
            responsable: {}
        };
    },
    created() {
        axios.get('/responsible/' + this.id + '/editRes')
            .then(response => { this.responsable = response.data; })
            .catch(error => { console.log(error) });
    },
    methods: {
        saveResponsable() {
            axios.put('/responsible/' + this.id, this.responsable)
                .then(response => { console.log(response.data) })
                .catch(error => { console.log(error.response) });
            this.$router.push('/listRes');
        },
        goBack() {
            this.$router.push('/listRes')
        },
    }
}
</script>