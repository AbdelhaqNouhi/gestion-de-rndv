<template>
    <!-- <div class="container"> -->
    <NavDash />
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
                            <th scope="col">sujet</th>
                            <th scope="col">date</th>
                            <th scope="col">creneau</th>
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
                                <th scope="row" class="font-weight-normal">{{ client.sujet }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.date }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.creneau }}</th>
                                <td class="d-flex flex-row justify-content-center">
                                    <!-- <form method="" action="" class="mx-1"> -->
                                        <!-- <input type="hidden" name="id" value=""> -->
                                        <a class="btn btn-primary rounded-pill" @click="updateclient(client.id)"><i class="fa fa-edit"></i></a>
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
    <div v-if="condition" class="container popup">
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
import NavDash from "./NavDash";
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
                reference_client: "",
                sujet: "",
                date: "",
                creneau: ""
            },
        };
    },
    created() {
        this.getAllclient();
    },
    methods: {
        getAllclient() {
            axios.get("http://localhost/gestion-rndv/back-end/controllers/C-lire_rdv.php")
                .then(response => this.clients = response.data)
                .catch(err => console.log(err));
        },
        deleteclient(id) {
            axios.delete("http://localhost/gestion-rndv/back-end/controllers/C-supprimer_rdv.php?id=" + id)
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
        // updateclient(id) {
        //     axios.put("http://localhost/gestion-rndv/back-end/controllers/C-modifier_client.php", {
        //         id: this.client.id,
        //         nom: this.client.nom,
        //         prenom: this.client.prenom,
        //         age: this.client.age,
        //         profession: this.client.profession,
        //         reference_client: this.client.reference_client
        //     })
        //     .catch(err => console.log(err));
        // },
        updateclient(id) {
            this.condition = !this.condition;
            axios.put("http://localhost/gestion-rndv/back-end/controllers/C-modifier_client.php?id="+ id)
                .then(response => {
                    console.log(response);
                })
                .catch(function (error) {
                console.log(error.response)
                })
        },
    },
    components: { Footer, NavDash }
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