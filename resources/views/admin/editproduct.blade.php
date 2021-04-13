@extends('AdminLayout')
@section('content')
<style type="text/css">
/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>
<div class="container">
  <h1 style="
    font-size: 24px;">
    Edit Product</h1>
</div>
<div class="container">
  <form action="/updateproduct/{{$pro->id}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{$pro->name}}">

    <label for="SKU">SKU</label>
    <input type="text" id="SKU" name="SKU" value="{{$pro->SKU}}">

    <label for="description">Description</label>
    <input type="text" id="description" name="description" value="{{$pro->description}}">

    <label for="price">Price</label>
    <input type="text" id="price" name="price" value="{{$pro->price}}">

    <label for="quantity">Quantity</label>
    <input type="text" id="quantity" name="quantity" value="{{$pro->quantity}}">

    <label for="slug">slug</label>
    <input type="text" id="slug" name="slug" value="{{$pro->slug}}">

    <label for="gender">Gender</label>
    <input type="text" id="gender" name="gender" value="{{$pro->gender}}">

    <label for="height">Height</label>
    <input type="text" id="height" name="height" value="{{$pro->height}}">

    <label for="width">Width</label>
    <input type="text" id="width" name="width" value="{{$pro->width}}">

    <label for="weight">Weight</label>
    <input type="text" id="weight" name="weight" value="{{$pro->weight}}">

    <label for="gold_weight">Gold Weight</label>
    <input type="text" id="gold_weight" name="gold_weight" value="{{$pro->gold_weight}}">

    <label for="gold_purity">Gold Purity</label>
    <input type="text" id="gold_purity" name="gold_purity" value="{{$pro->gold_purity}}">

    <label for="diamond_weight">Diamond Weight</label>
    <input type="text" id="diamond_weight" name="diamond_weight" value="{{$pro->diamond_weight}}">

    <label for="diamond_purity">Diamond Purity</label>
    <input type="text" id="diamond_purity" name="diamond_purity" value="{{$pro->diamond_purity}}">

    <label for="caret">Caret</label>
    <input type="text" id="caret" name="caret" value="{{$pro->caret}}">

    <label for="image">Old Image</label>
    <br>
    <br>
    <img src="{{asset('images/'.$pro->image)}}" alt="" style="height:400px; width:500px;">

    <br>
    <br>

    <label for="image">Upload Image</label>
    <input type="file" name="image" id="image">

    <input type="submit" value="Update">

  </form>
</div>
@endsection
