<?php
include('security.php');
include('includes/functions.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

$sql="select * from admin order by AdminID asc";
$res=mysqli_query($connection,$sql);
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color:red;"></small>
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contact" class="form-control" placeholder="Enter Contact Number">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="secure_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please Enter the Email and Password of the Selected Admin To Delete!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="check_email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color:red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="check_password" class="form-control" placeholder="Enter Password">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="delete" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> # </th>
            <th> AdminID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Contact Number </th>
            <th style="text-align:center;">Delete </th>
          </tr>
        </thead>
        <tbody>
     
        <?php 
        if(mysqli_num_rows($res) > 0)
        {
          $i='AD';
              while($row=mysqli_fetch_assoc($res))
              {
                ?>
							<tr>
                 <td class="serial"><?php echo $i?></td>
                 <td><?php echo $row['AdminID']?></td>
							   <td><?php echo $row['Name']?></td>
                 <td><?php echo $row['Email']?></td>
							   <td><?php echo $row['ContactNumber']?></td>
                 <td>
                    <input type="hidden" name="delete_id" value="<?php echo $row['AdminID']?>">
                    <button type="submit" name="delete" class="btn btn-danger" data-toggle="modal" data-target="#secure_delete">Delete</button>
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