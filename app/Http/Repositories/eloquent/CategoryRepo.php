<?php


namespace App\Http\Repositories\eloquent;




use App\Category;
use App\Http\Repositories\CategoryRepoInterface;

class CategoryRepo implements CategoryRepoInterface
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function storeOrUpdate($obj)
    {
        $obj->save();
    }

    public function delete($obj)
    {
        $obj->delete;
    }

    public function findById($id)
    {
        return $this->category->find($id);
    }
}
