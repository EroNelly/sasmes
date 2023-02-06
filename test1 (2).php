<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isSet($_POST['sentForm'])) {
		$conn = mysqli_connect('localhost', 'root', '','accounts') or die("Connection failed: " . mysqli_connect_error());
		if (isSet($_POST['email']) && isSet($_POST['offices']) && isSet($_POST['user']) && isSet($_POST['fname1']) && $_POST['pass'] === $_POST['pass2']) {
			$email = $_POST['email'];$fname1 = $_POST['fname1'];$user = $_POST['user'];$pass = $_POST['pass'];$offices = $_POST['offices'];
			$sql = "INSERT INTO `accounts` (`email`,`FULL_NAME`,`username`,`password`,`office`) VALUES ('$email','$fname1','$user', '$pass','$offices')";
			$query = mysqli_query($conn,$sql);
			if ($query) {
				echo 'Data Successfully Saved!';
			} 
		}
		else {
			echo "Error, please make sure you re-enter a correct password";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<style>
* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  	font-size: 16px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {
  	background-color: #dfebeb;
}
.login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #337ab7;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #337ab7;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
}
		
	</style>
<head>
<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body align="middle">
	<div class="login">
	<h1>Register in SASMES</h1>
	<form action='test1.php' method='POST'>
  <label  for="Offices">Office:</label>
  <select name="offices" id="offices">
  <option value="health_services">health services</option>
  <option value="lavs">lavs</option>
  <option value="osa">osa</option>
  <option value="registrar">registrar</option>
  <option value="sports">sports</option>
  <option value="aso">aso</option>
  <option value="arcu">arcu</option>


<input type='text' name='email'  id="email1"  placeholder="Email" required />
<br/><label for="user" class="fas fa-user"></label><br/>
	<input type='text' name='fname1'  id="fname"  placeholder="Full Name" required /><br/>
	<label for="user" class="fas fa-user"></label>	<br/>
	<input type='text' name='user' id="pass"  placeholder="Username" required/><br/>
	<label for="user" class="fas fa-user"></label>	<br/>
	<input type='password' name='pass' id="pword"  placeholder="password" required/><br/>
	<label for="user" class="fas fa-lock"></label>	<br/>
	<input type='password' name='pass2' id="pword" placeholder="Confirm password" required/><br/>
	<label for="user" class="fas fa-lock"></label>	<br/>

		<input type='submit' name='sentForm' id="sentForm" />
	</form>
	</div>
</body>
</div>
</html>



