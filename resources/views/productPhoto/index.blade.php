@extends('layout.master')

@section('title','Home Page')
    
@section('content')

<div class="container">
    <br>
    <legend>Create Product</legend>
        <form method="POST" enctype="multipart/form-data">
            @if(session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
            @endif
           
            {{ csrf_field() }}
                <div class="form-group">
                  <label for="product_id">Product ID</label>
                  <input type="number" class="form-control" id="product_id" name="product_id" aria-describedby="emailHelp" placeholder="Enter Product ID">
                  
                </div>
                <div class="form-group">
                  <label for="photo">Photo</label>
                  <input type="file" class="form-control" id="photo" name="photo" >
                </div>
               
                <button type="submit" class="btn btn-primary" >Add Product</button>
              </form>
</div>

@endsection




