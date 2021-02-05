<?php
include('security.php'); 

include('includes/header.php'); 
include('includes/navbar.php'); 

$sql="select * from category order by CategoryID asc";
$res=mysqli_query($connection,$sql);
?>

<div class="modal fade" id="addnewproductcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Category Type </label>
                <input type="text" name="CategoryType" class="form-control" placeholder="Enter Category Type">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addcatbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Product Categories 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnewproductcategory">
              Add New Product Category 
            </button>
    </h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> # </th>
            <th> CategoryID </th>
            <th> Category Type </th>
            <th style="text-align:center;"> Edit </th>
            <th style="text-align:center;"> Delete </th>
          </tr>
        </thead>
        <tbody>
     
        <?php 
        if(mysqli_num_rows($res) > 0)
        {
          $i='CAT';
              while($row=mysqli_fetch_assoc($res))
              {
                ?>
			<tr>
                 <td class="serial"><?php echo $i?></td>
                 <td><?php echo $row['CategoryID']?></td>
				 <td><?php echo $row['CategoryType']?></td>
				 <td>
                 <form action="category_edit.php" method="post">
                  <input type="hidden" name="edit_cid" value="<?php echo $row['CategoryID'] ?>">
                  <button type="submit" name="edit_category" class="btn btn-info">Edit</button>
                </form>
                </td>
                <td>  
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_cid" value="<?php echo $row['CategoryID'] ?>">
                  <button type="submit" name="delete_category" class="btn btn-danger">Delete</button>
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