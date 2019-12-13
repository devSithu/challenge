<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br><br>
    @if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif
  <legend><h2>Category Adding</h2></legend>
  <form enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter category name" name="name">
    </div>
    <div class="form-group">
      <label for="photo">Photo:</label>
      <input type="file" class="form-control" id="photo"  name="photo">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
<br><br>


 <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Photo</th>
            
          </tr>
        </thead>
        <tbody>
                @foreach($categoty as $cat)
            <tr>
                <td>{{$cat->name}}</td>
                <td><img src="{{asset('/uploads/'.$cat->photo)}}" style="width:80px; height:80px;"></td>
                <td><a href="{{url('updateCategory/'.$cat->id)}}"><button class="btn btn-success">Update</button></a>&emsp;
                  <a href="{{url('deleteCategory/'.$cat->id)}}"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
            
                @endforeach
        </tbody>
      </table> 
</div>

</body>
</html>
