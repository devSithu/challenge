@extends('layout.master')

@section('title','Product Page')

    
@section('content')
<div class="container">
    <br>
    <legend>Product Page</legend>
    <button class="btn btn-waring pull-right" data-target="#form" onclick="show()" >Add Product &ensp;<i class="fa fa-plus" aria-hidden="true"></i></button>
    

   {{-- insertForm --}}
   <div >
    <form id="productForm" >
      {{ csrf_field() }}
      <table>
        <tr>
          <td>Title</td>
          <td><input type="text" id="title" name="title"></td>
        </tr>
        <tr>
            <td>Detail</td>
            <td><input type="text"  id="detail" name="detail"></td>
          </tr>
          <tr>
              <td>Price</td>
              <td><input type="number" id="price" name="price"></td>
            </tr>
          
              <tr>
                <td>Category</td>
                <td><select name="category_id" id="category_id" onclick="create_product()">
                <option value="add">Create new category</option>
                @foreach ($category as $card)
                <option value="{{$card->id}}" >{{$card->name}}</option>  
                @endforeach
              
               
                </select></td>
              </tr>
      </table>
      <button class="btn">Add Product</button>
    </form>
    <br>
    <div class="container">
      <form id="cat_form" method="POST" enctype="multipart/form-data" action="{{url('add_category')}}">
        <legend>Add Category</legend>
        {{ csrf_field() }}
      
        Name:<input type="text" name="name" id="name"><br>
        Photo: 
      
        <input type="file" name="photo" id="photo"><br>
      <input type="submit" value="Create">

        
      </form>
    </div>

    <form id="update_product">
        <input type="hidden" id="product_id" name="id" value="0">
      Title: <input type="text" name="title" id="product_title"><br>
      Detail: <input type="text" name="detail" id="product_detail"> <br>
      Price: <input type="text" name="price" id="product_price"> <br>
      Category_id: <input type="text" name="category_id" id="product_category_id"><br>
      <input type="button" value="Update" onclick="update_product()"> 
    </form>
  
  </div>
  {{-- closeForm --}}
    <table class="table ">
            <thead>
              <tr>
                
                <th>Title</th>
                <th>Detail</th>
                <th>Price</th>
                <th>Category_id</th>
                
              </tr>
            </thead>
            <tbody id="tbody">
          
            </tbody>
          </table>
</div>

@endsection


<script>
  function show(){
      document.getElementById("productForm").style.display="block";
  }
  
 
  function adding(){
  alert(document.querySelector('#category_id').value)
 
     
  }

  //ajax
 
  load_data();
  



  function load_data(){
            fetch('http://localhost/challenge/public/getProduct')
            .then(response=>response.json())
            .then(product=>show_data(product))
            .catch(err=>console.log(err))
            
        }

        function show_data(products){
            var tbody=document.querySelector('#tbody');
            tbody.innerHTML=" ";
            
            products.forEach(function (pro) {
                tbody.innerHTML+=`
                        <tr>
                       
                        <td>${pro['title']}</td>
                        <td>${pro['detail']}</td>
                        <td>${pro['price']}</td>
                        <td>${pro['category_id']}</td>
                        <td>
                          <button class="btn btn-success" onclick="update_show('${pro["id"]}')">Update&ensp; <i class="fa fa-pencil" aria-hidden="true"></i></button>
                          <button class="btn btn-danger" onclick="delete_product('${pro["id"]}')">Delete&ensp;<i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                        </tr>
                `;
            })
        }

        function delete_product(id){
            fetch('http://localhost/challenge/public/deleteProduct/'+id)
            .then(response=>response.json())
            .then(result=>{
                result['status']==='success'?load_data():alert('error');
            })
            .catch(err=>console.log(err))
        }


        function create_product(){

          var cat_id=document.querySelector('#category_id');
          if(cat_id.value == 'add'){
            var cat_form=document.getElementById('cat_form').style.display='block';


          }
          event.preventDefault();
          var productForm=document.querySelector('#productForm');
            var form_data=new FormData(productForm);

           
            
            fetch('http://localhost/challenge/public/createProduct',{
                method:'post',
                body: form_data,
                contentType: 'multipart/form-data'
            })
            .then(response=>response.json())
            .then(load_data())
            .catch(err=>console.log(err))
        }

        function add_category(){
        
         event.preventDefault();
          var cat_form=document.querySelector('#cat_form');
            var form_data=new FormData(cat_form);

           
            
            fetch('http://localhost/challenge/public/create_category',{
                method:'post',
                body: form_data,
                contentType: 'multipart/form-data'
            })
            .then(response=>response.json())
            .then(load_data())
            .catch(err=>console.log(err))
        }

        function display_data(){
    alert('update')
  }

     function update_product(){
      event.preventDefault();
        var txt_id=document.getElementById('product_id');
        var id=txt_id.value;
        
        var update_product=document.querySelector('#update_product');
        var form_data=new FormData(update_product);

         fetch(`http://localhost/challenge/public/updateProduct/${id}`, {
            method: 'post',
            body: form_data
          }) .then(response=>response.json())
            .then(result=>{
                result['status']==="success"?load_data():alert('error');
                document.getElementById("form").reset();
            })
            .catch(err=>console.log(err));
     }   

     function update_show(id){
      document.getElementById("update_product").style.display="block";

      fetch("http://localhost/challenge/public/getProduct/"+id)
            .then(response=>response.json())
            .then(data_return=>{
                var txt_title=document.querySelector('#product_title');
                var txt_detail=document.querySelector('#product_detail');
                var txt_price=document.querySelector('#product_price');
                var txt_category_id=document.querySelector('#product_category_id');
                txt_title.value=data_return['title'];
                txt_detail.value=data_return['detail'];
                txt_price.value=data_return['price'];
                txt_category_id.value=data_return['category_id'];
                
            })
            .catch(err=>console.log(err));
  }
  </script>