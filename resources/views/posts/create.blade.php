@extends('layouts.app')
@section('content')
<style>
  /* Container Styling */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Card Styling */
.card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Form Elements */
form label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
    color: #333;
}

form input,
form textarea {
    margin-top: 5px;
    margin-bottom: 15px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 100%;
    box-sizing: border-box;
}

form textarea {
    resize: none;
}

/* File Input Styling */
.form-label {
    font-weight: bold;
    margin-bottom: 10px;
}

form input[type="file"] {
    padding: 5px;
    font-size: 14px;
}

/* Button Styling */
button {
    background-color: #6c757d;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #5a6268;
}

/* Image Preview */
.img-blog {
    display: block;
    max-width: 100%;
    margin-top: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Error Messages */
.alert.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 15px;
}

.alert.alert-danger ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.alert.alert-danger li {
    font-size: 14px;
}

</style>
<div class="container">
  <h1>Add Post</h1>
  <section class="mt-3">
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      @csrf
      <!-- Error message when data is not inputted -->
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card p-3">
        <label for="floatingInput">Title</label>
        <input class="form-control" type="text" name="title">
        <label for="floatingTextArea">Description</label>
        <textarea class="form-control" name="description" id="floatingTextarea" cols="30" rows="10"></textarea>
        <label for="formFile" class="form-label">Add Image</label>
        <img src="" alt="" class="img-blog">
        <input class="form-control" type="file" name="image">
      </div>
      <button class="btn btn-secondary m-3">Save</button>
    </form>
  </section>
    
</div>
@endsection