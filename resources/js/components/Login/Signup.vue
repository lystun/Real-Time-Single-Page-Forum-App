<template>
    <v-form @submit.prevent="signup">
        <v-container>
            <v-flex md6>
                <v-text-field
                        v-model="form.name"
                        type="text"
                        label="Name"
                        required
                ></v-text-field>
                <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
            </v-flex>
            <v-flex md6>
                <v-text-field
                        v-model="form.email"
                        type="email"
                        label="E-mail"
                        required
                ></v-text-field>
                <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>
            </v-flex>
            <v-flex md6>
                <v-text-field
                        v-model="form.password"
                        type="password"
                        label="Password"
                        required
                ></v-text-field>
                <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
            </v-flex>
            <v-flex md6>
                <v-text-field
                        v-model="form.password_confirmation"
                        type="password"
                        label="Password"
                        required
                ></v-text-field>
            </v-flex>
            <v-flex>
                <v-btn type="submit" color="success" >Sign Up</v-btn>

                <router-link to="/login">
                    <v-btn color="primary">Login</v-btn>
                </router-link>
            </v-flex>

        </v-container>
    </v-form>
</template>

<script>
    export default {
        name: "Signup",

        data(){
            return {
                form : {
                    name : null,
                    email : null,
                    password : null,
                    password_confirmation : null,
                },
                errors : {}
            }
        },

        created(){
            if(User.loggedIn()){
                this.$router.push({name : 'forum'})
            }
        },

        methods : {
            signup(){
                axios.post('/api/auth/signup', this.form)
                    .then(res => {
                        User.responseAfterLogin(res)
                        this.$router.push({name : 'forum'})
                    })
                    .catch(err => {
                        this.errors = err.response.data.errors
                        console.log(err.response.data)
                    })
            }
        }
    }
</script>

<style scoped>

</style>