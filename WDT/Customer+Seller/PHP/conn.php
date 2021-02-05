<?php
    $con = mysqli_connect("localhost", "root", "", "b&b", "3308");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MYSQL: ". mysqli_connect_error();
    }
    else 
   {
        // echo "MYSQL connected successfully";
    } 
?>