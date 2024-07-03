<template>
    <div class="container mt-5">
        <div class="card bg-light shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">List Responsables</h3>
                <button @click="createResponsables()" class="btn btn-dark">Create Responsable</button>
            </div>
            <div class="card-body">
                <div v-if="showAlert" class="alert alert-success" role="alert">
                    {{ alertMessage }}
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="responsable in responsables.data" :key="responsable.id">
                            <td>{{ responsable.nombres }}</td>
                            <td>{{ responsable.apellidos }}</td>
                            <td>{{ responsable.email }}</td>
                            <td>{{ responsable.telefono }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <router-link :to="'/editRes/' + responsable.id"
                                        class="btn btn-outline-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </router-link>
                                    <form @click.prevent="deleteResponsable(responsable.id)"
                                        class="delete-form d-inline-block ml-2">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <advanced-laravel-vue-paginate :data="responsables" @paginateTo="getResponsables" />
                <div class="d-flex justify-content-end">
                    <button @click="goBack()" class="btn btn-secondary w-100 mt-3">Back</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            responsables: {},
            showAlert: false,
            alertMessage: ''
        };
    },
    methods: {
        getResponsables(page = 1) {
            axios.get('/responsables?page=' + page)
                .then(response => {
                    this.responsables = response.data;
                    if (this.$route.query.successMessage) {
                        this.showAlert = true;
                        this.alertMessage = this.$route.query.successMessage;
                        setTimeout(() => {
                            this.showAlert = false;
                        }, 3000);
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteResponsable(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este responsable?')) {
                axios.delete('/responsables/' + id)
                    .then(response => {
                        console.log(response.data);
                        this.showSuccessAlert('Responsable deleted successfully');
                        this.getResponsables();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        showSuccessAlert(message) {
            this.alertMessage = message;
            this.showAlert = true;
            setTimeout(() => {
                this.showAlert = false;
            }, 3000);
        },
        createResponsables() {
            this.$router.push('/formRes');
        },
        goBack() {
            this.$router.push('/home');
        }
    },
    created() {
        this.getResponsables();
    }
};
</script>

<style scoped>
.card {
    border-radius: 10px;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

.btn-group .btn {
    margin-right: 5px;
}
</style>
