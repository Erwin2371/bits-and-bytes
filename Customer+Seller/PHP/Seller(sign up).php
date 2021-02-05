<?php
    include("../PHP/conn.php");

    if(!isset($_POST['Sign Up']))
    {
        $ShopName = mysqli_real_escape_string($con, $_POST['ShopName']);
        $Username = mysqli_real_escape_string($con, $_POST['Username']);
        $SellerType = $_POST['SellerType'];
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $Address = mysqli_real_escape_string($con, $_POST['Address']);
        $ContactNumber = mysqli_real_escape_string($con, $_POST['ContactNumber']);
        $Password = mysqli_real_escape_string($con, $_POST['Password']);

        $sql = "INSERT INTO `seller`(`Username`, `SellerType`, `Email`, `Address`, `ContactNumber`, `Password`, `ShopName`, `Status`) VALUES (?, ?, ?, ?, ?, ?, ?, 'Decline')";
        $query = "SELECT Username From `seller` WHERE `Username` = '$Username'";

        $result2 = mysqli_query($con, $query);
        
        //prepare statement 
        $result = mysqli_prepare($con, $sql);

        //bind param
        mysqli_stmt_bind_param($result, 'sssssss', $Username, $SellerType, $Email, $Address, $ContactNumber, $Password, $ShopName);

        //execute statement
        if(mysqli_num_rows($result2) == 0)
        {
            if(mysqli_stmt_execute($result))
            {
                echo  '<script>alert("Registration Successful"); window.location.href="../HTML/Seller(Login).php";</script>';
            }
            else
            {
            echo  '<script>alert("Registration Failed.\nError: \''.mysqli_error($con).'\'"); window.location.href="../HTML/Seller(Sign Up).php";</script>';
            }
        }
        else
        {
            echo  '<script>alert("Username Already Exist"); window.location.href="../HTML/Seller(Sign Up).php";</script>';
        }
        mysqli_stmt_close($result);
    }
    mysqli_close($con);
?>