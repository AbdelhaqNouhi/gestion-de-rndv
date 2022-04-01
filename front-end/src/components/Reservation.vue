<template>
<Nav title="Reserve Now"/>
<div class="hh">
    <div class="col-11 col-lg-8 login">
        <div class="new">
            <div class="n">
                <p>New Reservation</p>
            </div>    
        </div>
        <div class="your">
            <div class="y">
                <p>Your Resarvation </p>
            </div>
        </div>
    </div>
</div>
<Footer />
</template>

<script>
import Nav from "../components/Nav";
import Footer from "../components/Footer";
export default {
    name: "Reservation",
    components: {
        Nav,
        Footer,
    },
}
</script>

<style  lang="scss" scoped>
// -------------------------------------------------
.hh{
    display: flex;
    justify-content: center;
    height: 80vh;
    margin: 82px 0;
}
.login{
    display: flex;
    flex-direction: column;
    gap: 2rem;
    height: 35rem;
    border-radius: 0.5rem;
    display: flex;
    // background-color: #B1D0E0;
    @media only screen and(min-width: 992px){
        display: flex;
        flex-direction: row;
        gap: 0;
   }
}
.new{
    // padding: 0 5rem;
    border-radius: 0.5rem 0.5rem 0.5rem 0.5rem;
    height: 100%;
    width: 100%;
    background-color: #B1D0E0;

    @media only screen and(min-width: 992px){
        border-radius: 0.5rem 0rem 0rem 0.5rem;
   }

    p{
        // white-space: nowrap;
        color: white;
        padding: 0.5rem 7rem;
    }
    .n{
        border-radius: 0.5rem 2rem 0.5rem 2rem;
        background-color: #6998AB;
    }
}
.your{
    // padding: 0 5rem;
    border-radius: 0.5rem 0.5rem 0.5rem 0.5rem;
    height: 100%;
    width: 100%;
    background-color: #6998AB;

      @media only screen and(min-width: 992px){
        border-radius: 0rem 0.5rem 0.5rem 0rem;
   }

    .y{
        // white-space: nowrap;
        border-radius: 0.5rem 2rem 0.5rem 2rem;
        background-color: #B1D0E0;


        p{
            color: white;
            padding: 0.5rem 7rem;
        }
    }
}
</style>