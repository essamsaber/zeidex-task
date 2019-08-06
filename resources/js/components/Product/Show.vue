<template>
    <div class="product row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h3>Product Details</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Product Name: {{product.name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Price: ${{product.price}}</h6>
                    <router-link :to="`/products/${product.id}/edit`"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit </button></router-link>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Product Images</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mr-5" v-for="(image,key) in images" :key="key">
                            <img class="product-image " :src="image" :alt="product.name" />
                            <hr>
                            <button @click.prevent="deleteImage(image)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: '',
                images:''
            }
        },
        mounted() {
            let product_id = this.$route.params.id;
            axios.get(`/api/products/${product_id}`)
                .then(res => {
                    this.product = res.data.data;
                    this.images = res.data.data.images;
                })
        },
        methods: {
            deleteImage(image, key) {
                axios.put(`/api/images/delete`, {image:image})
                    .then(res => {
                        this.images.splice(key,1);
                    }).catch(err => {
                        console.log(err);
                })
            }
        }
    }
</script>

<style scoped>
.product-image{
    width: 200px;
    height: 200px;
}
</style>