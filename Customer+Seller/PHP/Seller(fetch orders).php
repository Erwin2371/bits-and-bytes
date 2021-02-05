<?php
//fetch.php
include("../PHP/conn.php");
include("../PHP/Seller(session).php");
$columns = array('ProductID', 'Name', 'OrderDate', 'Quantity', 'DeliveryStatus', 'OrderStatus');

$query = "SELECT o.OrderID, c.Username, p.ProductID, p.Name, o.OrderDate, o.Quantity, o.DeliveryStatus, o.OrderStatus FROM orders o JOIN customer c ON o.CustomerID = c.CustomerID JOIN product p ON p.ProductID = o.ProductID JOIN seller s ON s.SellerID = p.SellerID WHERE s.Username = ? AND o.OrderStatus = 'Paid'";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 AND (o.DeliveryStatus LIKE "'.$_POST["search"]["value"].'%" 
 OR c.Username LIKE "%'.$_POST["search"]["value"].'%" OR p.Name LIKE "'.$_POST["search"]["value"].'%") 
 ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY p.ProductID ASC ';

}

$query1 = '';

if($_POST["length"] != -1)
{ 
 $query1 = 'LIMIT '.$_POST['start'].', '.$_POST['length'].'';
}
$result = mysqli_prepare($con, $query);

mysqli_stmt_bind_param($result, 's', $Username);

//execute statement
mysqli_stmt_execute($result);

//store result 
mysqli_stmt_store_result($result);

//bind result to variables
mysqli_stmt_bind_result($result, $OrderID, $CusUsername, $ProductID, $ProductName, $OrderDate, $Quantity, $DeliveryStatus, $OrderStatus);

$number_filter_row = mysqli_stmt_num_rows($result);

$result1 = mysqli_prepare($con, $query . $query1);

//bind variable into ?
mysqli_stmt_bind_param($result1, 's', $Username);

//execute query
mysqli_stmt_execute($result1);

//store result
mysqli_stmt_store_result($result1);

//bind result to variables
mysqli_stmt_bind_result($result1, $OrderID, $CusUsername, $ProductID, $ProductName, $OrderDate, $Quantity, $DeliveryStatus, $OrderStatus);

$data = array();

while(mysqli_stmt_fetch($result1))
{

 $sub_array = array();
 $sub_array[] = '<div class="update" hidden data-id="'.$ProductID.'" data-column="OrderID">' . $OrderID . '</div>';

 $sub_array[] = '<div  class="update" data-id="'.$ProductID.'" data-column="ProductName">' . $ProductName . '</div>';

 $sub_array[] = '<div  class="update" data-id="'.$ProductID.'" data-column="Username">' . $CusUsername . '</div>';

 $sub_array[] = '<div  class="update" data-id="'.$ProductID.'" data-column="Quantity">' .  $Quantity . '</div>';

 $sub_array[] = '<div  class="update" data-id="'.$ProductID.'" data-column="OrderID">' . $OrderDate . '</div>';

 if($DeliveryStatus == "Delivered")
 {
     $sub_array[] = '<button type="button" name="update" class="btn btn-success btn-xs update1" data-column="DeliveryStatus" data-id="'.$OrderID.'">Delivered</button>';
 }
 else
 {
    $sub_array[] = '<button type="button" name="update" class="btn btn-warning btn-xs update1" data-column="DeliveryStatus" data-id="'.$OrderID.'">Not Delivered</button>';
 }

 $sub_array[] = '<div  class="update" data-id="'.$ProductID.'" data-column="OrderStatus">' . $OrderStatus . '</div>';

 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$OrderID.'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($con)
{
 $query = "SELECT * FROM orders";
 $result2 = mysqli_query($con, $query);
 return mysqli_num_rows($result2);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($con),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);
mysqli_stmt_free_result($result);
mysqli_stmt_free_result($result1);
mysqli_stmt_close($result);
mysqli_stmt_close($result1);
mysqli_close($con);
?>
