<?php


namespace App\Repositories\Orm\Eloquent;


use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return Product::latest()->get();
    }

    public function save(array $data = [])
    {
        return  Product::saveNewProduct($data);
    }

    public function find(int $id)
    {
        return Product::findOrFail($id);
    }

    public function update(int $id, array $data = [])
    {
        return Product::updateExistsProduct($id, $data);
    }


    public function delete(int $id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
    }
}