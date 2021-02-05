<?php
include('security.php'); 

include('includes/header.php'); 
include('includes/navbar.php'); 

$sql="select * from orders order by OrderID asc";
$res=mysqli_query($connection,$sql);
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Customer Orders </h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> # </th>
            <th> OrderID </th>
            <th> CustomerID </th>
            <th> ProductID </th>
            <th> Order Date </th>
            <th> Quantity </th>
            <th> Delivery Status </th>
            <th> Order Status </th>
          </tr>
        </thead>
        <tbody>
     
        <?php 
        if(mysqli_num_rows($res) > 0)
        {
          $i='Ord';
              while($row=mysqli_fetch_assoc($res))
              {
                ?>
			<tr>
                 <td class="serial"><?php echo $i?></td>
                 <td><?php echo $row['OrderID']?></td>
				 <td><?php echo $row['CustomerID']?></td>
                 <td><?php echo $row['ProductID']?></td>
                 <td><?php echo $row['OrderDate']?></td>
				 <td><?php echo $row['Quantity']?></td>
				 <td><?php echo $row['DeliveryStatus']?></td>
                 <td><?php echo $row['OrderStatus']?></td>
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