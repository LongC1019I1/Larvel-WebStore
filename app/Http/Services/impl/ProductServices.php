<?php


namespace App\Http\Services\impl;


use App\Http\Repositories\eloquent\ProductRepo;
use App\Http\Services\ProductServiceInterface;
use App\Product;

class ProductServices implements ProductServiceInterface

{
    protected $productRepo;

    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAll()
    {
        return $this->productRepo->getAll();
    }

    public function create($request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->image = $this->uploadImage($request);
        $this->productRepo->storeOrUpdate($product);

    }

    public function update($request, $id)
    {
        $product = $this->findById($id);

        $image = $request->image;
        if ($image) {
            unlink('storage/' . $product->image);
            $product->fill($request->all());
            $product->image = $this->uploadImage($request);
        } else {
            $product->fill($request->all());
        }

        $this->productRepo->storeOrUpdate($product);
    }

    public function destroy($id)
    {
        $product = $this->findById($id);
        unlink('storage/' . $product->image);
        $this->productRepo->delete($product);
    }

    public function findById($id)
    {
        return $this->productRepo->findById($id);
    }

    public function uploadImage($request)
    {
        if (!$request->hasFile('image')) {
            $image_name = 'images/no_image.jpg';
        } else {
            $image = $request->file('image');
            $image_name = 'images/' . date('d-m-Y H:i:s') . '.' . $image->getClientOriginalName();
            $image->storeAs('public/', $image_name);
        }
        return $image_name;
    }

    public function search($request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect()->route('product.index');
        } else {
            return $this->productRepo->search($keyword);
        }
    }
}
