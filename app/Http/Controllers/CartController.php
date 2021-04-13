<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function index(){
      $cart = DB::table('products')
      ->join('carts','products.id','carts.product_id')
      ->select('user_id','carts.id','products.image','products.name','products.price')
      ->get();
      return view('cart',['cart'=>$cart]);
    }
    public function delete($id){
      $data = Cart::findOrFail($id);
      $data->delete();
      return redirect('cart');
    }
    public function store($pro_id,$usr_id){
      $cart= new Cart;
      $cart->user_id=$usr_id;
      $cart->product_id=$pro_id;
      $cart->save();
      return redirect('shop');
    }
}
