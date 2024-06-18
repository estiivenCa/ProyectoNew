<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-5">
                <div class="task-form p-4 shadow rounded bg-light">
                    <h1 class="text-center font-weight-bold py-3 text-dark">Edit Task {{ id }}</h1>
                    <form method="POST" v-on:submit.prevent="saveTask()">
                        <div class="form-group">
                            <input type="text" v-model="tasks.todo" class="form-control mb-3" placeholder="New Task"
                                name="todo">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success text-white w-48">Save</button>
                            <button @click="goBack()" class="btn btn-secondary w-48">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>



<script>

export default {
    data() {
        return {
            id: this.$route.params.id,
            tasks: []
        }
    },
    created() {
        axios.get('/tasks/' + this.id + '/edit')
            .then(response => this.tasks = response.data)
            .catch();
    },
    methods: {
        saveTask() {
            axios.put('/tasks/' + this.id, {
                todo: this.tasks.todo,
                completed: this.tasks.completed
            })
                .then(response => { console.log(response) })
                .catch(error => { console.log(error.response) });
            this.tasks.todo = ''
            this.tasks.completed = ''
            this.$router.push('/');
        },
        goBack() {
            this.$router.push('/')
        },
    }
}
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
