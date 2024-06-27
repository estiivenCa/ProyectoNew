<template>
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="text-primary">Welcome to the Task Creator App</h1>
            <p class="lead">Select an option from the dropdown menus below</p>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="btn-group mx-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Tasks
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" @click="createTasks()">Create Tasks</a></li>
                    <li><a class="dropdown-item" @click="viewTasks()">View Tasks</a></li>
                </ul>
            </div>
            <div class="btn-group mx-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Responsables
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" @click="createResponsables()">Create Responsables</a></li>
                    <li><a class="dropdown-item" @click="viewResponsables()">View Responsables</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        createTasks() {
            this.$router.push('/form');
        },
        viewTasks() {
            this.$router.push('/');
        },
        createResponsables() {
            this.$router.push('/formRes');
        },
        viewResponsables() {
            this.$router.push('/listRes');
        }
    }
}
</script>

<style scoped>
.container {
    max-width: 600px;
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.text-primary {
    color: #007bff;
    font-weight: bold;
}

.lead {
    font-size: 1.25rem;
    color: #6c757d;
}

.btn-group .btn {
    font-size: 1rem;
    padding: 10px 20px;
}

.btn-group .dropdown-menu .dropdown-item {
    font-size: 0.9rem;
}

@media (max-width: 576px) {
    .container {
        padding: 10px;
    }

    .btn-group {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }

    .btn-group .btn {
        width: 100%;
    }
}
</style>
