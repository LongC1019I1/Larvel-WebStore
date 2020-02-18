<?php

namespace App\Http\Controllers;

use App\Http\Services\impl\ProductServices;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $productService;
    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    public function index(){
        $products = $this->productService->getAll();
        return view('shop.home',compact('products'));
    }
}
