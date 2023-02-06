<?php session_start();?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 

<?php
include('conndb.php');

if($_SESSION['officeID'] == 8){
  echo"<style >#acc{display:none;}</style>
  <style >#service{display:none;}</style>" ;
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
        <a style="text-align: bottom;"><?php echo $_SESSION['username'];?> <br> Role of Office</a>  
        <a class="active" href="#home" styl>Dashboard</a>
        <a id="acc" href="../sasmes/accManage/index.php">Account Management</a>
        <a id="masterlist" href="">MasterList</a>
        <a id="service" href="../sasmes/servManage/index.php">Service Management</a>
        <a href="clearsession.php">Logout</a>

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
  <div class="border"><h2>Student Affairs and Services Offices</h2></div>

<div class="osa" id="osa">
  <div class="column">
    <div class="card">  
        <a href="../sasmes/osa/osaOffice.php" style="text-decoration:none;">
        <img src="ustp.png" alt="OSA" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">Office of <br>Student Affairs</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="aso" id="aso">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/asoActivity/asoSB.php" style="text-decoration:none;">
        <img src="ustp.png" alt="ASO" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">Admission and <br>Scholarship Office</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="lavs" id="lavs">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/lavsActivity/lavsSB.php" style="text-decoration:none;">
        <img src="ustp.png" alt="LAVS" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">Library and Audio-<br>Visual Services</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="arcu" id="arcu">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/arcuActivity/arcuSB.php" style="text-decoration:none;">
        <img src="ustp.png" alt="ArCu" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">Arts <br>and Culture</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="sports" id="sports">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/sportsActivity/sportsSB.php" style="text-decoration:none;">
        <img src="ustp.png" alt="Sports" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black"><br>Sports</p>
          </div>
        </a>  
    </div> 
  </div>
</div>


<div class="" id ="registrar">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/regActivity/regSB.php" style="text-decoration:none;">
        <img src="ustp.png" alt="Registrar" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black"><br>Registrar</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="health" id="health">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/healthActivity/healthSB.php" style="text-decoration:none;">
        <img src="ustp.png" alt="Health" >
          <div class="container">
            <p style="text-align: center;font-family:verdana; font-weight: bold;color: black">Health <br>Service</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
</div>
<!--<script>
        var appBanners = document.getElementsByClassName('osa');

        for (var i = 0; i < appBanners.length; i ++) {
            appBanners[i].style.display = 'none';
        }
    </script> -->
</body>
</html>
