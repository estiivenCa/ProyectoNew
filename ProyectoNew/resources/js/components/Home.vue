<template>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="text">Welcome to the task creator app.</h1>
            <p class="lead">Seleccione una opción de los menús desplegables a continuación</p>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="btn-group mx-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Tasks
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" @click="createTasks()"> Create Tasks</a></li>
                    <li><a class="dropdown-item" @click="viewTasks()">View Tasks </a></li>
                </ul>
            </div>
            <div class="btn-group mx-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Responsables
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" @click="createResponsables()">Create Responsables</a></li>
                    <li><a class="dropdown-item" @click="viewResponsables()">View Responsables </a></li>

                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    methods: {
        createTasks() {
            this.$router.push('/form')
        },
        viewTasks(){
            this.$router.push('/')
        },
        createResponsables(){
            this.$router.push('/formRes')
        },
        viewResponsables(){
            this.$router.push('/listRes')
        }
    },
}
</script>

<style scoped>
.container {
    max-width: 600px;
}
.text {
    color: black;
}
</style>