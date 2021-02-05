<?php
 session_start();
 include('database/dbconfig.php'); 
 
 $CusID=$_SESSION['CusID'];
 $CusUsername=$_SESSION['CusUsername'];
 
 if(!isset( $_SESSION["CusUsername"]))
    {
        echo "<script>alert('Please Login!');window.location.href='HTML/Customer(Login - Sign Up).php'</script>";
    }
?>