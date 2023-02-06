<?php
include('db.php');

$id= $_GET['id'];
//Data Updating
if(isset($_POST['submit']))
{
	
	$Fname = $_POST['Fname'];
	$email = $_POST['email'];
	$Uname = $_POST['username'];
	$pword = $_POST['pword'];
	$office = $_POST['officeName'];
	

	$msg="";

	$update = "UPDATE accounts SET email='$email', fullname='$Fname', username = '$Uname', password = '$pword', officeName = '$office' WHERE userID=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
           echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='index.php';
            </script>";
	}else{
		echo "Data not update";
	}
}

?>
