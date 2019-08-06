<template>
    <div class="all-categories">
        <router-link :to="{name:'createProduct'}"><span class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Product</span></router-link>
        <h3 class="text-center">Last inserted products</h3>

        <table class="table mt-2">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th  colspan="3" scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>
            <tr v-if="isLoading"><td colspan="4">Loading products ....</td></tr>
            <tr v-else v-for="(product, key) in products" :key="key">
                <th scope="row">{{key+1}}</th>
                <td>{{product.name}}</td>
                <td>{{product.price}}</td>
                <td colspan="3">
                    <router-link :to="`/products/${product.id}/edit`"><span class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></span></router-link>
                    <router-link :to="`/products/${product.id}`" title="Show product details"><span class="btn btn-sm btn-info"><i class="fa fa-eye"></i></span></router-link>
                    <button class="btn btn-sm btn-danger" @click.prevent="deleteProduct(key,product.id)"><i class="fa fa-trash"></i></button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                isLoading: true,
                products: [],
            }
        },
        methods:{
            deleteProduct(key, id) {

                if(confirm("Do you really want to delete?")){
                    axios.delete(`/api/products/${id}`)
                        .then(res => {
                            this.products.splice(key, 1);
                        });
                }
            }
        },
        mounted() {
            axios.get(`/api/products`)
                .then(res => {
                    this.isLoading = false;
                    this.products = res.data.data
                }).catch(err => {

            })
        }

    }
</script>

<style scoped>

</style>