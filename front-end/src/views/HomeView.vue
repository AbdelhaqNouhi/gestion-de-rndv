<template>
<div class="body">
    <Nav title="Reserve Now"/>
    <Login />
    <br>
    <br>
    <br>
    <br>
    <Footer />
</div>
</template>

<script>
import Nav from "../components/Nav";
import Login from "../components/Login";
import Footer from '@/components/Footer.vue';
import Reservation from '@/components/Reservation.vue';
import Dashboardadmin from '@/components/Dashboardadmin.vue';
export default {
    name: "App",
    components: {
        Nav,
        Login,
        Footer,
        Reservation,
        Dashboardadmin
    }, 
}
</script>
<style scoped>
.body{
    display: flex;
    flex-direction: column;
    height: 100vh;
}
</style>
