<?php

namespace App\Http\Controllers;

use App\Http\Cart;
use App\Http\Services\impl\ProductServices;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    public function index(){
        $cart = session::get('cart');
        return view('shop.cart.cart',compact('cart'));
    }

    public function addToCart($id)
    {
        $product = $this->productService->findById($id);
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->add($product);

        Session::put('cart',$newCart);

        return back();

    }
}
