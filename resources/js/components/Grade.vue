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
                        <div>
                            <label for="name">Grade name</label>
                            <input v-model="grade.name" type="text" class="form-control" id="name" placeholder="Grade name">
                        </div>

                        <div>
                            <label for="description">Grade description</label>
                            <input v-model="grade.description" type="text" class="form-control" id="description" placeholder="Grade description">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button @click="closeModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button @click="store();" type="button" class="btn btn-success" data-dismiss="modal">Register</button>
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
                    <button @click = "edit=true; openModal(grade);" class="btn btn-warning">Edit</button>
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
            grade : {
               name: '',
               description: ''
            },

            id:0,
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
        async store(){
            if(this.edit)
            {
                await axios.put('/grades/' + this.id, this.grade);
            }
            else
            {
                await axios.post('grades/', this.grade);
            }
            this.closeModal();
            this.list();
        },
        openModal(data={}){
           this.modal = 1;
           if(this.edit)
           {
               this.id = data.id;
               this.modalTitle = 'Update grade';
               this.grade.name = data.name;
               this.grade.description = data.description;
           }
           else
           {
               this.id = 0;
               this.modalTitle = 'Register grade';
               this.grade.name = '';
               this.grade.description = '';
           }
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
