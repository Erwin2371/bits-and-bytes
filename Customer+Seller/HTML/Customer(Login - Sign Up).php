<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
    ></script>
    <link rel="stylesheet" href="../CSS/Customer(Login - Sign Up).css" />
    <title>Login & Sign up Form</title>
  </head>
  <body>

	<div class="container">
		<div class="forms-container">
		<div class="signin-signup">
			<form action="../PHP/Customer(login).php" method="POST" class="sign-in-form">
			
			<h2 class="title">Sign in</h2>
			<div class="input-field">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Username" name="CusUsername" autocomplete="off">
			</div>
			<div class="input-field">
				<i class="fas fa-lock"></i>
				<input type="password" placeholder="Password" name="CusPassword">
			</div>
			<input type="submit" value="Login" class="btn solid" name="Login">
			
			</form>
			  
			<form action="../PHP/Customer(sign up).php" method="POST" class="sign-up-form">
			<h2 class="title">Sign up</h2>
			<div class="input-field">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Username" autocomplete="off" required name="Username">
			</div>
			<div class="input-field">
				<i class="fas fa-envelope"></i>
				<input type="email" placeholder="Email" autocomplete="off" required name="Email">
			</div>
			<div class="input-field">
				<i class="fas fa-lock"></i>
				<input type="text" placeholder="Password" autocomplete="off" minlength="8" required name="Password">
			</div>
			<div class="input-field">
				<i class="fas fa-map-marker"></i>
				<input type="text" placeholder="Address" autocomplete="off" required name="Address">
			</div>
			<div class="input-field">
				<i class="fas fa-phone"></i>
				<input type="tel" placeholder="Contact" autocomplete="off" minlength="11" maxlength="12" required name="ContactNumber">
			</div>
			<div class="input-field">
				<i class="fas fa-venus-mars"></i>
				<select class="form-control" name="Gender" required id="Gender">
					<option value="">Please Select a Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="input-field">
				<i class="fas fa-birthday-cake"></i>
				<input type="date" name="DOB" required id="DOB">
			</div>
			<input type="submit" class="btn" value="Sign up" name="Sign-Up">

			</form>
		</div>
		</div>
		  
		  <div class="panels-container">
			<div class="panel left-panel">					
			  <div class="content"> 
			  <img src="../img/B&B Logo.png" class="logo" alt="">		
				<h3>New here ?</h3>
				<p>
				  Create your own Bits & Bytes account now!
				</p>
				<button class="btn transparent" id="sign-up-btn">
				  Sign up
				</button>
			  </div>
			  <img src="../img/customer(login).svg" class="image" alt="">
			</div>
			
			<div class="panel right-panel">
			  <div class="content">
			  <img src="../img/B&B Logo.png" class="logo" alt="" />
				<h3>One of us ?</h3>
				<p>
				  Login back to your account to check out our latest products!
				</p>
				<button class="btn transparent" id="sign-in-btn">
				  Sign in
				</button>
			  </div>
			  <img src="../img/customer(sign).svg" class="image" alt="" />
			</div>
		  </div>
		</div>

    <script src="../JS/app.js"></script>
  </body>
</html>
