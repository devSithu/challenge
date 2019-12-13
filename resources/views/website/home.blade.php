<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Website</title>
</head>
<body>

  <div class="jumbotron">

    <h1>Customer Order Page</h1>
    <p>You can easily buy the products</p>
    <a href="{{url('/home')}}"><button type="button" class="btn btn-info">Go To Dashbook</button></a>
  </div>

  
    <div class=" row" id="tbody">
    
    </div>
    


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>


<script>
load_data();
    function load_data(){
           fetch('http://localhost/challenge/public/getProductPhoto')
           .then(response=>response.json())
           .then(productPhoto=>show_data(productPhoto))
           .catch(err=>console.log(err))

       }
function show_data(productPhotos){
           var tbody=document.querySelector('#tbody');
           tbody.innerHTML=" ";
          
           productPhotos.forEach(function (pPhoto) {
               tbody.innerHTML+=`
                <div class="col-md-2">
                <div class="card" style="width: 200px; margin-top:10px;">
              <img src="${pPhoto['photo']}" class="card-img-top">
                <div class="card-body">
           
                <a href="{{url('customerOrder')}}" class="btn btn-success">Buy</a>
                </div>
                </div>

                </div>
               `;
           })
       }

</script>
</body>
</html>
