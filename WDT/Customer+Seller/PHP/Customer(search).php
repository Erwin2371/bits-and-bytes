<?php
    include("../PHP/conn.php");

    if(isset($_POST['query']))
    {
        $searchtxt = '%'.mysqli_real_escape_string($con, $_POST['query']).'%';
        $result = mysqli_prepare($con, "SELECT `Name`, `ProductID` FROM `product` WHERE Name LIKE ? AND `Status` = 'Approve'");

        //bind value to ?
        mysqli_stmt_bind_param($result, 's', $searchtxt);

        //execute query
        mysqli_stmt_execute($result);

        //store result
        mysqli_stmt_store_result($result);

        //bind result to variable
        mysqli_stmt_bind_result($result, $search, $ProductID);

        //return value if more than one result
        if(mysqli_stmt_num_rows($result) > 0)
        {
            //loop to echo each result
            while(mysqli_stmt_fetch($result))
            {
                echo '<a href="../product.php?ProductID='.$ProductID.'&ProductName='.$search.'">'.$search.'</a>';
            }
        }
        else
        {
            echo '<p>No products found</p>';
        }
        mysqli_stmt_close($result);
    }
    mysqli_close($con);
?>