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
                            <input type="email" class="form-control" id="email" v-model="responsables.email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="telefono" v-model="responsables.telefono" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button @click="goBack()" class="btn btn-secondary ml-2">Back</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>



<script>
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
    methods: {
        saveResponsable() {
            axios.post('/responsables',   this.responsables, )
                .then(response => { console.log(response) })
                .catch(error => { console.log(error.response) });
                this.responsables = {
                        nombres: '',
                        apellidos: '',
                        email: '',
                        telefono: ''
                    };
            this.$router.push('/listRes');

        },
        goBack() {
            this.$router.push('/listRes')
        },
    }
};
</script>

<style scoped>
/* Estilos específicos del componente si los necesitas */
</style>