<?php
include("../PHP/conn.php");
include("../PHP/Seller(session).php");

if(isset($_POST["id"]))
{
    $Column = $_POST["column_name"];
    $id = $_POST["id"];

 $value = mysqli_real_escape_string($con, $_POST["value"]);
 $sql = "UPDATE product SET ".$Column."= ? WHERE ProductID = ?";
$result = mysqli_prepare($con, $sql);

//bind vairable to ?
mysqli_stmt_bind_param($result, 'si', $value, $id);

//execute query
 if(mysqli_stmt_execute($result))
 {
  echo 'Data Updated';
 }
 else
 {
  echo 'Data Not Updated';
 }
}
mysqli_stmt_close($result);
mysqli_close($con);
?>
