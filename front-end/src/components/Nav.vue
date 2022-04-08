<template>
    <nav>
    <div class="container navbar">
        <h1 class="col-4">{{title}}</h1>
            <router-link v-if="clientId" to="Reservation">Reservation</router-link>
            <!-- "{name:'Reservation' ,params:{username: 'erina' }}" -->
            <router-link to="Sing_up" v-if="!clientId"><button>Regester</button></router-link>
            <button @click="logout" v-if="clientId" >logout</button>
    </div>
    </nav>
</template>

<script>
import Cookies from "js-cookie";

export default {
    name: "Nav",
    inject:["clientId","setClientId"],
    data(){
        return {
            clientId: this.clientId
        }
    },
    methods:{
        logout(){
            Cookies.remove("id");
            this.setClientId("");
            this.$router.replace("/")
        }
    },
    props:{
        title: String,
    },
}
</script>


<style lang="scss" scoped>
* {
    background-color: #B1D0E0;
    list-style: none;
    text-decoration: none;
}
nav {
    h1{
        font-weight: bold;
        color: #406882;
        font-size: 1rem;
    }
      @media only screen and(min-width: 992px){
          font-size: 10rem;
         }
    
    a {
        font-size: 12px;
        color: white;
    }
    a:hover{
        color: #1A374D
    }
    button{
        font-size: 12px;
        width: 4rem;
        height: 1.5rem;
        border: none;
        border-radius: 0.5rem;
        color: white;
        background-color: #1A374D;
    }
}
</style>