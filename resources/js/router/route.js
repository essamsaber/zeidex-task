import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Categories from '../components/category/Categories';
import EditCategory from '../components/category/Edit';
import CreateCategory from '../components/category/Create';
import ShowCategoryProducts from '../components/category/ShowCategoryProducts';

import CreateProduct from '../components/Product/Create';
import EditProduct from '../components/Product/Edit';
import ShowProduct from '../components/Product/Show';
import Products from '../components/Product/Products';

const routes = [
    {path: '/categories', component: Categories, name:'categories'},
    {path: '/categories/create', component: CreateCategory, name:'createCategory'},
    {path: '/categories/:id/edit', component: EditCategory, name:'editCategory', params: true},
    {path: '/categories/:id', component: ShowCategoryProducts, name:'showCategoryProducts', params: true},

    {path: '/products/create', component: CreateProduct, name:'createProduct'},
    {path: '/products/:id/edit', component: EditProduct, name:'editProduct', params: true},
    {path: '/products/:id', component: ShowProduct, name:'showProductDetails', params: true},
    {path: '/products', component: Products, name:'products', params: true},

];

const router = new VueRouter({
    routes, // short for `routes: routes`,
    hashbang: false,
    mode: 'history'
})

export default router;