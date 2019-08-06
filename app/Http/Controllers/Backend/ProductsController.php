<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return ProductResource::collection($this->productRepository->all());
    }

    public function store(ProductRequest $request)
    {
        $data = $request->only('images','name','category_id', 'price');
        $product = $this->productRepository->save($data);
        return response()->json([
            'status' => (bool) $product,
            'data' => new ProductResource($product),
            'msg' => 'New product has been saved successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        return $request->all();
        $data = $request->only('images','name','category_id', 'price');
        $product = $this->productRepository->update($id, $data);
        return response()->json([
            'status' => (bool) $product,
            'data' => $product,
            'msg' => 'Product has been updated successfully'
        ]);
    }


    public function show($id)
    {
        $product =  $this->productRepository->find($id);
        return new ProductResource($product);
    }



    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return response()->json([
            'status' => true,
            'msg' => 'The product has been deleted successfully'
        ]);
    }
}
