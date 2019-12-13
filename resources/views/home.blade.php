@extends('layout.master')

@section('title','Order Page')


@section('pageTitle',"sithu")


    
@section('content')
<div class="container">
    <br>
    <legend>Order Customer Page</legend>
    <button class="btn btn-waring pull-right" data-target="#form" onclick="show()" >Add &ensp;<i class="fa fa-plus" aria-hidden="true"></i></button>
    
    {{-- insertForm --}}
    <div id="form">
      <form  id="orderForm">

      {{csrf_field()}}

        <table>
          <tr>
            <td>Name</td>
            <td><input type="text" id="name" name="name"></td>
          </tr>
          <tr>
              <td>Phone</td>
              <td><input type="text"  id="phone" name="phone"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" id="address" name="address"></td>
              </tr>
              <tr>
                  <td>Detail</td>
                  <td><textarea name="detail" id="detail" cols="100" rows="4"></textarea></td>
                </tr>
        </table>
        <input type="button" value="Add Order" onclick="create_order()">
      </form>
    </div>

    <div class="container">
    <div id="updateForm">
      <form  id="update_order_form">

      {{csrf_field()}}

        <table>
        <input type="hidden" name="update_id" id="update_id">
          <tr>
            <td>Name</td>
            
            <td><input type="text" id="update_name" name="name"></td>
          </tr>
          <tr>
              <td>Phone</td>
              <td><input type="phone"  id="update_phone" name="phone"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" id="update_address" name="address"></td>
              </tr>
              <tr>
                  <td>Detail</td>
                  <td><textarea name="detail" id="update_detail" cols="100" rows="4"></textarea></td>
                </tr>
        </table>
        <input type="button" value="Add Order" onclick="update()">
      </form>
    </div>
    {{-- closeForm --}}
    
    <table class="table ">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Detail</th>
                
              </tr>
            </thead>
            <tbody id="tbody">
              
               
            </tbody>
          </table>
</div>

@endsection

<script>


function show(){
  document.getElementById("updateForm").style.display="none";
    document.getElementById("form").style.display="block";
}

load_data();

function load_data(){
            fetch('http://localhost/challenge/public/getOrder')
            .then(response=>response.json())
            .then(order=>show_data(order))
            .catch(err=>console.log(err))
                        
        }

        function show_data(orders){
            var tbody=document.querySelector('#tbody');
            tbody.innerHTML=" ";
            
            orders.forEach(function (ord) {
                tbody.innerHTML+=`
                        <tr>
                       
                        <td>${ord['name']}</td>
                        <td>${ord['phone']}</td>
                        <td>${ord['address']}</td>
                        <td>${ord['detail']}</td>
                        <td>
                          <button class="btn btn-success" onclick="update_show('${ord["id"]}')">Update&ensp; <i class="fa fa-pencil" aria-hidden="true"></i></button>
                          <button class="btn btn-danger" onclick="delete_order('${ord["id"]}')">Delete&ensp;<i class="fa fa-trash" aria-hidden="true"></i></button>
                          </td>
                    
                        </tr>
                `;
            })
        }

        //create
        function create_order(){
          event.preventDefault();
          var orderForm=document.querySelector('#orderForm');
            var form_data=new FormData(orderForm);

            fetch('http://localhost/challenge/public/insertOrder',{
                method:'post',
                body: form_data,
                contentType: 'multipart/form-data'
            })
            .then(response=>response.json())
            .then(result=>{result['status']==="success"?load_data():alert('error');})
            .catch(err=>console.log(err))

            document.getElementById("form").style.display="none";
            orderForm.reset();
        }


        //delete
        function delete_order(id){
          event.preventDefault();
          var res=confirm('Are you sure?');
          if(res){
            fetch('http://localhost/challenge/public/deleteOrder/'+id)
           .then(response=>response.json())
           .then(load_data())
           .catch(err=>console.log(err))
          }
        
        }


        //update
        function update_show(id){
          var update_id=document.querySelector('#update_id');
          var update_name=document.querySelector('#update_name');
          var update_phone=document.querySelector('#update_phone');
          var update_address=document.querySelector('#update_address');
          var update_detail=document.querySelector('#update_detail');


          document.getElementById("updateForm").style.display="block";
          document.getElementById("form").style.display="none";


          fetch("http://localhost/challenge/public/getOne/"+id)
           .then(response=>response.json())
           .then(data_return=>{

                update_id.value=id;
               update_name.value=data_return['name'];
               update_phone.value=data_return['phone'];
               update_address.value=data_return['address'];
               update_detail.value=data_return['detail'];
        
           })
           .catch(err=>console.log(err));

                                            
        }

        function update(){
          event.preventDefault();

               var id=document.querySelector('#update_id').value;
               var update_order_form=document.querySelector("#update_order_form");
                var form_data=new FormData(update_order_form);
         fetch(`http://localhost/challenge/public/updateOrder/${id}`, {
            method: 'post',
            body: form_data
          }) .then(response=>response.json())
            .then(result=>{
                result['status']==='success'?load_data():alert('error');
            })
            .catch(err=>console.log(err));
            alert('Update Success!')
            document.getElementById("updateForm").style.display="none";

        }
</script>