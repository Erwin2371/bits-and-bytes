<?php
    include("security.php");

    if(isset($_POST['query']))
    {
        $searchtxt = '%'.mysqli_real_escape_string($connection, $_POST['query']).'%';
        $result = mysqli_prepare($connection, "SELECT `Name` FROM `product` WHERE Name LIKE ? ");

        //bind value to ?
        mysqli_stmt_bind_param($result, 's', $searchtxt);

        //execute query
        mysqli_stmt_execute($result);

        //store result
        mysqli_stmt_store_result($result);

        //bind result to variable
        mysqli_stmt_bind_result($result, $search);

        //return value if more than one result
        if(mysqli_stmt_num_rows($result) > 0)
        {
            //loop to echo each result
            while(mysqli_stmt_fetch($result))
            {
                echo '<a href="product.php?ProductID=1">'.$search.'</a>';
            }
        }
        else
        {
            echo '<p>No products found</p>';
        }
        mysqli_stmt_close($result);
    }
    mysqli_close($connection);
?>