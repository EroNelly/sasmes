<?php session_start();?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php

include('../conndb.php');

?>

<!DOCTYPE html>
<html>
<head>

<title>Users Management</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background-color: #FFFFFF;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #03001C;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: orange  ;
  padding: 16px;
  text-decoration: none;
  font-family:verdana ;
}
 
.ref a.active {
  background-color: #194669;
  color: white;
}

.ref a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}
div.content2 {
  margin-left: 200px;
  padding: 1px 16px;
  height: 500px;
}
div.welcome {
  margin-left: 200px;
  padding: 1px 16px;
  height: 0px;
}
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.welcome {margin-left: 0;}
  div.content2 {margin-left: 0;}
  div.content {margin-left: 0;}

}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.column:hover{
    background-color: #555;

}
.column {
  float: left;
  margin: 8px;
  padding: 8 8px;
  box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2);
}
.header {
  padding-top: 10px;
  padding-left: 10px;
  padding-bottom: 1px;
  margin-left:200px;
  background: #03001C;
  color: white;
  font-size: 20px;
  font: bold;
}

</style>
</head>
<body>

<div class="sidebar">
    <div class="ref">
        <a style="text-align: bottom;"><?php echo $_SESSION['username'];?> <br> Role of Office</a>  
        <a class="active" href="#home"id="acc" href="../sasmes/accManage/index.php">Account Management</a>
		<a href="/sasmes/accManage/accIndex.php">Access Management</a>
        <a href="../dashboard.php">Back</a>

    </div>
</div>
<div class="header">
        <div class="topC">
          <div><h3>Account Management</h3></div>

        </div>
</div>
<div style="text-align: right;font-size: 80%;" class="welcome">

<h3 style="overflow: none;"><br></h3>
<br>
</div>
<div class="content">
	<br>
  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Add Account
  </button>

  <hr>
		<table class="table table-bordered table-striped table-hover" id="myTable">
		<thead>
			<tr>
			   <th class="text-center" scope="col">User ID</th>
			   <th class="text-center" scope="col">Email</th>
				<th class="text-center" scope="col">Full Name</th>
				<th class="text-center" scope="col">Username</th>
				<th class="text-center" scope="col">Password</th>
				<th class="text-center" scope="col">Position</th>
				<th class="text-center" scope="col">Office</th>
				<th class="text-center" scope="col">Profile</th>
				<th class="text-center" scope="col">Edit</th>
				<th class="text-center" scope="col">Delete</th>



		
			</tr>
		</thead>
			<?php

			$get_data = "SELECT accounts.*,offices.officeName FROM accounts 
			INNER JOIN offices on accounts.officeID = offices.officeID" ;
			$run_data = mysqli_query($conn,$get_data);
			$i = 0;
        	while($row = mysqli_fetch_array($run_data))
        	{
				$id = $row['userID'];
				$email = $row['email'];	
				$Fname = $row['fullname'];
				$Uname = $row['username'];
				$roles = $row['position'];
				$pword = $row['password'];
				$office = $row['officeName'];
				$i++;

        		echo "

				<tr>
				<td class='text-center'>$i</td>
				<td class='text-left'>$email</td>
				<td class='text-left'>$Fname</td>
				<td class='text-left'>$Uname</td>
				<td class='text-left'>$pword</td>
				<td class='text-left'>$roles</td>
				<td class='text-left'>$office</td>
				
			
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Prfile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>

					     
					    
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					
						<a href='#' class='btn btn-danger deleteuser' title='Delete'>
						     <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>


        		";
        	}

        	?>

			
			
		</table>
    </form>
</div>
<!--<script>
        var appBanners = document.getElementsByClassName('osa');

        for (var i = 0; i < appBanners.length; i ++) {
            appBanners[i].style.display = 'none';
        }
    </script> -->

	<!---Add in modal---->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Add Account</h4>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">
<div class="form-row">
<div class="form-group col-md-6">
<label for="email">Email Address</label>
<input type="text" class="form-control" name="email" placeholder="Enter Email" required>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="fullname">FullName</label>
<input type="text" class="form-control" name="fullname" placeholder="FirstName MiddleName LastName" required>
</div>
<div class="form-group col-md-6">
<label for="username">Username</label>
<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
</div>
<div class="form-group col-md-6">
<label for="password">Enter Password</label>
<input type="text" class="form-control" name="password" placeholder="Enter Password" required>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label for="officeID">Office</label>
<select id="officeID" name="officeID" class="form-control">
  <option selected value='1'>Office of Student Affairs</option>
  <option value='2'>Admissions and Scholarships Office</option>
  <option value='4'>Library and Audio-Visual Services</option>
  <option value='3'>Arts and Culture</option>
  <option value='5'>Registrar</option>
  <option value='6'>Sports</option>
  <option value='7'>Health Services</option>
  <option value='8'>VCSAS</option>
</select>
<div class="form-group col-md-6">
<label for="position">Position</label>
<select id="position" name="position" class="form-control">
  <option selected value='VCSAS'>VCSAS</option>
  <option value='Director'>Director</option>
  <option value='Unit Head'>Unit Head</option>
  <option value='Unit Staff'>Unit Staff</option>
</select>
</div>

</div>
			
        	
 	<input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
        	
        	
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT accounts.userID, 
			accounts.email, 
			accounts.fullname, 
			accounts.username, 
			accounts.password,
			accounts.officeID,
			offices.officeName,
			accounts.position FROM accounts 
			INNER JOIN offices on accounts.officeID = offices.officeID WHERE 1" ;
			$run_data = mysqli_query($conn,$get_data);
			$row = mysqli_fetch_array($run_data);
while($row = mysqli_fetch_array($run_data))
{
	$id = $row['userID'];
	echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you sure to delete?</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


	";
	
}
?>



<!-- View modal  -->
<?php 

// <!-- profile modal start -->
$get_data = "SELECT accounts.userID, 
			accounts.email, 
			accounts.fullname, 
			accounts.username, 
			accounts.password,
			accounts.officeID,
			offices.officeName,
			accounts.position FROM accounts 
			INNER JOIN offices on accounts.officeID = offices.officeID " ;
			$run_data = mysqli_query($conn,$get_data);
			$row = mysqli_fetch_array($run_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['userID'];
	$email = $row['email'];
	$Fname = $row['fullname'];
	$Uname = $row['username'];
	$pword = $row['password'];
	$office = $row['officeName'];

	echo "

		<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel'>Profile <i class='fa fa-user-circle-o' aria-hidden='true'></i></h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
			<div class='container' id='profile'> 
				<div class='row'>

					<div class='col-sm-3 col-md-6'>
						<h3 class='text-primary'>$Fname</h3>
						<p class='text-secondary'>
						<strong>User ID:</strong> $id <br>
						<strong>Email:</strong>$email<br>
						<strong>Full name:</strong>$Fname <br>
						<strong>Office:</strong> $office <br>
						
						<br />
					</div>
				</div>

			</div>   
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			</div>
			</form>
			</div>
		</div>
		</div> 


    ";
}

?>




<!----edit Data--->

<?php

$get_data = "SELECT accounts.userID, 
			accounts.email, 
			accounts.fullname, 
			accounts.username, 
			accounts.password,
			accounts.officeID,
			offices.officeName,
			accounts.position FROM accounts 
			INNER JOIN offices on accounts.officeID = offices.officeID " ;
			$run_data = mysqli_query($conn,$get_data);
			$row = mysqli_fetch_array($run_data);
while($row = mysqli_fetch_array($run_data))
{


	$id = $row['userID'];
	$email = $row['email'];
	$Fname = $row['fullname'];
	$Uname = $row['username'];
	$pword = $row['password'];
	$office = $row['officeName'];

	echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit your Data</h4> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

		<div class='form-group col-md-6'>
		<label for='fnameInput'>User Name</label>
		<input type='text' class='form-control' name='email' placeholder='Enter your email' value='$email' required>
		</div>
		


		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='name1'>Full name.</label>
		<input type='text' class='form-control' name='Fname' placeholder='Enter Username.' maxlength='50' value='$Fname' required>
		</div>


		<div class='form-group col-md-6'>
		<label for='inputState'>Office</label>
		<select id='inputState' name='officeName' class='form-control' value='$office'>
		  <option selected values='ArCu'>Arts and Culture</option>
		  <option values='ASO'>Admissions and Scholarships Offices</option>
		  <option values='Health'>Health Service</option>
		  <option values='LAVS'>Library and Audio-Visual Services</option>
		  <option values='OSA'>Offices of Student Affairs</option>
		  <option values='Registrar'>Registrar</option>
		  <option values='Sports'>Sports</option>
		</select>
		</div>
		</div>



		<div class='form-group col-md-6'>
		<label for='fnameInput'>User Name</label>
		<input type='text' class='form-control' name='username' placeholder='Enter Username' value='$Uname' required>
		</div>
		</div>
		

		<div class='form-group col-md-6'>
		<label for='fnameInput'>password</label>
		<input type='text' class='form-control' name='pword' placeholder='Enter password' value='$pword' required>
		</div>
		

			 <div class='modal-footer'>
			 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
			 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		 </div>


        </form>
      </div>

    </div>

  </div>
</div>


	";
}


?>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</body>
</html>
