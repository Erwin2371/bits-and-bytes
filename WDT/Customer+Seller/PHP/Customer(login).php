<?php

include("../PHP/conn.php");

if(isset($_POST["Login"]))
{
    $CusUsername=mysqli_real_escape_string($con, $_POST["CusUsername"]);
    $CusPassword=mysqli_real_escape_string($con, $_POST["CusPassword"]);

    $result = mysqli_prepare($con, "SELECT CustomerID FROM customer where BINARY `Username`=?  AND BINARY `Password`=? ");
    
    //bind data type and variables for ? 
    mysqli_stmt_bind_param($result, 'ss', $CusUsername, $CusPassword);
  
    //execute query
    mysqli_stmt_execute($result);

    //store result
    mysqli_stmt_store_result($result);

     // bind result to variable $CusID
    mysqli_stmt_bind_result($result, $CusID);
 
    //return true if number of row = 1
    if(mysqli_stmt_num_rows($result) == 1)
    {
        if(mysqli_stmt_fetch($result)) 
        {
            session_start();
            $_SESSION["CusUsername"]=$CusUsername;
            $_SESSION['CusID']=$CusID;
            echo '<script>alert("Welcome '.$CusUsername.'"); window.location.href="../HTML/Customer(Home).php";</script>';
        }   
    }
    else
    {
        echo '<script>alert("Wrong Username or Password. Please Try Again."); window.location.href="../HTML/Customer(Login - Sign Up).php";</script>';
    }
    mysqli_stmt_free_result($result);
    mysqli_stmt_close($result);
    mysqli_close($con);
}
?>