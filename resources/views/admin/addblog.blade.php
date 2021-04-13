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
    Write Blog</h1>
</div>

<div class="container">
  <form action="/submitblog" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="title..">

    <label for="author">Author</label>
    <input type="text" id="author" name="author" placeholder="author..">

    <label for="description">Write/Re-write Blog here</label>
    <textarea id="subject" name="description" placeholder="Write something.." style="height:200px"></textarea>

    <label for="image">Image</label>
    <input  type="file" name="image" id="image">

    <input type="submit" value="Submit">

  </form>
</div>
@endsection
