<?php
// Create database connection
include("../PHP/conn.php");
include("../PHP/Seller(session).php");
$e = $_FILES['PPhoto']['name'];
$f = $_FILES['PPhoto2']['name'];

  if (isset($_POST['Add'])) {

    $Name = mysqli_real_escape_string($con, $_POST["PName"]);
    $Category = $_POST["PCategory"];
    $Price = $_POST["PPrice"];
    $Quantity = $_POST["PQuantity"];
    $Photo = $_FILES['PPhoto']['name'];
    $Photo2 = $_FILES['PPhoto2']['name'];
    $Description = $_POST["content"];

    //file location to be stored
    $target = "../Product-Images/".basename($Photo);
    $target2 = "../Product-Images/".basename($Photo2);
    
    //lower the letter case of file name
    $filetype = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    $filetype2 = strtolower(pathinfo($target2, PATHINFO_EXTENSION));
    
    //for validation
    $indicator = 0;
    $indicator2 = 0;
    
    //types of files accepted
    if($filetype != "jpeg" && $filetype != "jpg" && $filetype != "png" && $filetype2 != "jpeg" && $filetype2 != "jpg" && $filetype2 != "png" )
    {
      echo '<script>alert("File type not supported!"); window.history.back();</script>';
      $indicator = 0;
    }
    else
    {
      $indicator = 1;
    }
    
    //same type of file
    if($e !== $f)
    {
      $indicator2 = 1;
    }
    else
    {
      $indicator2 = 0;
      echo '<script>alert("Same image file was used!"); window.history.back();</script>';
    }
    if($indicator == 1 && $indicator2== 1)
    {
      $sql = "INSERT INTO `product`(`SellerID`, `CategoryID`, `Name`,`Photo`, `Photo2`, `Description`, `Price`, `Quantity`, `Status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";
      $result = mysqli_prepare($con, $sql);
      // move the img to the target location
      if(move_uploaded_file($_FILES['PPhoto']['tmp_name'], $target) && move_uploaded_file($_FILES['PPhoto2']['tmp_name'], $target2))
      {
        //bind variable into ?
        mysqli_stmt_bind_param($result, 'ssssssii', $SellerID, $Category, $Name, $Photo, $Photo2, $Description, $Price, $Quantity);
      
        if (mysqli_stmt_execute($result)) 
        {
          echo  '<script>alert("Product Added"); window.location.href="../HTML/Seller(Add Product).php";</script>';
        }
        else
        {
          echo  '<script>alert("Product Not Added.\nError: \''.mysqli_error($con).'\'"); window.location.href="../HTML/Seller(Add Product).php";</script>';
        }
      }  
      else
      {
        echo '<script>alert("Image Not Uploaded");window.location.href="../HTML/Seller(Add Product).php";</script>';
      } 
      mysqli_stmt_close($result);
    }
  }
  mysqli_close($con);
?>