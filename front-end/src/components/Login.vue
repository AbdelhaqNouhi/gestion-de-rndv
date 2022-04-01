<template>
<div class="hh">
    <div class="col-11 col-lg-6 login">
        <form>
        <h3>Sing_in</h3>
            <label>Référence</label>
                <input type="text" name="Référence" placeholder="Référence" v-model="reference_client">
                <input href="./Reservation.vue" class="botton" type="submit" name="reserve" value="Reserve" @click.prevent="login_client">
        </form>
        <div class="description">
            <p>Welcom Dear</p>
        </div>
    </div>
</div>
</template>

<script>
import { ref } from "vue";

export default {
    name: "Login",
    data() {
        return {
            reference_client: ""
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
                console.log(data.reference_client.reference_client);
            }else{
                alert("Reference incorrect")
            }
            });
        },
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
</style>