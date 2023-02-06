<?php
//database connection
include('../conndb.php');

//adding data to the database
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$officeID = $_POST['officeID'];
	$password = $_POST['password'];
	$role = $_POST['position'];

	
	//image upload

  	$insert_data = "INSERT INTO accounts(email,fullname,username,password,officeID,position) VALUES ('".$email."','".$fullname."','".$username."','".$password."','".$officeID."','".$role."')";
  	$run_data = mysqli_query($conn,$insert_data);

  	if($run_data){
  		header('location:index.php');
  	}else{
  		echo "Data not insert";
  	}

}

?>
