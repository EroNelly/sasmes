
<?php

$userID=$_POST['username'];
$pass=$_POST['password'];

$server="localhost";
$username="cabanana62";
$password="cabana123456";
$dbname="super_admin";

$conn= new mysqli($server, $username, $password, $dbname);

if($conn->connect_error)
{
	die("Error connection". $connect_error);
}

$sql="SELECT * FROM accounts WHERE username = '$userID' and password = '$pass'";

$result=$conn->query($sql);


session_start();
if($result->num_rows>0)
{
while ($row=$result->fetch_assoc())
   {
       $_SESSION['userID']=$row['userID'];
       $_SESSION['username']=$row['username'];
       $_SESSION['password']=$row['password'];
	   $_SESSION['officeID']=$row['officeID'];

       if($_SESSION['officeID']==1){
        $osaSql="SELECT * FROM osaaccess WHERE userID = '".$row['userID']."'";
        $result2=$conn->query($osaSql);
        if($result2->num_rows>0){
            while ($rows=$result2->fetch_assoc()){
                $_SESSION['gsuAccess']=$rows['gsuAccess'];
                $_SESSION['fdcAccess']=$rows['fdcAccess'];
                $_SESSION['swsAccess']=$rows['swsAccess'];
            }
            header('location: osa/osaOffice.php');  
        }

        }
        elseif($_SESSION['officeID']==8){
            header('location: dashboard.php');  

        }
       else{
        header('location: dashboard.php'); 
       }
       
   }

}
else
{
    
}

?>