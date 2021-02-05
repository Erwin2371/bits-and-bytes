<?php
session_start();
include('database/dbconfig.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    echo "<script>window.location = 'register.php'</script>";
}

$email_login = $_SESSION['username'] ;
if(!$_SESSION['username'])
{   
    header("Location:login.php");
}

?>


