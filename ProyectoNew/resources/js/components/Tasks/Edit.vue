<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-5">
                <div class="task-form p-5 bg-white">
                    <h1 class="text-center font-weight-bold py-4 text-dark">Edit tasks</h1>
                    <form method="POST" v-on:submit.prevent="saveTask()">
                        <div class="form-group">
                            <input type="text" v-model="tasks" class="form-control mb-3" placeholder="New Task"
                                name="todo">
                            <input type="submit" value="Save" class="btn btn-success w-100 text-white">
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
        }
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

</style>
