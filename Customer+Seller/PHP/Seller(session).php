<?php
    include("../PHP/conn.php");
    session_start();
    $SellerID=$_SESSION["SellerID"];
    $Username=$_SESSION["Username"];
    if(!isset($_SESSION["Username"]))
    {
        echo "<script>alert('Please Login!'); window.location.href='../HTML/Seller(Login).php';</script>";
    }
?>