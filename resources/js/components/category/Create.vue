<template>
    <div class="create-category">
        <form @submit.prevent="this.handleStore">
            <div class="form-group">
                <label for="">Create new category</label>
                <input type="text" class="form-control"  v-model="name">
            </div>
            <div class="form-group">
                <ul class="alert alert-danger" v-if="errors">
                    <strong><span class="text-danger">Please fix the errors below</span></strong>
                    <li class="text-danger" v-for="error in errors">{{error[0]}}</li>
                </ul>
            </div>
            <div class="form-group">
                <router-link :to="{name:'categories'}"><span class="btn btn-primary">Back <i class="fa fa-angle-double-left"></i></span></router-link></td>
                <button type="submit" class="btn btn-success" @click.prevent="handleStore">Save <i class="fa fa-save"></i></button>
            </div>

        </form>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                name: '',
                errors:null
            }
        },
        methods:{
            handleStore(){
                let data = {name:this.name};
                axios.post('/api/categories', data)
                    .then(res => {
                        this.$router.push({name:'categories'})
                    })
                    .catch(err => {
                        this.errors = err.response.data.errors;
                    });
            }
        }
    }
</script>

<style scoped>

</style>