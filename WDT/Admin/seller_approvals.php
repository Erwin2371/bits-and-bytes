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
		$update_status_sql="update seller set Status='$status' where SellerID='$id'";
		mysqli_query($connection,$update_status_sql);
	}
}

$sql="select * from seller order by SellerID asc";
$res=mysqli_query($connection,$sql);
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Seller Approval </h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th> # </th>
            <th> Seller ID </th>
            <th> Username </th>
            <th> Seller Type </th>
            <th> Email </th>
            <th> Address </th>
            <th> Contact Number </th>
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
					<td><?php echo $row['SellerID']?></td>
				    <td><?php echo $row['Username']?></td>
					<td><?php echo $row['SellerType']?></td>
					<td><?php echo $row['Email']?></td>
					<td><?php echo $row['ContactNumber']?></td>
					<td><?php echo $row['Password']?></td>
					<td>
                    <?php
						if($row['Status']=='Approve'){
							echo "<span><a href='?type=Status&operation=decline&id=".$row['SellerID']."' class='btn btn-primary'>Approve</a></span>&nbsp;";
						}else{
							echo "<span><a href='?type=Status&operation=approve&id=".$row['SellerID']."'  class='btn btn-danger'>Decline</a></span>&nbsp;";
						}
								
					?>
                    </td>
                    <td>
                    <form action="code.php" method="post">
                    <input type="hidden" name="delete_sellerid" value="<?php echo $row['SellerID'] ?>">
                    <button type="submit" name="delete_seller" class="btn btn-danger">Delete</button>
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