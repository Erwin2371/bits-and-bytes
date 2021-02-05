<?php
//fetch.php
include("../PHP/conn.php");
include("../PHP/Seller(session).php");
$columns = array('ProductID', 'Name', 'Description', 'Price', 'Quantity', 'Status');

$query = "SELECT p.ProductID, p.Name, p.Description, p.Price, p.Quantity, p.Status FROM product p INNER JOIN seller s on p.SellerID = s.SellerID WHERE s.Username = ?";


if(isset($_POST["search"]["value"]))
{
 $query .= '
 AND (Name LIKE "%'.mysqli_real_escape_string($con, $_POST["search"]["value"]).'%" 
 OR Price Between 0 AND "'.mysqli_real_escape_string($con, $_POST["search"]["value"]).'" 
 )';
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
    $start = $_POST['start'];
    $length = $_POST['length'];
    $query1 = 'LIMIT ?, ?';
}

$result = mysqli_prepare($con, $query); 
//bind variable to ?
mysqli_stmt_bind_param($result, 's', $Username);

//execute statement
mysqli_stmt_execute($result);

//store result
mysqli_stmt_store_result($result);

//bind result to variables
mysqli_stmt_bind_result($result, $ProductID, $Name, $Description, $Price, $Quantity, $Status);


$number_filter_row = mysqli_stmt_num_rows($result);

$result1 = mysqli_prepare($con, $query . $query1);

//bind variable to ?
mysqli_stmt_bind_param($result1, 'sss',$Username, $start, $length);

//execute query
mysqli_stmt_execute($result1);

//store result
mysqli_stmt_store_result($result1);

//bind result to variables
mysqli_stmt_bind_result($result1, $ProductID, $Name, $Description, $Price, $Quantity, $Status);

$data = array();

while(mysqli_stmt_fetch($result1))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" hidden data-id="'.$ProductID.'" data-column="ProductID">' . $ProductID . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$ProductID.'" data-column="Name">' . $Name . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$ProductID.'" data-column="Description">' . $Description . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$ProductID.'" data-column="Price">' . $Price . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$ProductID.'" data-column="Quantity">' . $Quantity . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$ProductID.'" data-column="Status">' . $Status . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$ProductID.'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($con)
{
 $query = "SELECT * FROM product";
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
