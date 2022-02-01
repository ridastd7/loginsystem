<?php
include('db.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $myuser=  mysqli_real_escape_string($con,$_POST['username']);
    $mypassword=mysqli_real_escape_string($con,$_POST['password']);

    $sql= "SELECT id FROM infor WHERE username='$myuser' and password='$mypassword'";
    $result= mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    $active=$row['active'];

    $count = mysqli_num_rows($result);

    //if result matched 
    if($count == 1){
        session_register("myuser");
        $_SESSION['login_user'] = $myuser;

        header("location:welcom.php");
    
    }
    else{
        $error = "Your login name or password is invalid";

    }
}
?>

<html lang="en">
    <head>
        <title> Login in</title>
        <style type="text/css">
            body{
                font-family:Arial, Helvetica, sans-serif;
                font-size:14px;
            }
            label{
                font-weight:bold;
                width:100px;
                font-size:14px;
            }
            .box{
                border:#666666 solid 1px;
            }
        </style>
    </head>
    <body bgcolor = "#FFFFFF">
        <div align = "center">
            <div style="eidth:300px; border:solid1px  #333333; " align ="left">
            <div style= "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
            
    <form action="" method="POST">
                 <div>
                <label for="name">User Name:</label><br>
           <input type="text" name="username" class="form-control"><br>
             </div>
              <div>
             <label for="password">Password</label><br>
              <input type="text"  name="password" class="form-control"><br>
             </div>
              <div>
            <input type="submit" class="btn btn-primary" name="login">
            </div>
            $error = "invalid statment";
            <div style = "font_size:11px; color:#cc0000; margin-top:10px"><?php $error = "invalid statment"; 
            echo $error;?></div>
        </div>
        </div>
    </form>

   
            
        </div>
    </body>
    </html>