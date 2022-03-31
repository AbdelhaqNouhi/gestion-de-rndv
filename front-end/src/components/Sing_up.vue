<template>
<Nav title="Reserve Now"/>
<div class="hh">
    <div class="col-11 col-lg-6 login">
        <form>
            <label>Nom</label>
                <input type="text" name="nom" placeholder="Nom">
                <label>Prenome</label>
                <input type="text" name="prenome" placeholder="Prenome">
                <label>Age</label>
                <input type="text" name="age" placeholder="Age">
                <label>Profession</label>
                <input type="text" name="profession" placeholder="Profession">
            <input class="botton" type="submit" name="regester" value="Regester">
        </form>
        <div class="description">
            <p>Welcom Dear</p>
        </div>
    </div>
</div>
<Footer />
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
}
</script>

<style  lang="scss" scoped>
.hh{
    // margin: auto 0;
    display: flex;
    justify-content: center;
    height: 58vh;
    margin: 82px 0;
}
.login{
    // height: 20rem;
    border-radius: 0.5rem;
    display: flex;
    background-color: #B1D0E0;
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
    display: flex;
    justify-content: center;
    flex-direction: column;
    // width: 5rem;

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
    color: white;
    background-color: #1A374D;
}
</style>
