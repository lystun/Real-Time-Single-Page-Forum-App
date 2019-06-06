<template>
    <v-form @submit.prevent="login">
        <v-container>
            <v-layout>
                <v-flex md8>
                    <v-text-field
                            v-model="form.email"
                            type="email"
                            label="E-mail"
                            required
                    ></v-text-field>
                </v-flex>
                <v-flex md8>
                    <v-text-field
                            v-model="form.password"
                            type="password"
                            label="Password"
                            required
                    ></v-text-field>
                </v-flex>
                <v-flex md8>
                    <v-btn type="submit" color="success" >Login</v-btn>
                </v-flex>
            </v-layout>
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

        methods : {
            login(){
                axios.post('/api/auth/login', this.form)
                    .then(res => {
                        console.log(res.data)
                    })
                    .catch(error => {
                        console.log(error.data)
                    })
            }
        }
    }
</script>

<style scoped>

</style>