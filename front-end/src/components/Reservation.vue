<template>
    <div>
        <div class="hh">
            <div class="col-11 col-lg-10 p-0 sing_up">
                <form class="form" @submit.prevent="Reserve">
                    <h3>Reserve Now</h3>
                    <label>Date</label>
                    <input
                    @change="Get_date_rdv"
                        class="go"
                        type="date"
                        name="date"
                        placeholder="Date"
                        required
                        v-model="form.date"
                        :min="new Date().toISOString().substr(0, 10)"
                    />
                        <label>Creneau</label>
                        <select v-if="this.form.date" v-model="form.creneau" class="go">
                            <option v-for="time in times" :key="time.date">
                                {{ time.date }}
                            </option>
                        </select>

                    <label>Sujet</label>
                    <textarea
                        class="go"
                        name="Sujet"
                        placeholder="Message"
                        required
                        v-model="form.sujet"
                    ></textarea>
                    <button class="go botton" name="regester">Reserve</button>
                </form>
                <div class="res">
                    <div class="title">
                        <strong>date</strong>
                        <strong>creneau</strong>
                        <strong>sujet</strong>
                        <strong>More</strong>
                    </div>
                    <div class="title" v-for="list in lists" :key="list.id">
                        <span>{{ list.date }}</span>
                        <span>{{ list.creneau }}</span>
                        <span>{{ list.sujet }}</span>

                        <div v-if="lists" class="btn">
                            <button class="btn botton" @click="Update">
                                update
                            </button>
                            <button class="btn botton" @click="Delete(list.id)">
                                delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Cookies from "js-cookie";
import Nav from "../components/Nav";
import Footer from "../components/Footer";

const client_Id = Cookies.get("id");
export default {
    name: "Reservation",
    components: {
        Nav,
        Footer,
    },
    data() {
        return {
            form: { date: "", creneau: "", sujet: "", client_Id: client_Id },
            lists: [],
            id: null,
            times: [
                { date: "10 h à 10:30h" },
                { date: "11 h à 11:30h" },
                { date: "14 h à 14:30h" },
                { date: "15 h à 15:30h" },
                { date: "16 h à 16:30h" },
            ],
            time_creneau: [],
        };
    },
    methods: {
        filter_ceeneau () {

        },

        Get_rdv() {
            this.id = Cookies.get("id");
            // console.log(this.id);
            fetch(
                `http://localhost/gestion-rndv/back-end/controllers/C-lire_rdv.php?id=${this.id}`
            )
                .then((res) => res.json())
                .then((data) => {
                    this.lists = data;
                });
        },
        Reserve() {
            fetch(
                `http://localhost/gestion-rndv/back-end/controllers/C-creer_rdv.php`,
                {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(this.form),
                }
            ).then((res) => res.json());
        },
        Delete(id) {
            fetch(
                `http://localhost/gestion-rndv/back-end/controllers/C-supprimer_rdv.php`,
                {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ id: id }),
                }
            ).then((res) => res.json());
        },
         async Get_date_rdv() {
             let date = this.form.date;
            const res = await fetch(
                `http://localhost/gestion-rndv/back-end/controllers/C-lire_time_rdv.php?date=${date}`   
            );
            const result = await res.json();
            if(result != "errore"){
                this.time_creneau = result.map(r => r.creneau);
                this.times =  this.times.filter((i) => !this.time_creneau.includes(i.date));
            }
        },
    },
    mounted() {
        this.Get_rdv();
        this.Get_date_rdv();
    },
};
</script>

<style lang="scss" scoped>
.hh {
    // margin: auto 0;
    display: flex;
    justify-content: center;
    // height: 75vh;
    margin: 82px 0;
}
.sing_up {
    display: flex;
    flex-direction: column;
    height: 35rem;
    border-radius: 0.5rem;
    @media only screen and(min-width: 992px) {
        display: flex;
        flex-direction: row;
        gap: 0;
    }
}
.res {
    border-radius: 0.5rem;
    height: 100%;
    width: 100%;
    background-color: #6998ab;
    .title {
        padding: 1rem 0;
        border: 1px solid white;
        border-radius: 0.5rem;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        width: 100%;
        place-items: center;
        text-align: center;
    }
}
.form {
    padding: 2rem;
    height: 100%;
    width: 100%;
    border-radius: 0.5rem;
    background-color: #b1d0e0;
    // width: 5rem;
    h3 {
        padding: 0rem 0 2rem;
        text-align: center;
    }
}
.go {
    border-radius: 0.5rem;
    border: none;
    width: 100%;
    margin: 0 0 2rem;
    padding: 0.5rem 0.5rem;
    font-size: 14px;
}
.botton {
    color: white;
    background-color: #1a374d;
}
.btn {
    display: flex;
    border-radius: 0.5rem;
    border: none;
    font-size: 10px;
}
</style>
