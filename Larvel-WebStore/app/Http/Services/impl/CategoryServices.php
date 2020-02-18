<?php


namespace App\Http\Services\impl;


use App\Category;
use App\Http\Repositories\eloquent\CategoryRepo;
use App\Http\Services\CategoryServiceInterface;
use Illuminate\Support\Str;

class CategoryServices implements CategoryServiceInterface
{
    protected $categoryRepo;

    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAll()
    {
        return $this->categoryRepo->getAll();
    }

    public function create($request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $category = new Category([
            'name' => $request->get('name'),
            'slug' => Str::slug( $request->get('name'),'-')
        ]);
        $this->categoryRepo->storeOrUpdate($category);

    }

    public function update($request, $id)
    {

        $request->validate([
            'name'=>'required',
        ]);

        $category = $this->categoryRepo->findById($id);
        $category->name = $request->name;
        $category->slug =  Str::slug($request->name);
        $this->categoryRepo->storeOrUpdate($category);
    }

    public function destroy($id)
    {
        $category = $this->findById($id);
        $this->categoryRepo->delete($category);
    }

    public function findById($id)
    {
        return $this->categoryRepo->findById($id);
    }
}
