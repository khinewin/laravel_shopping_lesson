<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Cat;
use App\Cart;
use App\Coffee;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function getIndex(){
        $coffees=Coffee::OrderBy('id', 'desc')->paginate('6');
        return view ('welcome')->with(['coffees'=>$coffees]);
    }
    public function getCoffeePhoto($fileName){
        $file=Storage::disk('local')->get($fileName);
        return new Response($file, 200);
    }
    public function getClearCart(){
        Session::forget('cart');
        return redirect()->route('/');
    }
    public function ReduceByOne($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);
        return redirect()->back();

    }
    public function reduceItem($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->reduceItem($id);
        Session::put('cart', $cart);
        if(Session::get('cart')->totalQty <=0){
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function AddToCart($id, Request $request){
            $coffee=Coffee::find($id);
            $oldCart=Session::has('cart') ? Session::get('cart') : null;
            $cart=new Cart($oldCart);
            $cart->add($coffee, $coffee->id);
            Session::put('cart', $cart);
            return redirect()->back();

    }
    public function showCart(){
        if(Session::has('cart')){
            $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);
            return view ('coffee.cart')->with(['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
        }else{
            return redirect()->route('/');
        }
    }
}
