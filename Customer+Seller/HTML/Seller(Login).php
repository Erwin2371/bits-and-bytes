<!DOCTYPE html>
<html>
<head>
	<title>Seller Login Form</title>
	<link rel="stylesheet" type="text/css" href="../CSS/Seller(Login).css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="../JS/function.js"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="../img/wave1.png">
	<div class="container">

	<div class="img">
		<img src="../img/seller(login).svg">
	</div>
	<div class="login-content">
		<form action="../PHP/Seller(login).php" method="post">
			<img src="../img/avatar.svg">
			<h2 class="title">Welcome!</h2>
			<h3 class="title">Login back to your account to upload some new products or sign up as new seller!</h3>
			<div class="input-div one">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="div">
					<h5>Username</h5>
					<input type="text" name="Username" class="input" autocomplete="off">
				</div>
			</div>
			<div class="input-div pass">
				<div class="i"> 
					<i class="fas fa-lock"></i>
				</div>
				<div class="div">
					<h5>Password</h5>
					<input type="password" name="Password" class="input">
				</div>
			</div>
			<div class="buttons">
				<input type="submit" name="Login" class="btn" value="Login">
				<input type="button" onclick="signup()" name="Sign Up" class="btn" value="Sign Up">
			</div>
			<div class="button1">
				<input type="button" onclick="customer()" class="btn btn1" value="To Customer Page">
			</div>
		</form>
	</div>
</div>
	<script type="text/javascript" src="../JS/main.js"></script>
	<script>
		function signup() 
		{
			window.location.href="../HTML/Seller(Sign Up).php";
		}
	</script>
</body>
</html>
