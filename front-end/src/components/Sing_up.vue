<template>
<div>
    <div class="hh">
        <div class="col-11 col-lg-7 p-0 sing_up">
            <form @submit.prevent="register">
                <h3>Sing_up</h3>
                <label>Nom</label>
                <input required type="text" name="nom" placeholder="Nom" v-model="nom">
                <label>Prenome</label>
                <input required type="text" name="prenome" placeholder="Prenome" v-model="prenom">
                <label>Age</label>
                <input required type="text" name="age" placeholder="Age" v-model="age">
                <label>Profession</label>
                <input required type="text" name="profession" placeholder="Profession" v-model="profession">
                <input class="botton" type="submit" name="regester" value="Regester">
            </form>
            <div class="description">
                <div v-if="show" class="rf">
                    <strong>your Reference</strong>
                    <p>{{this.nom + this.age}}</p>
                    <button class="botton" @click="login">log in</button>
                </div>
            </div>
        </div>
    </div>
    <Footer />
</div>
</template>

<script>
import Nav from "../components/Nav";
import Footer from './Footer.vue';
export default {
    name: "Sing_up",
    components: {
        Nav,
        Footer,
    },
    data() {
        return {
            nom: "",
            prenom: "",
            age: "",
            profession: "",
            reference_client: "",
            show: false,
        };
    },
    methods: {
    login(){
        this.$router.replace("/");
    },
    register() {
      if(this.nom != "" && this.prenom != "" && this.age != "" && this.profession != ""){
        fetch("http://localhost/gestion-rndv/back-end/controllers/C-registerClient.php", {
            method: "post",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify({
            
            nom: this.nom,
            prenom: this.prenom,
            age: this.age,
            profession: this.profession,
            reference_client: this.nom + this.age
            }),
        })
            .then((res) => res.json())
            .then(()=>this.show = true)
        }
    },
  },
}
</script>

<style  lang="scss" scoped>
.hh{
    // margin: auto 0;
    display: flex;
    justify-content: center;
    // height: 75vh;
    margin: 82px 0;
}
.sing_up{
    border-radius: 0.5rem;
    display: flex;
    flex-direction: column-reverse;
    gap: 2rem;
    border-radius: 0.5rem;
    //  background-color: #B1D0E0;
    @media only screen and(min-width: 992px) {
        display: flex;
        flex-direction: row;
        gap: 0;
        background-color: #B1D0E0;

    }
}
.description{
    display: flex;
    flex-direction: column;
    gap: 5rem;
    // display: none;
    border-radius: 0.5rem 0.5rem 0.5rem 0.5rem;
    height: 100%;
    width: 100%;
    padding: 2rem;

  @media only screen and(min-width: 992px){
    background-color: #6998AB;
    border-radius: 0rem 0.5rem 0.5rem 8rem;
   }

    span{
        color: white;
        padding: 8rem
    }
}

form{
    padding: 2rem;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color: #B1D0E0;

    // width: 5rem;
    h3{
        margin-bottom: 1rem;
    }
}
    input{
        border-radius: 0.5rem;
        border: none;
        width: 100%;
        margin: 0.5rem 0;
        padding: 0.5rem 0.5rem;
        font-size: 14px;
    }

.botton{
    font-size: 14px;
    border-radius: 0.5rem;
    border: none;
    width: 100%;
    color: white;
    background-color: #1A374D;
}
.rf{
    border-radius: 0.5rem;
    background-color:#B1D0E0;
    padding: 2rem 8rem;
    display: flex;
    align-items: center;
    flex-direction: column;
    // height: 50%;
    gap: 3rem;
}
</style>