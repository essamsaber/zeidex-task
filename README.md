# ZEIDEX-TASK
# Laravel 5.8 API that uses the API resources with a Vue.js frontend

## Quick Start

#composer install

#Run Migrations
php artisan migrate

#Import Faker Categories and Products
php artisan db:seed

#Install JS Dependencies
npm install

#Watch Files
npm run watch

## Endpoints

### List all categories with products
GET api/categories

### Get products of single category
GET api/categories/{id}

### Delete category
DELETE api/categories/{id}

### Add category
POST api/categories
name

### Update category
PUT api/categories/{id}
name

### List all  products
GET api/products

### Get product details
GET api/products/{id}

### Delete category
DELETE api/products/{id}

### Add product
POST api/products
name,price,category_id,images,

### product update
PUT api/products/{id}
name,category_id, price

