<?php
include('security.php'); 
include('includes/functions.php'); 

include('includes/header.php'); 
include('includes/navbar.php'); 

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($connection,$_GET['type']);
	if($type=='Status'){
		$operation=get_safe_value($connection,$_GET['operation']);
		$id=get_safe_value($connection,$_GET['id']);
		if($operation=='approve'){
			$status='Approve';
		}else{
			$status='Decline';
		}
		$update_status_sql="update product set Status='$status' where ProductID='$id'";
		mysqli_query($connection,$update_status_sql);
	}
}

$sql="select * from product order by ProductID asc";
$res=mysqli_query($connection,$sql);
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Products Approval </h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th> # </th>
            <th> Product ID </th>
            <th> Category ID </th>
            <th> Name </th>
            <th> Price </th>
            <th> Qty </th>
            <th style="text-align:center;">Status </th>
            <th style="text-align:center;">Delete </th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($res) > 0) 
        {
			$i="SE";
            while($row=mysqli_fetch_assoc($res))
            {
                ?>
				<tr>
					<td class="serial"><?php echo $i?></td>
					<td><?php echo $row['ProductID'];?></td>
					<td><?php echo $row['CategoryID'];?></td>
					<td><?php echo $row['Name'];?></td>
          <td><?php echo $row['Price'];?></td>
          <td><?php echo $row['Quantity'];?></td>
					<td>
            <?php
						  if($row['Status']=='Approve'){
							echo "<span><a href='?type=Status&operation=decline&id=".$row['ProductID']."' class='btn btn-primary'>Approve</i></a></span>&nbsp;";
						  }else{
							echo "<span><a href='?type=Status&operation=approve&id=".$row['ProductID']."' class='btn btn-danger'>Decline</a></span>&nbsp;";
						  }
								
					  ?>
          </td>
            <td>
              <form action="code.php" method="post">
              <input type="hidden" name="delete_productid" value="<?php echo $row['ProductID'] ?>">
              <button type="submit" name="delete_product" class="btn btn-danger">Delete</button>
              </form> 
            </td> 
				</tr>
                <?php 
                }
        }
            else{
                echo "No Record Found";
            } 
                ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>