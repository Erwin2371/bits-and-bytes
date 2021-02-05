<?php
include('security.php');
include('includes/scripts.php'); 
include('includes/functions.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT CATEGORY </h6>
  </div>
  <div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","b&b","3308");
if(isset($_POST['edit_category']))
{
    $id = $_POST['edit_cid'];
    
    $query = "SELECT * FROM category WHERE CategoryID='$id' ";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
    {
        ?>

          <form action="code.php" method="POST">
                
              <input type="hidden" name="edit_CatID" value="<?php echo $row['CategoryID'] ?>" >
              
              <div class="form-group">
                  <label> Category Type </label>
                  <input type="text" name="edit_cattype" value="<?php echo $row['CategoryType'] ?>" class="form-control" placeholder="Enter Username">
              </div>

              <a href="category.php" class="btn btn-danger" > CANCEL  </a>
              <button type="submit" name="updatecatbtn" class="btn btn-primary"> Update </button>

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