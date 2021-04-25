<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function categories(){
      $categories = Category::all();
      return view('admin.categories',['categories'=>$categories]);
    }
    public function showslug($slug){
      $details = Product::where('slug', $slug)->get();
      return view('category-details',['details'=>$details]);
    }
    public function save(Request $r){
      $cat = new Category;
      $cat->name=$r->name;
      $cat->parent_id=$r->parent_id;
      $cat->description=$r->description;
      $cat->slug=$r->slug;
      $r->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $imageName = time().'-'.$r->name.'.'.$r->image->extension();

        $r->image->move(public_path('/images'), $imageName);
      $cat->image=$imageName;
      $cat->save();
      return redirect('/admin/categories');
    }
    public function edit($id){
      $cat = Category::findOrFail($id);
      return view('admin.editcategory',['cat'=>$cat]);
    }
    public function update(Request $r, $id){
      $cat = Category::findOrFail($id);
      $cat->name=$r->name;
      $cat->parent_id=$r->parent_id;
      $cat->description=$r->description;
      $cat->slug=$r->slug;
      if($r->hasfile('image')){
        //File::delete('$cat->image');
        $r->validate([
              'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
          ]);

        $imageName = time().'-'.$r->name.'.'.$r->image->extension();

        $r->image->move(public_path('/images'), $imageName);
        $cat->image=$imageName;
      }
      $cat->save();
      return redirect('/admin/categories');
    }
    public function delete($id){
      $data = Category::findOrFail($id);
      $data->delete();
      return redirect('/admin/categories');
    }
}
