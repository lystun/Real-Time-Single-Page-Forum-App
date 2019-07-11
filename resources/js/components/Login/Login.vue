<template>
    <v-form @submit.prevent="login">
        <v-container>
                <v-flex md6>
                    <v-text-field
                            v-model="form.email"
                            type="email"
                            label="E-mail"
                            required
                    ></v-text-field>
                </v-flex>
                <v-flex md6>
                    <v-text-field
                            v-model="form.password"
                            type="password"
                            label="Password"
                            required
                    ></v-text-field>
                </v-flex>
                <v-flex>
                    <v-btn type="submit" color="success" >Login</v-btn>

                    <router-link to="/signup">
                        <v-btn color="primary">Sign Up</v-btn>
                    </router-link>
                </v-flex>

        </v-container>
    </v-form>
</template>

<script>
    export default {
        name: "Login",

        data(){
            return {
                form : {
                    email : null,
                    password : null,
                }
            }
        },

        created(){
            if(User.loggedIn()){
                this.$router.push({name : 'forum'})
            }
        },

        methods : {
            login(){
                User.login(this.form)
                // this.$router.push({name : 'forum'})
            }
        }
    }
</script>

<style scoped>

</style>