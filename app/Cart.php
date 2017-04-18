<?php

namespace App;
class Cart
{
    public $items;
    public $totalQty=0;
    public $totalPrice=0;
    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items=$oldCart->items;
            $this->totalPrice=$oldCart->totalPrice;
            $this->totalQty=$oldCart->totalQty;
        }else{
            $this->items=null;
        }
    }
    public function add($item, $id){
        $storeItem=['qty'=>0, 'item'=>$item, 'price'=>$item->price];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storeItem=$this->items[$id];
            }
        }
        $storeItem['qty']++;
        $storeItem['price'] = $storeItem['qty'] * $item->price;
    $this->items[$id]=$storeItem;
    $this->totalPrice += $item->price;
    $this->totalQty++;
    }
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price']-=$this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty'] <=0){
            unset($this->items[$id]);
        }
    }
    public function reduceItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}
