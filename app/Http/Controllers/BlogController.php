<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index(){
      $posts = Blog::all();
      return view('blog',['posts'=>$posts]);
    }
    public function show($id){
      $blogitem = Blog::findOrFail($id);
      return view('blog-single',['blogitem'=>$blogitem]);
    }
    public function blogs(){
      $blogs = Blog::all();
      return view('admin.blogs',['blogs'=>$blogs]);
    }
    public function save(Request $r){
      $blog = new Blog;
      $blog->title=$r->title;
      $blog->author=$r->author;
      $blog->description=$r->description;
      $r->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $imageName = time().'-'.$r->name.'.'.$r->image->extension();

        $r->image->move(public_path('/images'), $imageName);
      $blog->image=$imageName;
      $blog->save();
      return redirect('/admin/blogs');
    }
    public function edit($id){
      $blog = Blog::findOrFail($id);
      return view('admin.editblog',['blog'=>$blog]);
    }
    public function update(Request $r, $id){
      $blog = Blog::findOrFail($id);
      $blog->title=$r->title;
      $blog->author=$r->author;
      $blog->description=$r->description;
      if($r->hasfile('image')){
        //File::delete('$blog->image');
        $r->validate([
              'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
          ]);

        $imageName = time().'-'.$r->name.'.'.$r->image->extension();

        $r->image->move(public_path('/images'), $imageName);
        $blog->image=$imageName;
      }
      $blog->save();
      return redirect('/admin/blogs');
    }
    public function delete($id){
      $data = Blog::findOrFail($id);
      $data->delete();
      return redirect('/admin/blogs');
    }
}
