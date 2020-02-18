<?php


namespace App\Http\Repositories\eloquent;


use App\Http\Repositories\ProductRepoInterface;
use App\Product;

class ProductRepo implements ProductRepoInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->paginate(5);
    }

    public function storeOrUpdate($obj)
    {
        $obj->save();
    }


    public function delete($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->product->findOrFail($id);
    }

    public function search($keyword)
    {
        return $this->product->where('name','LIKE','%'.$keyword.'%')->paginate(5);
    }
}
