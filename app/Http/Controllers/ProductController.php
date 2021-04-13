<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
      $products = Product::all();
      return view('shop',['products'=>$products]);
    }
    public function show($id){
      $details = Product::findOrFail($id);
      return view('product-details',['details'=>$details]);
    }
    public function products(){
      $products = Product::all();
      return view('admin.products',['products'=>$products]);
    }
    public function save(Request $r){
      $pro = new Product;
      $pro->name=$r->name;
      $pro->SKU=$r->SKU;
      $pro->description=$r->description;
      $pro->price=$r->price;
      $pro->quantity=$r->quantity;
      $pro->slug=$r->slug;
      $pro->gender=$r->gender;
      $pro->height=$r->height;
      $pro->width=$r->width;
      $pro->weight=$r->weight;
      $pro->gold_weight=$r->gold_weight;
      $pro->gold_purity=$r->gold_purity;
      $pro->diamond_weight=$r->diamond_weight;
      $pro->diamond_purity=$r->diamond_purity;
      $pro->caret=$r->caret;
      $r->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $imageName = time().'-'.$r->name.'.'.$r->image->extension();

        $r->image->move(public_path('/images'), $imageName);
      $pro->image=$imageName;
      $pro->save();
      return redirect('/admin/products');
    }
    public function edit($id){
      $pro = Product::findOrFail($id);
      return view('admin.editproduct',['pro'=>$pro]);
    }
    public function update(Request $r, $id){
      $pro = Product::findOrFail($id);
      $pro->name=$r->name;
      $pro->SKU=$r->SKU;
      $pro->description=$r->description;
      $pro->image=$r->image;
      $pro->price=$r->price;
      $pro->quantity=$r->quantity;
      $pro->slug=$r->slug;
      $pro->gender=$r->gender;
      $pro->height=$r->height;
      $pro->width=$r->width;
      $pro->weight=$r->weight;
      $pro->gold_weight=$r->gold_weight;
      $pro->gold_purity=$r->gold_purity;
      $pro->diamond_weight=$r->diamond_weight;
      $pro->diamond_purity=$r->diamond_purity;
      $pro->caret=$r->caret;
      if($r->hasfile('image')){
        File::delete('$pro->image');
        $r->validate([
              'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
          ]);

        $imageName = time().'-'.$r->name.'.'.$r->image->extension();

        $r->image->move(public_path('/images'), $imageName);
        $pro->image=$imageName;
      }
      $pro->save();
      return redirect('/admin/products');
    }
    public function delete($id){
      $data = Product::findOrFail($id);
      $data->delete();
      return redirect('/admin/products');
    }
}
