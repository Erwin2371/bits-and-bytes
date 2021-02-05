<?php
include('security.php');

if(isset($_POST['check_submit_btn'])){
  $email = $_POST['email_id'];

  $email_query = "SELECT * FROM admin WHERE Email='$email' ";
  $email_query_run = mysqli_query($connection, $email_query);
  if(mysqli_num_rows($email_query_run) > 0)
  {
      echo "Email Already Taken. Please Try Another one.";
  }
  else
  {
     echo "Email Available.";
}
}

if(isset($_POST['registerbtn']))
{
    $name = $_POST['username'];
    $email = $_POST['email'];
    $connum = $_POST['contact'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM admin WHERE Email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one";
        $_SESSION['status_code'] = "info";
        header('Location: register.php');
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO admin (Name,Email,ContactNumber,Password) VALUES ('$name','$email','$connum','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');  
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
                $_SESSION['status'] = "Password and Confirm Password Does Not Match";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
        }
    }

}

if(isset($_POST['delete']))
{
  $check_password = $_POST['check_password'];
  $check_email = $_POST['check_email'];
  $check = "SELECT * FROM admin WHERE Email = '$check_email' AND Password = '$check_password'"; 
  $check_run = mysqli_query($connection,$check);
  if(mysqli_num_rows($check_run) > 0){

    $id = $_POST['delete_id'];
    $delete_sql = "delete from admin where Email='$check_email' AND Password='$check_password'";
    $query_run = mysqli_query($connection,$delete_sql);

    if($query_run)
    {
      $_SESSION['status'] = "Data Deleted";
      $_SESSION['status_code'] = "success";
      header('Location: register.php'); 
    }
    else
    {
      $_SESSION['status'] = "Email or Password entered is incorrect...!";
      $_SESSION['status_code'] = "error";
      header('Location: register.php'); 
    }
    }
  else{
       $_SESSION['status'] = "Admin Profile Not Deleted";
       $_SESSION['status_code'] = "error";
       header('Location: register.php');  
  }
      
  
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_AdminID'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $contact = $_POST['edit_contact'];
    $password = $_POST['edit_password'];

    $query = "UPDATE admin SET Email = '$email', ContactNumber = '$contact', Password = '$password' WHERE Name = '$email_login' OR Email = '$email_login'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data Has Been Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');  
    }
    else
    {
        $_SESSION['status'] = "Your Data Has Not Been Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
}

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email_login'];
    $password_login = $_POST['password_login'];

    $query = "SELECT * FROM admin WHERE Name = '$email_login' OR Email='$email_login' AND Password = '$password_login'";
    $query_run = mysqli_query($connection,$query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        $_SESSION['status'] = "Login successful! Welcome $email_login!";
        $_SESSION['status_code'] = "success";
        header('Location: welcome.php');
    }
    else
    {
        $_SESSION['status'] = "Email or Password is invalid";
        $_SESSION['status_code'] = "error";
        header('Location: login.php');
    }
} 

if(isset($_POST['delete_seller']))
{
  $id = $_POST['delete_sellerid'];
  $delete_sql = "delete from seller where SellerID ='$id'";
  $query_run = mysqli_query($connection,$delete_sql);

  if($query_run)
  { 
    $_SESSION['status'] = "Data Deleted";
    $_SESSION['status_code'] = "success";
    header('Location: seller_approvals.php'); 
  }
  else
  {
    $_SESSION['status'] = "Data Not Deleted";
    $_SESSION['status_code'] = "error";
    header('Location: seller_approvals.php'); 
  }

}

if(isset($_POST['delete_product']))
{
  $id = $_POST['delete_productid'];
  $delete_sql = "delete from product where ProductID ='$id'";
  $query_run = mysqli_query($connection,$delete_sql);

  if($query_run)
  {
     $_SESSION['status'] = "Data Deleted";
     $_SESSION['status_code'] = "success";
     header('Location: product_approvals.php');  
  }
  else
  {
    $_SESSION['status'] = "Data Not Deleted";
    $_SESSION['status_code'] = "error";
    header('Location: product_approvals.php'); 
  }

}

if(isset($_POST['addcatbtn']))
{
    $cattype = $_POST['CategoryType'];

    $query = "INSERT INTO category (CategoryType) VALUES ('$cattype')";
    $query_run = mysqli_query($connection, $query);
            
  if($query_run)
  {
    $_SESSION['status'] = "New Product Category Added";
    $_SESSION['status_code'] = "success";
    header('Location: category.php'); 
  }
  else 
  {
    $_SESSION['status'] = "Product Category Not Added";
    $_SESSION['status_code'] = "error";
    header('Location: category.php'); 
  }
        
} 

if(isset($_POST['delete_category']))
{
  $id = $_POST['delete_cid'];
  $delete_sql = "delete from category where CategoryID ='$id'";
  $query_run = mysqli_query($connection,$delete_sql);

  if($query_run)
  {
    $_SESSION['status'] = "Category Deleted";
    $_SESSION['status_code'] = "success";
    header('Location: category.php');
  }
  else
  {
    $_SESSION['status'] = "Category Not Deleted";
    $_SESSION['status_code'] = "error";
    header('Location: category.php'); 
  }

}

if(isset($_POST['updatecatbtn']))
{
    $id = $_POST['edit_CatID'];
    $cattype = $_POST['edit_cattype'];

    $query = "UPDATE category SET CategoryType = '$cattype' WHERE CategoryID = '$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
      $_SESSION['status'] = "Your data has been updated";
      $_SESSION['status_code'] = "success";
      header('Location: category.php');
    }
    else
    {
      $_SESSION['status'] = "Your data has not been updated";
      $_SESSION['status_code'] = "error";
      header('Location: category.php'); 
    }
}

if(isset($_POST['forgot_btn'])){
  $email = $_POST['email_forgot'];

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Email address is invalid";
  }
  if(empty($email)){
    $errors['email_forgot'] = "Email required";
  }

  if(count($errors) == 0){
    $sql = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
    $result = mysqli_query($connection,$$sql);
    $user = mysqli_fetch_assoc($result);
    $token = $user['token'];
    sendPasswordResetLink($email, $token);
    header('location: password_message.php');
    exit(0);
  }
}

?>