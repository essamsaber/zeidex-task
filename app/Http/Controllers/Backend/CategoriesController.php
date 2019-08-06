<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return CategoryResource::collection($this->categoryRepository->all());
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->only('name');
        $category = $this->categoryRepository->save($data);
        return response()->json([
            'status' => (bool) $category,
            'data' => $category,
            'msg' => 'New category has been saved successfully'
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->only('name');
        $category = $this->categoryRepository->update($id, $data);
        return response()->json([
            'status' => (bool) $category,
            'data' => $category,
            'msg' => 'Category name has been updated successfully'
        ]);
    }

    public function show($id)
    {
        $category =  $this->categoryRepository->find($id);
        return new CategoryResource($category);
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return response()->json([
            'status' => true,
            'msg' => 'Category has been deleted successfully'
        ]);
    }
}
