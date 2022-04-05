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
                                <th scope="row" class="font-weight-normal">{{ client.profession }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.sujet }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.date }}</th>
                                <th scope="row" class="font-weight-normal">{{ client.creneau }}</th>
                                <td class="d-flex flex-row justify-content-center">
                                    <form method="" action="" class="mx-1">
                                        <input type="hidden" name="id" value="">
                                        <button class="btn btn-primary rounded-pill"><i class="fa fa-edit"></i></button>
                                    </form>
                                    <form method="" action="" class="mx-1">
                                        <input type="hidden" name="id" value="">
                                        <button class="btn btn-danger rounded-pill"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
<br>
<br>
<br>
</template>

<script>

    export default {
        name: "Dashboardadmin",
        data() {
            return {
                clients: [],
                client: {
                    id: '',
                    nom: '',
                    prenom: '',
                    age: '',
                    profession: '',
                    reference_client: '',
                    sujet: '',
                    date: '',
                    creneau: ''
                }
                
            };
        },
        created(){
            this.getAllclient();
        },
        methods : {
            getAllclient(){
                axios.get('http://localhost/gestion-rndv/back-end/controllers/C-lire_rdv.php')
                    .then(response => this.clients = response.data)
                    .catch(err => console.log(err));
            },
        }
    }
</script>

<style lang="scss" scoped>
.back {
    background-color: #B1D0E0;
}

</style>