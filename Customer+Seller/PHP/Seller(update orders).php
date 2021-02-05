<?php
include("../PHP/conn.php");
include("../PHP/Seller(session).php");


if(isset($_POST["id"]))
{
    $id = $_POST['id'];
    $value = $_POST["value"];

 $sql = "UPDATE orders SET `DeliveryStatus`= ? WHERE OrderID = ?";
$result = mysqli_prepare($con, $sql);

//bind vairable to ?
mysqli_stmt_bind_param($result, 'si', $value, $id);

//execute query
 if(mysqli_stmt_execute($result))
 {
  echo 'Order Updated';
 }
 else
 {
  echo 'Order Not Updated';
 }
 mysqli_stmt_close($result);
}
mysqli_close($con);
?>
