<?php


namespace App\Repositories\Orm\Eloquent;


use App\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::with(['products'])->withCount('products')->latest()->get();
    }

    public function find(int $id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
    }

    public function update(int $id, array $data = [])
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function save(array $data = [])
    {
        $category = Category::create($data);
        return $category;
    }

}