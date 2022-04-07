<template>
<div>
    <Nav title="Reserve Now"/>
    <router-view />
</div>
</template>
<script>
import Nav from "./components/Nav.vue";
import {computed} from "vue";
import Cookies from "js-cookie";
export default{
    data(){
        return {
            clientId:""
        }
    },
    provide(){
        return {
            clientId: computed(() => this.clientId),
            setClientId: this.setClientId
        }
    },
    mounted(){
        this.clientId = Cookies.get("id")
    },
    methods:{
        setClientId(id){
            this.clientId = id;
        }
    },
    components:{
        Nav,
    }
}

</script>


<style lang="scss" scoped>
</style>
