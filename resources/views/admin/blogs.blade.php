@extends('AdminLayout')
@section('content')
<style media="screen">

h1{
font-size: 30px;
color: #fff;
text-transform: uppercase;
font-weight: 300;
text-align: center;
margin-bottom: 15px;
}
table{
width:100%;
table-layout: fixed;
}
.tbl-header{
background-color: rgba(255,255,255,0.3);
}
.tbl-content{
height:80%;
overflow-x:auto;
margin-top: 0px;
border: 1px solid rgba(255,255,255,0.3);
}
th{
padding: 20px 15px;
text-align: left;
font-weight: 500;
font-size: 12px;
color: #fff;
text-transform: uppercase;
}
td{
padding: 15px;
text-align: left;
vertical-align:middle;
font-weight: 300;
font-size: 12px;
color: #fff;
border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
background: -webkit-linear-gradient(left, #25c481, #25b7c4);
background: linear-gradient(to right, #25c481, #25b7c4);
font-family: 'Roboto', sans-serif;
}
section{
margin: 10px;
}


/* follow me template */
.made-with-love {
margin-top: 40px;
padding: 10px;
clear: left;
text-align: center;
font-size: 10px;
font-family: arial;
color: #fff;
}
.made-with-love i {
font-style: normal;
color: #F50057;
font-size: 14px;
position: relative;
top: 2px;
}
.made-with-love a {
color: #fff;
text-decoration: none;
}
.made-with-love a:hover {
text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
  width: 6px;
}
::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
::-webkit-scrollbar-thumb {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
</style>
<section>
  <!--for demo wrap-->
  <h1>Blogs <a href="/admin/addblog" style="
    font-size: 14px;
    background-color: deepskyblue;
    text-decoration: none;">Write Blog</a></h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Author</th>
          <th>Description</th>
          <th>Image</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        @foreach($blogs as $blog)
        <tr>
          <td>{{$blog->id}}</td>
          <td>{{$blog->title}}</td>
          <td>{{$blog->author}}</td>
          <td>{{$blog->description}}</td>
          <td><img src="{{asset('images/'.$blog->image)}}" alt="" style="height:40px; width:50px;"></td>
          <td>{{$blog->created_at}}</td>
          <td>
            <a href="/admin/editblog/{{$blog->id}}" style="
              font-size: 14px;
              background-color: deepskyblue;
              text-decoration: none;">Edit</a>
            <a href="/admin/deleteblog/{{$blog->id}}" style="
              font-size: 14px;
              background-color: deepskyblue;
              text-decoration: none;">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

@endsection
