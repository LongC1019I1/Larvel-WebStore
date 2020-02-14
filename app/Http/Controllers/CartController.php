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
        //cart lấy dữ liệu kiểu gì? Có phải Sesion:get này tạo ra file session không?
        // get('cart') là lấy dữ liệu từ trang homehay là lấy dữ liệu từ trang cart, lấy giá trị gì? product hay là gì?
        //Nhìn một phiên tồn tại trong bao lâu ở đâu?
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->add($product);
        //Session sẽ sinh ra khi được gán giá trị.
        Session::put('cart',$newCart);

        return back();
    }
}
