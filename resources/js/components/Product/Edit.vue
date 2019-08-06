<template>
    <div class="create-product">
        <h3 class="text-center">Update {{this.name}}</h3>
        <form>
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control"  v-model="name">
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="number" class="form-control"  v-model="price">
            </div>
            <div class="form-group">
                <label for="">Select Category</label>
                <select @change="handleChangeCategory" name="" class="form-control" id="">
                    <option  v-for="category in categories"  :selected="category.id == category_id?
                    'selected':''" :value="category.id">{{category.name}}</option>
                </select>
            </div>


            <div class="form-group">
                <label>Choose Product images</label>
                <input id="upload-file" ref="file" type="file" multiple="multiple" class="form-control">
            </div>
            <div class="form-group">
                <div class="row">
                    <div v-for="(image,key) in images" :key="key">
                        <div class="col-md-2">
                            <img class="product-image" :src="image" :alt="name">
                            <hr>
                            <button @click.prevent="deleteImage(image)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <ul class="alert alert-danger list-group" v-if="errors">
                    <strong><span class="text-danger">Please fix the errors below</span></strong>
                    <li class="list-group-horizontal text-danger" v-for="error in errors">* {{error[0]}}</li>
                </ul>
            </div>
            <hr>
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
                id:'',
                name:'',
                price:'',
                category_id:'',
                images:[],
                categories:[],
                errors:''
            }
        },
        methods:{
            handleChangeCategory() {
                this.category_id = e.originalTarget.value;
            },
            handleUpdate() {
                console.log(this.name);
                axios.put(`/api/products/${this.id}`, {
                    "name":this.name,
                    "price":this.price,
                    "category_id":this.category_id
                } ).then(res =>{
                    this.$router.push({name:'categories'})
                }).catch(err => {
                    this.errors = err.response.data.errors;

                })
            }
        },
        mounted() {
            app = this;
            axios.get(`/api/products/${this.$route.params.id}`)
                .then(res => {
                    app.id = res.data.data.id;
                    app.name = res.data.data.name;
                    app.price = res.data.data.price;
                    app.category_id = res.data.data.category_id;
                    app.images = res.data.data.images;
                })

            axios.get('/api/categories')
                .then(res=> {
                    app.categories = res.data.data;
                })
        }
    }
</script>
<style scoped>
    .product-image{
        width: 200px;
        height: 200px;
    }
</style>