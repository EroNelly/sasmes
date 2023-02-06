<?php
 //Need to set up for SASMES Database. Not updated yet
 include 'conndb.php';

 $Un=$_POST['userName'];
 $Upass=$_POST['password'];
 $Fn=$_POST['firstName'];
 $Ln=$_POST['lastName'];
 $Cont=$_POST['contact_Info'];
 $Em=$_POST['email_add'];


$sql="INSERT INTO user (userName, password, firstName, lastName, contact_Info, email_add) Values ( '$Un', '$Upass', '$Fn', '$Ln', '$Cont', '$Em')";

$result=$conn->query($sql);

if($result===TRUE)
{
	header('location:login.html');
}
else
{
	echo $conn->error;
}
?>