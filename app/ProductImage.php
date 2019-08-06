<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'image_products';
    protected $guarded = ['id'];

    public function toArray()
    {
        return $this->path;
    }
}
