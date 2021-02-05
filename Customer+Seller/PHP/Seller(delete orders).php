<?php
include("../PHP/conn.php");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM orders WHERE OrderID = '".$_POST["id"]."'";
 if(mysqli_query($con, $query))
 {
  echo 'Order Deleted';
 }
 else
 {
     echo 'Order Not Deleted';
 }
}
?>