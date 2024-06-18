<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="task-form p-5 bg-light rounded shadow-sm">
                    <h1 class="text-center font-weight-bold py-4 text-primary">Create Tasks</h1>
                    <form method="POST" v-on:submit.prevent="saveTask()">
                        <div class="form-group mb-4">
                            <input type="text" v-model="tasks" class="form-control" placeholder="New Task" name="todo">
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-success w-100 text-white mr-2">Save</button>
                            <button @click="goBack()" class="btn btn-secondary w-100 ml-2"> Back</button>
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
            tasks: ''
        }
    },
    methods: {
        saveTask() {
            axios.post('/tasks', { todo: this.tasks, })
                .then(response => { console.log(response) })
                .catch(error => { console.log(error.response) });
            this.tasks = ''
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
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #007bff;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
}

.btn {
    border-radius: 5px;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

</style>
