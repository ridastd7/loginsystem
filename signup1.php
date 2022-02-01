<?php
$showAlert= false;
$showError= false;
echo $_SERVER["REQUEST_METHOD"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db1.php';
    $username = $_POST["username"];
    $passcode = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    //Check where username exist:
    $existSql = "SELECT * FROM `signup` WHERE username = '$username'";
    $result = mysqli_query($link,$existSql);
    $numExistrows = mysqli_num_rows($result);
    if($numExistrows > 0){
      $showError = "Username Already Exist";
    }
    else {
      
      // Data Inserted into the table:
       if(($passcode == $cpassword)){
        $sql = "INSERT INTO `signup`(`username`, `password`, `dt`) VALUES ('$username','$passcode',current_timestamp())";
        $result = mysqli_query($link,$sql);
        echo $result;
        if($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Password do not match";
    }
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

    <title>Signup</title>
  </head>
  <body>

    
    <?php require "partial/_nav.php" ?>
    <?php
    //Showing alert for above conditions:
   
      if($showAlert){
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

    <div class="container">
        <h1 class="text-center">Signup into our website </h1>
        <form action="/loginsystem/signup1.php" method="POST">
  <div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password">
    <small id="passsword" class="form-text text-muted">Make sure you remember password! </small>
  </div>
  <div class="form-group">
    <label for="cpassword"> Conform Password</label>
    <input type="password" class="form-control" name="cpassword" id="cpassword">
</div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
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