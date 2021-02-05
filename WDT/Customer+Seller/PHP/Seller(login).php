<?php

include("../PHP/conn.php");

if(isset($_POST["Login"]))
{
    $Username=mysqli_real_escape_string($con, $_POST["Username"]);
    $Password=mysqli_real_escape_string($con, $_POST["Password"]);

    try {
        $sql ="SELECT `SellerID`, `ShopName`, `Status` FROM seller where BINARY `Username`= ? AND BINARY `Password`= ?";
        $result = mysqli_prepare($con, $sql);
    
        //bind variable  to ?
        mysqli_stmt_bind_param($result, 'ss', $Username, $Password);
    
        //execute statement
        mysqli_stmt_execute($result);
    
        //store result
        mysqli_stmt_store_result($result);

        //bind result to variable SellerID
        mysqli_stmt_bind_result($result, $SellerID, $ShopName, $Status);

        mysqli_stmt_fetch($result);
        
        //return true if result == 1
        if(mysqli_stmt_num_rows($result) == 1 && $Status == 'Approve')
        {
            session_start();
            $_SESSION["Username"]=$Username;
            $_SESSION['SellerID']=$SellerID;
            $_SESSION['ShopName']=$ShopName;
            echo '<script>alert("Welcome '.$Username.'"); window.location.href="../HTML/Seller(Home).php";</script>';
        }
        else if($Status == 'Decline')
        {
            echo '<script>alert("Your Account Is Not Activated Please Contact Our Admin For Suppport"); window.location.href="../HTML/Seller(Login).php";</script>';
        }
        else
        {
            echo '<script>alert("Wrong Username or Password"); window.location.href="../HTML/Seller(Login).php";</script>';
        }
    }
    catch(Exception $e) 
    {
        echo 'caught exception: ', $e->getMessage();
    }
}
?>
