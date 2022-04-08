<template>
    <nav>
    <div class="container navbar">
        <h1 class="col-4">{{title}}</h1>
            <!-- <a class="mrgend" @click="logout_admin()">
                <i class="fas fa-sign-in-alt sign-in-icon"><span class="mx-1">logout</span></i>
            </a> -->
    </div>
    </nav>
</template>

<script>
export default {
    name: "NavDash",
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
.mrgend {
    margin-left: 91%;
    font-size: 20px;
    color: black;
}
</style>