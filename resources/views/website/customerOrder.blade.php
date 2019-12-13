<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="card mb-3" style="max-width: 1600px;; margin-top: 40px;">
     <div class="row no-gutters">
    <div class="col-md-4">
      <img src="productPhotos/5df07df42ddc1_avenger-iron-man-hd-wallpaper-1080x608.jpg" class="card-img" style="width:100%; height:100%;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
       <legend>Please Fill Register Form</legend><hr>
      <form>
      <input class="form-control" type="text" placeholder="Enter Name" ><br>
      <input class="form-control" type="text" placeholder="Enter Phone" ><br>
      <input class="form-control" type="text" placeholder="Enter Address" ><br>
      <input class="form-control" type="text" placeholder="Detail " ><br>
     
      <button type="button" class="btn btn-success" onclick="order()">Order Now</button>
      <a href="{{url('goWebsite')}}"><button type="button" class="btn btn-danger">Cancle</button></a>
  
     
        </form>

       
      </div>
    </div>
  </div>
</div>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <script>
    function order(){
        alert('Order Success');
    }
    </script>
</body>




</html>