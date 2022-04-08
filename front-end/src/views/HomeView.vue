<template>
<div class="body">
    <Login />
    <Footer />
</div>
</template>

<script>
import Nav from "../components/Nav";
import Login from "../components/Login";
import Footer from '@/components/Footer.vue';
// import Reservation from "@/components/Reservation.vue";
export default {
    name: "App",
    components: {
        Nav,
        Login,
        Footer,
        // Reservation,
    }, 
}
</script>&
<style scoped>
.body{
    display: flex;
    flex-direction: column;
    height: 100vh;
}
</style>
