<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seller Sign Up Form</title>
    <link rel="stylesheet" href="../CSS/Seller(Sign Up).css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <link rel="stylesheet" href="../CSS/aos.css">
    <script src="../JS/function.js"></script>
  </head>
  
  <body>
  <div class="logo1">
    <img src="../img/B&B Logo.png" width='175px' height='50px' alt="">
  </div>
    <div class="container">
      <span data-aos="fade-up-right" class="big-circle"></span>
      <span data-aos="fade-up-left" class="big-circle circle2"></span>

      <div class="form">
        <div class="Left">
        <div class="input-container">
			 
		<h3 class="title">Sell with us now !</h3>
  		<form action="../PHP/Seller(sign up).php" method="post" autocomplete="off"> 
      <div class="input-container">
        <input type="text" name="ShopName" required class="input" />
        <label for="ShopName">Shop Name</label>
        <span>Shop Name</span>
      </div>
			<div class="input-container">
        <input type="text" name="Username" required class="input" />
        <label for="Username">Username</label>
        <span>Username</span>
      </div>
			<h4 class="text">Business Type </h4>			
			<input class="radiobtn" required type="radio" name="SellerType" value="Individual"> Individual
			<input class="radiobtn" type="radio" name="SellerType" value="Corporate"> Corporate			
        <div class="input-container textarea">
          <textarea name="Address" required class="input"></textarea>
          <label for="Address">Address</label>
          <span>Address</span>
        </div>
        </div>	
    </div>

        <div class="Right">
          <span data-aos="zoom-in-left" class="circle one"></span>
          <span data-aos="zoom-in-down" class="circle two"></span>
          <div class="dumb-container">
            <div class="input-container">
              <input type="email" name="Email" required class="input" />
              <label for="Email">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="text" name="Password" minlength="8" required class="input" />
              <label for="Password">Password</label>
              <span>Password</span>
            </div>
            <div class="input-container">
              <input type="tel" name="ContactNumber" minlength="11" maxlength="12" required class="input" />
              <label for="ContactNumber">Phone No.</label>
              <span>Phone No.</span>
            </div>
            <input type="submit" name="Sign-Up" value="Sign Up" class="btn" />
          </div>
          <div class="buttons">
          <input type="button" onclick="sellerlogin()" value="Back to Login" class="btn btn1" />
          </div>
          </form>
        </div>
      </div>
    </div>

    <script src="../JS/app1.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
          offset: 200,
          duration: 2500,
      });
    </script>
  </body>
</html>
