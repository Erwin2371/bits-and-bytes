<?php
  include("../PHP/conn.php");
  include("../PHP/Seller(session).php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Seller(Account).css">
    <script src="../JS/function.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Seller Account</title>
</head>
<body>
    <?php
        include_once("../PHP/function.php");
        echo $format;
    ?>

<?php
    $sql = "SELECT `SellerType`, `Email`, `Address`, `ContactNumber`, `Password`, `ShopName` FROM seller WHERE Username = ?";
    $result = mysqli_prepare($con, $sql);
    
    //bind variables to ?
    mysqli_stmt_bind_param($result, 's', $Username);

    //execute query
    mysqli_stmt_execute($result);

    //store result
    mysqli_stmt_store_result($result);

    //bind result to variables 
    mysqli_stmt_bind_result($result, $SellerType, $Email, $Address, $ContactNumber, $Password, $ShopName);

    //return true if only one row
    if(mysqli_stmt_num_rows($result) == 1)
    {
      while(mysqli_stmt_fetch($result));
      {
    ?>
    <div class="heading">
        <h1>Account Details</h1>
    </div>
    <div class="container">

<form action="../PHP/Seller(acc).php" method="POST" class="acc-form">
  <div class="field">
      <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" autocomplete="off" placeholder="Enter Your Username" class="Username" required name="Username" value="<?php echo $Username?>">
        <span>Username:</span>
      </div>
      <div class="input-field">
        <i class="fas fa-store"></i>
        <input type="text" placeholder="Enter Your Desired Shop Name" autocomplete="off" required name="ShopName" value="<?php echo $ShopName?>">
        <span>Shop Name:</span>
      </div>
  </div>
  <div class="field">
      <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Enter Your Email" autocomplete="off" required name="Email" value="<?php echo $Email?>">
        <span>Email:</span>
      </div>
      <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="text" placeholder="Enter a Password" autocomplete="off" minlength="8" required name="Password" value="<?php echo $Password?>">
        <span>Password:</span>
    </div>
  </div>
  <div class="field">
      <div class="input-field">
        <i class="fas fa-briefcase"></i>
        <select class="form-control" name="SellerType" required id="SellerType">
          <option value="<?php echo $SellerType ?>"><?php echo $SellerType ?></option>
          <?php 
            if($SellerType == "Individual")
            {
              echo '<option value="Corporation">Corporation</option>';
            }
            else
            {
              echo '<option value="Individual">Individual</option>';
            }
          ?>
        </select>
        <span>Business Type:</span>
      </div>
      <div class="input-field">
        <i class="fas fa-phone"></i>
        <input type="tel" placeholder="Contact" autocomplete="off" minlength="11" maxlength="12" required name="ContactNumber" value="<?php echo $ContactNumber ?>">
        <span>Contact Number:</span>
    </div>
  </div>
  <div class="input-field one">
      <i class="fas fa-map-marker"></i>
      <input type="text" placeholder="Enter Your Current Address" autocomplete="off" required name="Address" value="<?php echo $Address ?>">
      <span>Address:</span>
    </div>  
    <button class="Save" name="Save">Save Changes</button>           
</form>
</div>

<?php
    }
  }
?>
<script>
  $('.button').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
  });
  $('.pro-btn').click(function(){
    $('nav ul .pro-show').toggleClass("show");
    $('nav ul .first').toggleClass("rotate");
  });
  $('.ord-btn').click(function(){
    $('nav ul .ord-show').toggleClass("show1");
    $('nav ul .second').toggleClass("rotate");
  });
  $('nav ul li').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });
  </script>
</body>
</html>