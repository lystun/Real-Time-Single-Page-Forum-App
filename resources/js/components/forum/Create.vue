<template>
    <v-form @submit.prevent="create">
        <v-container>
            <v-text-field
                    v-model="form.title"
                    type="text"
                    label="Title"
                    required
            ></v-text-field>

            <v-autocomplete
                    :items="categories"
                    item-text="name"
                    item-value="id"
                    label="Category"
                    v-model="form.category_id"
            ></v-autocomplete>

            <markdown-editor v-model="form.body" preview-class="markdown-body"></markdown-editor>

            <v-btn type="submit" color="success" >Create</v-btn>

        </v-container>
    </v-form>
</template>

<script>

    export default {
        data(){
            return {
                form : {
                    title : null,
                    category_id : null,
                    body : null
                },
                categories : [],
                errors : {}
            }
        },

        created(){
            axios.get('/api/category/')
                .then(res => this.categories = res.data.data)
        },

        methods : {
            create(){
                axios.post('/api/question', this.form)
                    .then(res => this.$router.push(res.data.path))
                    .catch(error => this.errors = error.response.data.error)
            }
        }
    }
</script>


<style>

</style>