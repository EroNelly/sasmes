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
        <a id="acc" href="/sasmes/accManage/index.php">Account Management</a>
		    <a class="active" href="#home">Access Management</a>
        <a href="../dashboard.php">Back</a>

    </div>
</div>
<div class="header">
        <div class="topC">
          <div><h3>Access Management</h3></div>

        </div>
</div>
<div style="text-align: right;font-size: 80%;" class="welcome">

<h3 style="overflow: none;"><br></h3>
<br>
</div>
<div class="content">
  <br>
  <hr>
  <h4>Super Admin</h4>
		<table class="table table-bordered table-striped table-hover" id="myTable">
		<thead>
			<tr>
			   <th class="text-center" scope="col">User ID</th>
			   <th class="text-center" scope="col">Email</th>
				<th class="text-center" scope="col">Full Name</th>
				<th class="text-center" scope="col">Position</th>
				<th class="text-center" scope="col">Office</th>
        <th class="text-center" scope="col">Access</th>
			</tr>
		</thead>
			<?php

			$get_data = "SELECT accounts.*,offices.officeName FROM accounts
			INNER JOIN offices on accounts.officeID = offices.officeID WHERE accounts.officeID = '9'" ;
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
				<td class='text-left'>$roles</td>
				<td class='text-left'>$office</td>
        <td class='text-left'>Account Management<div><label><input type='checkbox' name='acccess' checked></label><div>
        Add Service<div><label><input type='checkbox' name='acccess' checked></label><div>
        Office Access<div><label><input type='checkbox' name='acccess'checked></label><div>
        </td>

        		";
        	}

        	?>

			
			
		</table>
    <hr>
  <h4>VCSAS</h4>
		<table class="table table-bordered table-striped table-hover" id="myTable2">
		<thead>
			<tr>
			   <th class="text-center" scope="col">User ID</th>
			   <th class="text-center" scope="col">Email</th>
				<th class="text-center" scope="col">Full Name</th>
				<th class="text-center" scope="col">Position</th>
				<th class="text-center" scope="col">Office</th>
        <th class="text-center" scope="col">Access</th>
			</tr>
		</thead>
			<?php

			$get_data = "SELECT accounts.*,offices.officeName FROM accounts
			INNER JOIN offices on accounts.officeID = offices.officeID WHERE accounts.officeID = '8'" ;
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
				<td class='text-left'>$roles</td>
				<td class='text-left'>$office</td>
        <td class='text-left'>Masterlist<div><label><input type='checkbox' name='acccess' checked></label><div>
        Office Access<div><label><input type='checkbox' name='acccess' checked></label><div>
        </td>

        		";
        	}

        	?>
		</table>
    <hr>
  <h4>Office of Student Affairs</h4>
		<table class="table table-bordered table-striped table-hover" id="myTable3">
		<thead>
			<tr>
			   <th class="text-center" scope="col">User ID</th>
			   <th class="text-center" scope="col">Email</th>
				<th class="text-center" scope="col">Full Name</th>
				<th class="text-center" scope="col">Position</th>
				<th class="text-center" scope="col">Office</th>
        <th class="text-center" scope="col">Access</th>
			</tr>
		</thead>
    <form method="POST" action="osa.php" >
			<?php
      
			$get_data = "SELECT accounts.*,offices.officeName,osaaccess.* FROM accounts
			INNER JOIN offices on accounts.officeID = offices.officeID
      INNER JOIN osaaccess on accounts.userID = osaaccess.userID WHERE accounts.officeID = '1'" ;
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
        $gsu = $row['gsuAccess'];
        $sws = $row['swsAccess'];
        $fdc = $row['fdcAccess'];
				$i++;
        echo"
        <tr>
				<td class='text-center'> $i </td>
				<td class='text-left'> $email</td>
				<td class='text-left'> $Fname</td>
				<td class='text-left'> $roles</td>
				<td class='text-left'> $office</td>";
        ?>


        <td class='text-left'><div>
        
        <label>GSU<input <?php if($gsu=='Yes'){echo 'checked';} else{}?> type='checkbox' name='osa1' value="val1"></label>
        <label>SWS<input <?php if($sws=='Yes'){echo 'checked';} else{}?> type='checkbox' name='osa2' value="val2"></label>
        <label>FDC<input <?php if($fdc=='Yes'){echo 'checked';} else{}?> type='checkbox' name='osa3' value="val3"></label>
        <button class="btn" type="submit" name="submit" >Save</button>
        </div>
         
        <?php
          $check = isset($_POST['osa1']) ? "Yes" : "No";
          echo $check;
          $check = isset($_POST['osa2']) ? "Yes" : "No";
          echo $check;
          $check = isset($_POST['osa3']) ? "Yes" : "No";
          echo $check;
        ?>
        <?php } ?>
        </td>
    </form>
    </table>
</div>



<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable2').DataTable();

    });
  </script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable3').DataTable();

    });
  </script>
</body>
</html>

