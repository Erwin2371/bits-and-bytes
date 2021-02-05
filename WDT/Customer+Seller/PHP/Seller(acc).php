<?php
    include("../PHP/conn.php");
    include("../PHP/Seller(session).php");
    
   if (!isset($_POST["Address"]))
   {
       echo '<script>alert("Please fill in all the fields below"); window.location.href="../HTML/Seller(Account).php";</script>';
    }
   else 
   {
       $Uname = mysqli_real_escape_string($con, $_POST["Username"]);  
       $SellerType = $_POST["SellerType"];
       $ShopName = mysqli_real_escape_string($con, $_POST['ShopName']);
       $Email = mysqli_real_escape_string($con, $_POST["Email"]);
       $Address = mysqli_real_escape_string($con, $_POST["Address"]);
       $ContactNumber = mysqli_real_escape_string($con, $_POST["ContactNumber"]);
       $Password = mysqli_real_escape_string($con, $_POST["Password"]);
       
       $sql = "UPDATE seller set Username = ?, SellerType = ?, Email = ?, ShopName = ?, Address = ?, ContactNumber = ?, Password = ? where SellerID = ?";
       $result = mysqli_prepare($con, $sql);

       //bind variables to ? 
       mysqli_stmt_bind_param($result, 'sssssssi', $Username, $SellerType, $Email, $ShopName, $Address, $ContactNumber, $Password, $SellerID);

       //execute statement
       
       if(mysqli_stmt_execute($result))
       {
        echo '<script>alert("Changes Saved Successfully"); window.location.href="../HTML/Seller(Account).php"</script>'; 
       }
       else 
       {
        echo '<script>alert("Changes Not Saved.\nError: \''.mysqli_error($con).'\'"); window.location.href="../HTML/Seller(Account).php"</script>';
       }
       mysqli_stmt_close($result);
       mysqli_close($con);
   }

?>