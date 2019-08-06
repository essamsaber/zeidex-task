<template>
    <div class="edit-category">
        <form action="">
            <div class="form-group">
                <label for="">Edit category</label>
                <input type="text" class="form-control"  v-model="category.name">
            </div>
            <div class="form-group">
                <ul class="alert alert-danger" v-if="errors">
                    <strong><span class="text-danger">Please fix the errors below</span></strong>
                    <li class="text-danger" v-for="error in errors">{{error[0]}}</li>
                </ul>
            </div>
            <div class="form-group">
                <router-link :to="{name:'categories'}"><span class="btn btn-primary">Back <i class="fa fa-angle-double-left"></i></span></router-link></td>
                <button type="submit" class="btn btn-success" @click.prevent="handleUpdate">Update <i class="fa fa-save"></i></button>
            </div>
        </form>
    </div>
</template>

<script>

    export default {
        data(){
          return {
              category: {},
              errors:null
          }
        },
        methods:{
          handleUpdate(){
              let app = this;
              axios.put(`/api/categories/${this.category.id}`, this.category)
                  .then(res => {
                      this.$router.push({name: 'categories'})
                  }) .catch(err => {
                  this.errors = err.response.data.errors;
              });
          }
        },
        mounted() {
            let app = this;
            axios.get('/api/categories/'+app.$route.params.cat.id).then(res => {
                app.category = res.data.data;
            });
        }
    }
</script>

<style scoped>

</style>