<?php
    include("../PHP/conn.php");

    if(!isset($_POST['Username']))
    {
        echo  '<script>alert("Please Fill All The Fields!"); window.location.href="../HTML/Customer(Login - Sign Up).php";</script>';
    }
    else
    {
        $Username = mysqli_real_escape_string($con,$_POST['Username']);
        $Gender = $_POST['Gender'];
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $DOB = $_POST['DOB'];
        $Address = mysqli_real_escape_string($con, $_POST['Address']);
        $ContactNumber = mysqli_real_escape_string($con, $_POST['ContactNumber']);
        $Password = mysqli_real_escape_string($con, $_POST['Password']);

        $sql = "INSERT INTO `customer`(`Username`, `Gender`, `Email`, `DOB`, `Address`, `ContactNumber`, `Password`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = "SELECT `Username` FROM `customer` WHERE `Username` = '$Username'";
        $result2 = mysqli_query($con, $query);
        $result = mysqli_prepare($con, $sql);

        //bind variable to ?
        mysqli_stmt_bind_param($result, 'sssssss', $Username, $Gender, $Email, $DOB, $Address, $ContactNumber, $Password);

        //execute query
        if(mysqli_num_rows($result2) == 0)
        {
            if(mysqli_stmt_execute($result))
            {
                echo  '<script>alert("Registration Successfull"); window.location.href="../HTML/Customer(Login - Sign Up).php";</script>';
            }
            else
            {
            echo  '<script>alert("Registration Failed.\nError: \''.mysqli_error($con).'\'"); window.location.href="../HTML/Customer(Login - Sign Up).php";</script>';
            }
        }
        else
        {
            echo  '<script>alert("Username Already Exist"); window.location.href="../HTML/Customer(Login - Sign Up).php";</script>';
        }
        
        mysqli_stmt_close($result);
    }
    mysqli_close($con);
?>