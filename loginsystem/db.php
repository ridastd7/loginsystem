<?php

$con = mysqli_connect("localhost","root","");
//check if connect to the database:
    if(!$con){
        die("Sorry! we fail to connect". mysqli_connect_error());
    }
    else{
        echo"Connect successfully to the database:";
    }

    //Create a database:
    $sql= "CREATE DATABASE signin";
    $result= mysqli_query($con,$sql);
    if($result){
        echo"Database Created ";
    }
    else{
        echo"Error creating database". mysqli_error($con);
    }
?>