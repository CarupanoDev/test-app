<template>
    <div>
        <h1 class="text-center">Admin grades</h1>
        <hr/>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col" colspan="3" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="grade in grades" :key="grade.id">
                <th scope="row">{{grade.id}}</th>
                <td>{{grade.name}}</td>
                <td>{{grade.description}}</td>
                <td class="text-center">
                    <button class="btn btn-warning">Edit</button>
                    <button @click = "deleted(grade.id)" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            grades: [],
        }
    },
    methods: {
        async list(){
            const res = await axios.get('grades');
            this.grades = res.data;
        },
        async deleted(id){
            await axios.delete('grades/' + id);
        },
    },

    created() {
        this.list();
    }
}
</script>
