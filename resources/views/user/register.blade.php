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
        <legend><h2>Create Account Page</h2></legend>
        {{ csrf_field() }}

        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="name" placeholder="User name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmpassword" name="password_confirmation" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


</body>
</html>
