<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db1.php';
    $username = $_POST["username"];
    $passcode = $_POST["password"];
    
    $sql="SELECT * FROM signup WHERE username='$username' AND password='$passcode'";
    $result= mysqli_query($link,$sql) or die(mysqli_error()); 
    echo var_dump($result);
    $num = mysqli_num_rows($result);
    echo $num;
    if($num == 1){
      while($row=mysqli_fetch_assoc($result)){
        if(password_verify($passcode, $row['password'])){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location:welcome1.php");
    }
    else{
        $showError = "Invalid CredentialS";
    }
  }
}
else {
  $showError = "Invalid CREDENTIAL";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
   <?php require "partial/_nav.php" ?>
   <?php
    if($login){
     echo'
        <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUCCESS</strong> Your account is created successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
    if($showError){
        echo'
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> '. $showError.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }

    ?>

    <div class="container" my-4>
    <div class="container">
        <h1 class="text-center">login into our website </h1>
        <form action="/loginsystem/login1.php" method="POST">
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password">
    <small id="passsword" class="form-text text-muted"> If you signup then login please! </small>
  </div>
  
  <button type="submit" class="btn btn-primary">login</button>
</form>
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
  </body>
</html>