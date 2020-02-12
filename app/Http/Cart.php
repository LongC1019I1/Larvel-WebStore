<?php


namespace App\Http;


class Cart
{
    protected $items= null;
    protected $totalPrice = 0;
    protected $totalQty = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }
    public function add($product)
    {
        $storesItem = [
            'item'=>$product,
            'totalPrice' => 0,
            'toalQty' => 0
        ];

        //Kiểm tra san phẩm đã tồn tại trong giỏ hàng
        if (array_key_exists($product->id, $this->items)){
            $storesItem = $this->items[$product->id];
        }
        else {
            $this->totalQty  += $product->price;
        }
        $storesItem['totalQty']++;
        $storesItem['totalPrice']+= $product->price;

        //xu ly gio hang
        $this->totalPrice  += $product->price;



    }


}
