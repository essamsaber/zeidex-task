<template>
    <div class="create-product">
        <h3 class="text-center">Create new product</h3>
        <form>
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control"  v-model="product.name">
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="number" class="form-control"  v-model="product.price">
            </div>
            <div class="form-group">
                <label for="">Select Category</label>
                <select @change="handleChangeCategory" name="" class="form-control" id="">
                    <option v-model="product.category_id" v-for="category in categories" :value="category.id">{{category.name}}</option>
                </select>
            </div>


                <div class="form-group">
                    <label>Choose Product images</label>
                    <input id="upload-file" ref="file" type="file" multiple="multiple" class="form-control">
                </div>

            <div class="form-group">
                <ul class="alert alert-danger list-group" v-if="errors">
                    <strong><span class="text-danger">Please fix the errors below</span></strong>
                        <li class="list-group-horizontal text-danger" v-for="error in errors">* {{error[0]}}</li>
                </ul>
            </div>

            <div class="form-group">
                <router-link :to="{name:'categories'}"><span class="btn btn-primary">Back <i class="fa fa-angle-double-left"></i></span></router-link></td>
                <button type="submit" class="btn btn-success" @click.prevent="onUpload">Save <i class="fa fa-save"></i></button>
            </div>

        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                product: {
                    name:'',
                    category_id:'',
                    price:''
                },
                categories: '',
                errors:null
            }
        },
        methods:{
            handleChangeCategory(e) {
                this.product.category_id = e.originalTarget.value;
            },
            onUpload(){
                const formData = new FormData()
                for( var i = 0; i < this.$refs.file.files.length; i++ ){
                    let file = this.$refs.file.files[i];
                    formData.append('images[' + i + ']', file);
                    formData.append('name',this.product.name);
                    formData.append('price',this.product.price);
                    formData.append('category_id',this.product.category_id);
                }

                axios.post( '/api/products', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                    }
                ).then((res) => {
                    this.$router.push({name:'showCategoryProducts', params:{id:this.product.category_id}})
                }).catch((err) => {
                    this.errors = err.response.data.errors;
                });
            }
        },
        mounted(){
            axios.get('/api/categories').then(res => {
                this.categories = res.data.data;
                this.categories.unshift("Please choose the product category ...");
            })
        }
    }
</script>
