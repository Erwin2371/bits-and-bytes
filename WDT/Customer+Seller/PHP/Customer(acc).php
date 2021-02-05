<?php 
    include("../PHP/conn.php");
    include("../PHP/Customer(session).php");

    if(!isset($_POST['Username']))
    {
        echo  '<script>alert("Please Fill All The Fields!"); window.location.href="../HTML/Customer(Account).php";</script>';
    }
    else
    {
        $FirstName = mysqli_real_escape_string($con, $_POST['FirstName']);
        $LastName = mysqli_real_escape_string($con, $_POST['LastName']);
        $Username = mysqli_real_escape_string($con, $_POST['Username']);
        $Email = mysqli_real_escape_string($con, $_POST['Email']);
        $Address = mysqli_real_escape_string($con, $_POST['Address']);
        $ContactNumber = mysqli_real_escape_string($con, $_POST['ContactNumber']);
        $Password = mysqli_real_escape_string($con, $_POST['Password']);

        $sql = "UPDATE `customer` SET `FirstName`= ?, `LastName`= ?, `Username`= ?, `Email`= ?,`Address`= ?, `ContactNumber`= ?, `Password`= ? WHERE `CustomerID`= ?";
        
        $result = mysqli_prepare($con, $sql);
        
        mysqli_stmt_bind_param($result, 'ssssssss', $FirstName, $LastName, $Username, $Email, $Address, $ContactNumber, $Password, $CusID);
        
        if(mysqli_stmt_execute($result))
        {
            echo  '<script>alert("Credentials Updated"); window.location.href="../HTML/Customer(Account).php";</script>';
        }
        else
        {
            echo  '<script>alert("Credentials Not Updated.\nError: \''.mysqli_error($con).'\'"); window.location.href="../HTML/Customer(Account).php";</script>';
        }

    }
    mysqli_stmt_close($result);
    mysqli_close($con);
?>