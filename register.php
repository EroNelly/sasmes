<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isSet($_POST['sentForm'])) {
		$conn = mysqli_connect('localhost', 'root', '','accounts') or die("Connection failed: " . mysqli_connect_error());
		if (isSet($_POST['offices']) && isSet($_POST['user']) && isSet($_POST['fname1']) && $_POST['pass'] === $_POST['pass2']) {
			$fname1 = $_POST['fname1'];$user = $_POST['user'];$pass = $_POST['pass'];$offices = $_POST['offices'];
			$sql = "INSERT INTO `accounts` (`FULL_NAME`,`username`,`password`,`office`) VALUES ('$fname1','$user', '$pass','$offices')";
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
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simpe Registration</title>
</head>
<body align="middle">
	<div><center><h2>Registration Form.</h2></center></div>
  
	<form action='test1.php' method='POST'>
  <label  for="Offices">Choose an Office:</label>
  <select name="Offices" id="offices">
  <option value="Health">Health services</option>
  <option value="LAVS">Library and Audio-Visual Services</option>
  <option value="OSA">Office of Student Affairs</option>
  <option value="Registrar">Registrar</option>
  <option value="Sports">Sports</option>
  <option value="ASO">Admission and Scholarships Office</option>
  <option value="ArCu">Arts and Culture</option>
</select>


<br/><label for="user">full name:</label>	<br/>
	<input type='text' name='fname1'  id="user"  required /><br/>
	<label for="user">username:</label>	<br/>
	<input type='text' name='user' id="pass"  required/><br/>
		
	<label for="user">password:</label>	<br/>
	<input type='password' name='pass' id="pword"  required/><br/>
	<label for="user">Confirm password</label>	<br/>
	<input type='password' name='pass2' id="pword"  required/><br/>

		<input type='submit' name='sentForm' id="sentForm" />
	</form>
</body>
</html>

