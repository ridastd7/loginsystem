<?php
$link = mysqli_connect("localhost","root","","loginsystem1");
if($link){
    echo"success";
}
else{
    die("Error!" . mysqli_connect_error());
}
?>