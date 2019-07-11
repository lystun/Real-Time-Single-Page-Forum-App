<template>
    <v-container>
        <v-form @submit.prevent="update">
            <v-text-field
                    v-model="form.title"
                    type="text"
                    label="Title"
                    required
            ></v-text-field>

            <markdown-editor v-model="form.body" preview-class="markdown-body"></markdown-editor>

            <v-card-actions v-if="own">
                <v-btn icon small type="submit">
                    <v-icon color="teal">Save</v-icon>
                </v-btn>
                <v-btn icon small @click="cancel">
                    <v-icon>Cancel</v-icon>
                </v-btn>

            </v-card-actions>

        </v-form>
    </v-container>
</template>

<script>
    export default {
        name: "EditQuestion",

        props : ['data'],

        data(){
            return {
                form : {
                    title : null,
                    body : null,
                }
            }
        },

        created(){
            this.form = this.data
        },

        methods : {
            cancel(){
                EventBus.$emit('cancelEdting')
            },

            update(){
                axios.patch(`/api/question/${this.form.slug}`, $this.form)
                    .then(res => this.cancel() )
            }
        }
    }
</script>

<style scoped>

</style>