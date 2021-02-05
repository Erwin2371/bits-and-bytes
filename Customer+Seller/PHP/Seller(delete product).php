<?php
include("../PHP/conn.php");
if(isset($_POST["id"]))
{
 $ProductID = $_POST["id"]; 
 $query = "DELETE FROM product WHERE ProductID = ?";

 //prepare statement
 $result = mysqli_prepare($con, $query);

 //bind parameter to variable
 mysqli_stmt_bind_param($result, 'i', $ProductID );

 //execute statement
 if(mysqli_stmt_execute($result))
 {
  echo 'Product Deleted';
 }
 else
 {
  echo 'Product Not Deleted';
 }

}
mysqli_stmt_close($result);
mysqli_close($con);
?>