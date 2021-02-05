<?php

session_start();
include('includes/header.php');

?>
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <link href="css/custom.css" type="text/css" rel="stylesheet">
  <link href="css/login.css" type="text/css" rel="stylesheet">
  
</head>
<!-- Outer Row -->
<body>
  <div class="login-box">
  <h1>Hello Admin!</h1>
  <form class="user" action="code.php" method="POST">
  <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" name="email_login" placeholder="Enter Username or Email...">
  </div>
  <div class="textbox">
      <i class="fas fa-lock"></i>
      <input type="password" name="password_login" placeholder="Password">
  </div>
        <div class="form-group">
        <button type="submit" name="login_btn" class="btn btn-user btn-block">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
           Login 
        </button>
    </form>
  </div>
</div>
</body>

<?php
include('includes/scripts.php');
?>