<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    protected static function boot()
    {
        parent::boot();
        static::deleted(function($category){
           $category->products->each(function($product){
               $product->delete();
           });
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class)->latest();
    }


}
