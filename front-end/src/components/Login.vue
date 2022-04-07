<template>
<div class="hh">
    <div class="col-11 col-lg-6 p-0 login">
        <form>
        <h3>Sing_in</h3>
                <input type="text" name="Référence" placeholder="Référence as client" v-model="reference_client">
                <input class="botton" type="submit" name="reserve" value="Submit as client" @click.prevent="login_client">        </form>
        <div class="description">
            <input class="margadm" type="text" name="Référence" placeholder="Référence as admin" v-model="reference_admin">
            <input class="botton" type="submit" name="reserve" value="Submit as admin" @click.prevent="login_admin">
        </div>
    </div>
</div>
</template>

<script>
import Cookies from "js-cookie";
import { ref } from "vue";

export default {
    name: "Login",
    inject:["setClientId"],
    data() {
        return {
            reference_client: "",
            reference_admin: ""
        };
    },
    methods: {
        login_client() {
            fetch("http://localhost/gestion-rndv/back-end/controllers/C-loginClient.php", {
                method: "post",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    reference_client: this.reference_client,
                })
            })
            .then((res) => res.json())
            .then((data) => {
            if ((this.reference_client == data.reference_client.reference_client)) {
                Cookies.set('id',data.reference_client.id)
                this.setClientId(data.reference_client.id);
                console.log(data.reference_client.reference_client);
                this.$router.push('/Reservation');
            }else{
                alert("Reference incorrect")
            }
            });
        },
        login_admin() {
            fetch("http://localhost/gestion-rndv/back-end/controllers/C-login_admin.php", {
                method: "post",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    reference_admin: this.reference_admin,
                })
            })
            .then((res) => res.json())
            .then((data) => {
            if ((this.reference_admin == data.reference_admin.reference_admin)) {
                console.log(data.reference_admin.reference_admin);
                // console.log(reference_admin);
                this.$router.push('/Dashboardadmin');
            }else{
                alert("Reference incorrect")
            }
            });
        }
    }
};
</script>

<style  lang="scss" scoped>

.hh{
    margin: auto 0;
    display: flex;
    justify-content: center;
    margin-top: 5rem;
}
.login{
    height: 20rem;
    border-radius: 0.5rem;
    display: flex;
    background-color: #B1D0E0;

    h3{
        margin-bottom:  2rem;
    }
}
.description{
    display: none;
    border-radius: 0rem 0.5rem 0.5rem 8rem;
    height: 100%;
    width: 100%;
    background-color: #6998AB;

  @media only screen and(min-width: 992px){
      display: block;
   }

    p{
        color: white;
        padding: 1rem 8rem;
    }
}

form{
    padding: 2rem;
    height: 100%;
    width: 100%;
    // display: flex;
    // flex-direction: column;
    // width: 5rem;

}
    input{
        border-radius: 0.5rem;
        border: none;
        width: 100%;
        margin: 1rem 0;
        padding: 0.5rem 0.5rem;
        font-size: 14px;
    }

.botton{
    color: white;
    background-color: #1A374D;
}
.margadm {
    margin-top: 114px;
}
</style>