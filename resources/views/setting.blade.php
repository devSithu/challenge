@extends('layout.master')

@section('title','Home Page')
    
@section('content')
<div class="container">
    <div class="dashbook">
        <h2>Dashbook Setting</h2>
        <form  id="contactForm" >
          {{ csrf_field() }}
          <input type="hidden" value="" name="id" id="id">
            <div class="form-group">
                    <label for="name">Website Name:</label>
                    <input type="text" class="form-control" name="website_name" id="name" value="">
                  </div>
                  <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value=" ">
                      </div>     
                      <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="phone" class="form-control"name="phone"  id="phone" value=" ">
                          </div>
                          <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" id="address" value=" ">
                              </div>
                              <div class="form-group">
                                    <label for="map">Google Map:</label>
                                    <input type="text" class="form-control" name="googleMap" id="map" value=" ">
                                  </div>
                                  <div class="form-group">
                                        <label for="about">About Us:</label>
                                        <input type="text" class="form-control" name="about_us" id="about" value=" ">
                                      </div>
        
            
            <button type="submit" class="btn btn-success" onclick="update_contact()">Change</button>
           
          </form>
<br><br>
    </div>

    <hr>

    <div class="account">
         <h2>Account Setting</h2>
          <br>
          <form class="form-inline" id="accountForm">
              <input type="hidden" value="" name="accountId" id="accountId">
            {{ csrf_field() }}
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="account_email" value="">
            <label for="pwd">Password</label>
            <input type="text" class="form-control" name="password" id="account_password" value="">
           
            <button type="submit" class="btn btn-success" onclick="update_account()">Change</button>
          </form>
          <hr>
        </div>
      </div>
     
</div>



@endsection
<script>
           
  load_data();
  load_account();
  
        //load contact

        function load_data(){
         
            fetch('http://localhost/challenge/public/setting/contact')
            .then(response=>response.json())
            .then(education=>show_data(education))
            .catch(err=>console.log(err))
            
        }
        function show_data(educations){
            var txt_id=document.querySelector("#id");
            var txt_name=document.querySelector("#name");
            var txt_email=document.querySelector("#email");
            var txt_phone=document.querySelector("#phone");
            var txt_address=document.querySelector("#address");
            var txt_map=document.querySelector("#map");
            var txt_about=document.querySelector("#about");
           
           txt_id.value=educations[0]['id'];
           txt_name.value=educations[0]['website_name'];
           txt_email.value=educations[0]['email'];
           txt_phone.value=educations[0]['phone'];
           txt_address.value=educations[0]['address'];
           txt_map.value=educations[0]['googleMap'];
           txt_about.value=educations[0]['about_us'];
          
        }
        
        function update_contact(){
        
            event.preventDefault();
                var txt_id=document.querySelector("#id");
                var id=txt_id.value;
                

                var contactForm=document.querySelector("#contactForm");
                var form_data=new FormData(contactForm);
               
       
         fetch(`http://localhost/challenge/public/setting/update_contact/${id}`, {
            method: 'post',
            body: form_data
          }) .then(response=>response.json())
            .then(result=>{
                // console.log(result)
                result['status']==='success'?load_data():alert('error');
            })
            .catch(err=>console.log(err));
            alert('change success')
       
        }

        function load_account(){
         
         fetch('http://localhost/challenge/public/setting/loadAccount')
         .then(response=>response.json())
         .then(education=>show_account(education))
         .catch(err=>console.log(err))
         
     }
     function show_account(educations){
         var txt_account_email=document.querySelector("#account_email");
         var txt_account_password=document.querySelector("#account_password");
         
         txt_account_email.value=educations[0]['email'];
         txt_account_password.value=educations[0]['password'];
     }
        
     function update_account(){
     
            event.preventDefault();
                var txt_id=document.querySelector("#accountId");
                var id=txt_id.value;
                 
                var accountForm=document.querySelector("#accountForm");
                var form_data=new FormData(accountForm);
                console.log(form_data);
       
         fetch(`http://localhost/challenge/public/setting/updateAccount/${id}`, {
            method: 'post',
            body: form_data
          }) .then(response=>response.json())
            .then(result=>{
                result['status']==='success'?load_data():alert('error');
            })
            .catch(err=>console.log(err));
            alert('account change success')
        }
</script>

