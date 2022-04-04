<template>
    <div class="container">
    <div cl ass="row my-5">
        <div class="col-md-12 mx-auto">
            <div class="card mt-5">
                <div class="p-3 mb-2 bg-light text-dark">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Age</th>
                            <th scope="col">Profession</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row" class="font-weight-normal">DAALABI</th>
                                <th scope="row" class="font-weight-normal">Reda</th>
                                <th scope="row" class="font-weight-normal">20</th>
                                <th scope="row" class="font-weight-normal">Developpeur</th>
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
                            <tr>
                                <th scope="row" class="font-weight-normal">Belkhoukh</th>
                                <th scope="row" class="font-weight-normal">Abdo</th>
                                <th scope="row" class="font-weight-normal">27</th>
                                <th scope="row" class="font-weight-normal">Developpeur</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
</template>

<script>
    export default {
        name: "Dashboardadmin"
    }
</script>

<style lang="scss" scoped>

</style>