<?php
    include("../PHP/conn.php");
    include("../PHP/Customer(session).php");
    
    if(isset($_POST["checkout"]))
    {
        if(isset($_SESSION['mycart']))
        {
            foreach($_SESSION['mycart'] as $key => $values)
            {
                $sql = "INSERT INTO `orders` (`CustomerID`, `ProductID`, `Quantity`, `OrderDate`, `DeliveryStatus`, `OrderStatus`) VALUES (?, ?, ?, '".date('Y-m-d')."', 'Not Delivered', 'Paid')";
                $result = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($result, 'sss', $CusID, $values['ProductID'], $values['Quantity']);
                
                if(mysqli_stmt_execute($result))
                {
                    $i = 1;
                }
                else
                {
                    $i = 0;
                    $e = 'Error:' . mysqli_error($con);
                }
            }
            if($i == 1)
            {
                unset($_SESSION['mycart']);
                echo '<script>alert("Your Order is Now Being Processed"); window.location.href="../HTML/Customer(Home).php"</script>';
            }
            else 
            {
                echo '<script>alert("There\'s a Problem With Your Order"); windwo.location.href="../Cart.php"</script>';
                echo $e;
            }
        }
        else
        {
            echo '<script>alert("Your Cart is Empty, Add Some Products to Checkout"); window.location.href="../HTML/Customer(Home).php"</script>';
        }
    }
    else
    {
        echo '<script> window.location.href="../HTML/Customer(Login - Sign Up).php"</script>';
    }

?>