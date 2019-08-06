<template>
    <div class="all-categories">
        <h3 class="text-center">List all categories</h3>
        <router-link :to="{name:'createCategory'}"><span class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Category</span></router-link>

        <table class="table mt-2">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Product count</th>
                <th  colspan="3" scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>
            <tr v-if="isLoading"><td colspan="4">Loading categories ....</td></tr>
            <tr v-else v-for="(category, key) in categories" :key="key">
                <th scope="row">{{key+1}}</th>
                <td>{{category.name}}</td>
                <td>{{category.products_count}}</td>
                <td colspan="3">
                <router-link :to="{name:'editCategory', params:{cat: category}}"><span class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></span></router-link>
                <router-link :to="`/categories/${category.id}`" title="List category products"><span class="btn btn-sm btn-info"><i class="fa fa-eye"></i></span></router-link>
                <button class="btn btn-sm btn-danger" @click.prevent="deleteCategory(key,category.id)"><i class="fa fa-trash"></i></button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "ListAll",
        data(){
            return {
                isLoading: true,
                categories: []
            }
        },
        methods:{
          deleteCategory(key, id) {

              if(confirm("Do you really want to delete?")){
                  axios.delete(`/api/categories/${id}`)
                      .then(res => {
                          this.categories.splice(key, 1);
                      });
              }
          }
        },
        mounted() {
            axios.get('/api/categories').then(res => {
                this.categories = res.data.data;
                this.isLoading = false;
            }).catch(err => console.log(err));        }
    }
</script>

<style scoped>

</style>