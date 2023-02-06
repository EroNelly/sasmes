<?php session_start();?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 

<?php
include('../conndb.php');

if($_SESSION['gsuAccess'] === "No")
{
	echo"<style>#gsu{display:none;}</style> " ;
}
else{
}
if($_SESSION['fdcAccess'] === "No")
{
	echo"<style>#fdc{display:none;}</style> " ;
}
else{
}
if($_SESSION['swsAccess'] === "No")
{
	echo"<style>#sws{display:none;}</style> " ;
}
else{
}


?> 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
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
        <a style="text-align: bottom;"><?php echo $_SESSION['username'];?> <br> Director of Meth Affairs</a>  
        <a class="active" href="#home" styl>Dashboard</a>
        <a href="../clearsession.php">Logout</a>

    </div>
</div>
<div class="header">
        <div class="topC">
          <div><h3>Welcome to SASMES</h3></div>

        </div>
</div>
<div style="text-align: right;font-size: 80%;" class="welcome">

<h3 style="overflow: none;"><br></h3>
<br>
</div>
<div class="content">
  <div class="border"><h2>Office of Student Affairs Unit</h2></div>

<div class="gsu" id="gsu">
  <div class="column">
    <div class="card">  
        <a href="../osa/service/gsu.php" style="text-decoration:none;">
        <img src="../ustp.png" alt="gsu" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">GSU</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="sws" id="sws">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/asoActivity/asoSB.php" style="text-decoration:none;">
        <img src="../ustp.png" alt="sws" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">SWS</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="fdc" id="fdc">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/lavsActivity/lavsSB.php" style="text-decoration:none;">
        <img src="../ustp.png" alt="fdc" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">FDC</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
</div>
</body>
</html>
