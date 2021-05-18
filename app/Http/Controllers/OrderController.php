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
    public function index($id,$price){
      $add = new Order;
      $add->user_id=$id;
      $add->price=$price;
      $add->save();
      $cart = DB::table('products')
      ->join('carts','products.id','carts.product_id')
      ->select('user_id','products.name','products.price')
      ->get();
      return view('checkout',['cart'=>$cart]);
    }
    public function orders(){
      $orders = DB::table('orders')
      ->join('addresses','orders.user_id','addresses.user_id')
      ->get();
      return view('admin.orders',['orders'=>$orders]);
    }
    public function save(Request $r, $id, $price){
      $datas = Cart::all()->where('user_id', $id);
      foreach($datas as $org)
      {
          $org->delete();
      }
      if (Address::where('user_id', '=', $id)->exists()) {
        return view('/order-complete');
      }else{
        $add = new Address;
        $add->user_id=$id;
        $add->house_no=$r->house_no;
        $add->thana=$r->thana;
        $add->postal_code=$r->postal_code;
        $add->city=$r->city;
        $add->country=$r->country;
        $add->phone_number=$r->phone_number;
        $add->save();
        return view('/order-complete');
      }
    }
}
