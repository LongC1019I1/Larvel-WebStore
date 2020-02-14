<?php


namespace App\Http;


class Cart
{
    public $items= null;
    public $totalPrice = 0;
    public $totalQty = 0;

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
        //add sản phẩm mới
        $storesItem = [
            'item'=>$product,
            'totalPrice' => 0,
            'totalQty' => 0
        ];

        //Kiểm tra san phẩm đã tồn tại trong giỏ hàng

        if ($this->items)// Kiểm tra mua hàng chưa?
        {
            if (array_key_exists($product->id,$this->items )){
                $storesItem = $this->items[$product->id];
            }
            else {
              $this->totalQty++;
            }
        } elseif(!$this->items) {
            $this->totalQty++;
        }

        $storesItem['totalQty']++;
        $storesItem['totalPrice']+= $product->price;

        //xu ly gio hang
        $this->items[$product->id] =  $storesItem;//xong Store thì nhét nó vào mảng item
        $this->totalPrice  += $product->price;

    }


}
