<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-5">
                <div class="task-form p-4 shadow rounded bg-light">
                    <h1 class="text-center font-weight-bold py-3 text-dark">Edit Task {{ id }}</h1>
                    <form @submit.prevent="saveTask">
                        <div class="form-group">
                            <label for="fecha">Date</label>
                            <input type="date" v-model="tasks.fecha" class="form-control mb-3" placeholder="New Task"
                                name="fecha">
                            <small v-if="errorFecha" class="text-danger">{{ errorFecha }}</small>
                            <div v-if="$v.tasks.fecha.$error" class="text-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desciption">Description</label>
                            <input type="text" v-model="tasks.todo" required class="form-control mb-3"
                                placeholder="New Task" name="todo">
                            <small v-if="error" class="text-danger">{{ error }}</small>
                            <div v-if="$v.tasks.todo.$error" class="text-danger">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="responsables">Responsable:</label>
                            <select v-model="tasks.responsable_id" required class="form-control" id="responsable"
                                name="responsables">
                                <option v-for="responsable in responsables.data" :key="responsable.id"
                                    :value="responsable.id">{{ responsable.nombres }} {{ responsable.apellidos }}
                                </option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" v-if="!$v.$invalid"
                                class="btn btn-success ml-2 text-white w-48">Save</button>
                            <button @click="goBack" class="btn btn-secondary w-48">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { required, maxLength, minLength, alphaNum } from 'vuelidate/lib/validators';
import axios from 'axios';
const alphaSpaces = value => /^[A-Za-z0-9\s]+$/.test(value);

export default {
    data() {
        return {
            id: this.$route.params.id,
            tasks: {
                todo: '',
                fecha: '',
                completed: false,
                responsable_id: null
            },
            error: '',
            errorFecha: '',
            responsables: { data: [] }
        };
    },
    validations: {
        tasks: {
            todo: {
                required,
                alphaSpaces,
                minLength: minLength(7),
                maxLength: maxLength(50)
            },
            fecha: {
                required
            }
        }
    },
    created() {
        this.getTaskDetails();
        this.getResponsables();
    },
    methods: {
        getTaskDetails() {
            axios.get(`/tasks/${this.id}/edit`)
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(error => {
                    console.error('Error loading task details:', error);
                });
        },
        getResponsables() {
            axios.get('/responsables')
                .then(response => {
                    this.responsables = response.data;
                })
                .catch(error => {
                    console.error('Error loading responsables:', error);
                });
        },
        saveTask() {
            this.$v.$touch();
            if (!this.$v.$invalid) {
                const currentDate = new Date();
                const selectedDate = new Date(this.tasks.fecha);

                if (selectedDate < currentDate) {
                    alert('La fecha no puede ser antigua');
                    this.tasks.fecha = '';
                    return;
                } else {
                    this.errorFecha = '';
                }
                axios.put(`/tasks/${this.id}`, {
                    todo: this.tasks.todo,
                    fecha: this.tasks.fecha,
                    completed: this.tasks.completed,
                    responsable_id: this.tasks.responsable_id
                })
                    .then(response => {
                        console.log(response);
                        this.$router.push('/');
                    })
                    .catch(error => {
                        console.error('Error saving task:', error);
                    });
            }
        },
        goBack() {
            this.$router.push('/');
        }
    }
};
</script>

<style>
.task-form {
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.task-form h1 {
    font-size: 24px;
}

.task-form input[type="text"] {
    border-radius: 5px;
    border: 1px solid #ced4da;
}

.task-form input[type="submit"] {
    border-radius: 5px;
    background-color: #28a745;
    border: none;
}

.task-form input[type="submit"]:hover {
    background-color: #218838;
}

.container {
    margin-top: 50px;
}

.task-form {
    padding: 30px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.task-form h1 {
    font-size: 1.8rem;
}

.task-form .form-control {
    border-radius: 5px;
}

.task-form .btn {
    border-radius: 5px;
}

.w-48 {
    width: 48%;
}
</style>
