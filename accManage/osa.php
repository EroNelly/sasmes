<?php 

include('../conndb.php');

$id= $_GET['userID'];
//Data Updating
if(isset($_POST['submit']))
{ 
	echo $_POST;
	$gsuAccess = $_POST['osa1'];
	$swsAccess = $_POST['osa2'];
	$fdcAccess = $_POST['osa3'];	

	$msg="";

	$update = "UPDATE osaAccess SET gsuAccess='$gsuAccess', swsAccess='$swsAccess', fdcAccess = '$fdcAccess' WHERE userID=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
           echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='accIndex.php';
            </script>";
	}else{
		echo "Data not update";
	}
}

?>