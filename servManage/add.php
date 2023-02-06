<?php
//database connection
include('../conndb.php');

//adding data to the database
if(isset($_POST['submit'])){
	$serviceName = $_POST['serviceName'];
	$officeID = $_POST['officeID'];
	$unit = $_POST['unit'];

	
	//image upload

  	$insert_data = "INSERT INTO services(serviceName,officeID,unit) VALUES ('".$serviceName."','".$officeID."','".$unit."')";
  	$run_data = mysqli_query($conn,$insert_data);

  	if($run_data){
  		header('location:index.php');
  	}else{
  		echo "Data not insert";
  	}

}

?>
