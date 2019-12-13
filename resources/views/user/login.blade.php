<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form method="POST">
        <br><br>
        <legend><h2>Login Page</h2></legend>
        {{ csrf_field() }}

        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
       
        <div class="form-group">
            <label for="email"><h4>Email</h4></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password"><h4>Password</h4></label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</body>
</html>
