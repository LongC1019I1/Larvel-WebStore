<?php

namespace App\Http\Controllers;

use App\Http\Cart;
use App\Http\Services\impl\ProductServices;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    public function index(){

    }

    public function addToCart($id)
    {
        $product = $this->productService->findById($id);
        $oldCart = session('cart');
        $newCart = new Cart($oldCart);
        $newCart->add($product);

        return back();

    }
}
