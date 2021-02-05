<?php
include('security.php');
include('includes/functions.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
  </div>
  <div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","b&b","3308");
if(isset($_POST['edit']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM admin WHERE AdminID='$id' ";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
    {
        ?>

          <form action="code.php" method="POST">
                
              <input type="hidden" name="edit_AdminID" value="<?php echo $row['AdminID'] ?>" >
              
              <div class="form-group">
                  <label> Username </label>
                  <input type="text" name="edit_username" value="<?php echo $row['Name'] ?>" class="form-control" placeholder="Enter Username">
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="edit_email" value="<?php echo $row['Email'] ?>" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group">
                  <label> Contact Number </label>
                  <input type="text" name="edit_contact" value="<?php echo $row['ContactNumber'] ?>" class="form-control" placeholder="Enter Username">
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="edit_password" value="<?php echo $row['Password'] ?>" class="form-control" placeholder="Enter Password">
              </div>

              <a href="register.php" class="btn btn-danger" > CANCEL  </a>
              <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

          </form>
    <?php
    }
}
?>
  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>