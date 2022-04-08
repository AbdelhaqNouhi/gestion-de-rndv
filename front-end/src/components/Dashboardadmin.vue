<template>
    <!-- <div class="container"> -->
    <center><h1 class="my-5">Welcom to dashboard</h1></center>
    <div cl ass="row my-5">
        <div class="col-md-12 mx-auto">
            <div class="card mt-5">
                <div class="p-3 mb-2 text-dark">
                    <table class="table table-hover">
                        <thead class="back">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Age</th>
                            <th scope="col">Profession</th>
                            <th scope="col">reference_client</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody v-for="client in clients" :key="client.id"> 
                            <tr>
                                <th scope="row" class="font-weight-normal">{{ client.id }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.nom }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.prenom }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.age }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.profession }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.reference_client }}</th>
                                <td class="d-flex flex-row">
                                    <!-- <form method="" action="" class="mx-1"> -->
                                        <!-- <input type="hidden" name="id" value=""> -->
                                        <a class="btn btn-primary rounded-pill" @click="getclient(client.id)" data-toggle="modal"
                                                    data-target="#updateclient"><i class="fa fa-edit"></i></a>
                                    <!-- </form> -->
                                    <!-- <form method="" action="" class="mx-1"> -->
                                        <!-- <input type="hidden" name="id" value=""> -->
                                        <a class="btn btn-danger rounded-pill mx-1" @click="deleteclient(client.id)"><i class="fa fa-trash"></i></a>
                                    <!-- </form> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div v-if="condition" class="container popup">
        <h2 class="text-center py-4">Update client</h2>
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light">
                <form>
                    <div class="form-group">
                        <label class="mt-4">nom</label>
                        <input type="text" class="form-control" v-model="client.nom">
                    </div>
                    <div class="form-group">
                        <label>prenom</label>
                        <input type="text" class="form-control" v-model="client.prenom">
                    </div>
                    <div class="form-group">
                        <label>age</label>
                        <input type="number" class="form-control" v-model="client.age">
                    </div>
                    <div class="form-group">
                        <label>profession</label>
                        <input type="text" class="form-control" v-model="client.profession">
                    </div>
                    <div class="form-group">
                        <label>reference_client</label>
                        <input type="text" class="form-control" v-model="client.reference_client">
                    </div>
                    <button type="button" class="btn btn-primary mb-4" @click="updateclient()">Update</button>
                </form>
            </div>
        </div>
    </div> -->
    <div class="modal fade" id="updateclient" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <input type="text" required placeholder="nom" v-model="client.nom"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" required placeholder="prenom" v-model="client.prenom"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" required placeholder="age" v-model="client.age"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" required placeholder="profession" v-model="client.profession"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" required placeholder="reference_client" v-model="client.reference_client"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success" @click="updateclient()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <Footer />
<!-- </div> -->
<br>
<br>
<br>
</template>

<script>import { throwStatement } from "@babel/types";
import Nav from "./Nav";
import Footer from "./Footer.vue";
    export default {
    name: "Dashboardadmin",
    data() {
        return {
            condition : false,
            clients: [],
            client: {
                id: "",
                nom: "",
                prenom: "",
                age: "",
                profession: "",
                reference_client: ""
            },
        };
    },
    created() {
        this.getAllclient();
    },
    methods: {
        getAllclient() {
            axios.get("http://localhost/gestion-rndv/back-end/controllers/C-lire_client.php")
                .then(response => this.clients = response.data)
                .catch(err => console.log(err));
        },
        deleteclient(id) {
            axios.delete("http://localhost/gestion-rndv/back-end/controllers/C-supprimer_client.php?id=" + id)
                .then(() => {
                this.clients = this.clients.filter(client => {
                    return client.id !== id;
                });
            })
                .catch(console.log(err));
        },
        logout_admin() {
            Cookies.get("reference_admin");
            console.log(Cookies.get("reference_admin"));
            Cookies.remove("reference_admin");
            this.$router.push("/");
        },
        updateclient() {
            // this.condition = !this.condition;
            axios.put('http://localhost/gestion-rndv/back-end/controllers/C-modifier_client.php', {
                id : this.client.id,
                nom : this.client.nom,
                prenom : this.client.prenom,
                age : this.client.age,
                profession : this.client.profession,
                reference_client : this.client.reference_client
            })
                .then(() => {
                    Swal.fire(
                        'Updated !',
                        'success'
                    ).then(() => {
                        this.getclients(); 
                        ('#updateclient').modal('hide')
                    })
                })
                .catch(err => console.log(err));
        },
        getclient(id) {
            axios.post('http://localhost/gestion-rndv/back-end/controllers/C-lireun_client.php?id=' + id)
                .then(response => { this.client = response.data;
            })
                .catch(err => console.log(err));
        },
    },
    components: { Footer, Nav }
}
</script>

<style lang="scss" scoped>
.back {
    background-color: #B1D0E0;
}
.mrgend {
    margin-left: 91%;
    font-size: 20px;
    color: black;
}
</style>