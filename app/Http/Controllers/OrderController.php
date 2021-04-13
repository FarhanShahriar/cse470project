<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
Use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Address;

class OrderController extends Controller
{
    //
    public function index(){
      $cart = DB::table('products')
      ->join('carts','products.id','carts.product_id')
      ->select('user_id','products.name','products.price')
      ->get();
      return view('checkout',['cart'=>$cart]);
    }
    public function orders(){
      $orders = Order::all();
      return view('admin.orders',['orders'=>$orders]);
    }
    public function save(Request $r, $id, $price){
      $add = new Address;
      $add->user_id=$id;
      $add->house_no=$r->house_no;
      $add->thana=$r->thana;
      $add->postal_code=$r->postal_code;
      $add->city=$r->city;
      $add->country=$r->country;
      $add->phone_number=$r->phone_number;
      $add->save();
      //dd($add);
      // $order = new Order;
      // $order->user_id=$id;
      // $order->shipping_id=Address::where('id',$id);
      // $order->price=$price;
      // $order->save();
      return view('/order-complete');
    }
}
