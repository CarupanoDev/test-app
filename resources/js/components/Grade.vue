<template>
    <div>
        <h1 class="text-center">Admin grades</h1>
        <hr/>

        <!-- Button to Open the Modal -->
        <button @click="edit=false; openModal();" type="button" class="btn btn-primary">
            New grade
        </button>

        <!-- The Modal -->
        <div class="modal" :class="{show:modal}">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ modalTitle }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button @click="closeModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button  type="button" class="btn btn-success" data-dismiss="modal">Register</button>
                    </div>

                </div>
            </div>
        </div>

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
                    <button @click = "edit=true; openModal(grade.id);" class="btn btn-warning">Edit</button>
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
            edit: true,
            modal : 0,
            modalTitle : 'lorem',
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
            this.list();
        },
        openModal(){
           this.modal = 1;
           this.edit ? this.modalTitle = 'Update grade' : this.modalTitle = 'Register grade';
        },
        closeModal(){
            this.modal = 0;
        },
    },

    created() {
        this.list();
    }
}
</script>
<style>
.show{
    display: list-item;
    opacity: 1;
    background-color: rgba(44, 38, 75, 0.849);
}
</style>
