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
        //cart lấy dữ liệu kiểu gì? Có phải Sesion:get này tạo ra file session không? Lấy dữ liệu trong file Session
        // lấy giá trị gì? lấy giá trị $oldCart trong, newcart
        //Mục đích có hàm này $oldCart = Session::get('cart') vì, khi load lại trang khi add có thể mất dữ liệu, nên phải lấy lại giá trị, rồi mới add thêm
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        $newCart->add($product);
        //Session sẽ sinh ra khi được gán giá trị.
        Session::put('cart',$newCart);

        return back();
    }

    public function deleteCart($id)
    {
        $product = $this->productService->findById($id);
        $oldCart = Session::get('cart');

        $newCart = new Cart($oldCart);
        $newCart->delete($product);
//        $cart = Session::get('cart');
//        unset($cart->items[$id]);
        Session::put('cart', $newCart);
        return redirect()->back();


    }
}
