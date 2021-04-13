<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;

class HomeController extends Controller
{
    //
    public function index(){
      $data = Slider::all();
      $categories = Category::all();
      $newarrival = Product::orderBy('created_at', 'DESC')->get();
      $bestseller = Product::all();
      $posts = Blog::all();
      return view('index',['sliders'=>$data,'categories'=>$categories,'newarrival'=>$newarrival,'bestseller'=>$bestseller,'posts'=>$posts]);
    }
}
