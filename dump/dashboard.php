<?php session_start();?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
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
  background-color: #82a4fb;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #e0e1ff;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
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
  height: 100px;
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
  margin-bottom: 16px;
  padding: 8 8px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}


</style>
</head>
<body>

<div class="sidebar">
    <div class="ref">
        <a class="active" href="#home">Dashboard</a>
        <a href="clearsession.php">Logout</a>
    </div>
</div>
<div class="welcome">
<h2>Welcome to SASMES</h2>
<p>Hi! <?php echo $_SESSION['username'];?> </p>
<br>
</div>

<div class="content2">
<h2>MasterList</h2>
<div class="masterlist">
  <div class="add">
    <div class="column">
      <div class="card">
        <a href="../sasmes2/masterlist/dl_test.php">
          <img src="ustp.png" alt="add" >
          <div class="container">
            <p style="text-align: center;">MasterList</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
</div>

<div class="content">
<h2>Student Affairs and Services Offices</h2>
<div class="osa">
  <div class="column">
    <div class="card">  
        <a href="../sasmes2/osaActivity/osaSB.php">
        <img src="ustp.png" alt="OSA" >
          <div class="container">
            <p style="text-align: center;">Office of Student Affairs</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="aso">
  <div class="column">
    <div class="card">  
        <a href="">
        <img src="ustp.png" alt="ASO" >
          <div class="container">
            <p style="text-align: center;">Admission and Scholarship Office</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="lavs">
  <div class="column">
    <div class="card">  
        <a href="">
        <img src="ustp.png" alt="LAVS" >
          <div class="container">
            <p style="text-align: center;">Library and Audio-Visual Services</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="arcu">
  <div class="column">
    <div class="card">  
        <a href="">
        <img src="ustp.png" alt="ArCu" >
          <div class="container">
            <p style="text-align: center;">Arts and Culture</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="sports">
  <div class="column">
    <div class="card">  
        <a href="">
        <img src="ustp.png" alt="Sports" >
          <div class="container">
            <p style="text-align: center;">Sports</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="">
  <div class="column">
    <div class="card">  
        <a href="">
        <img src="ustp.png" alt="Registrar" >
          <div class="container">
            <p style="text-align: center;">Registrar</p>
          </div>
        </a>  
    </div> 
  </div>
</div>
<div class="health">
  <div class="column">
    <div class="card">  
        <a href="">
        <img src="ustp.png" alt="Health" >
          <div class="container">
            <p style="text-align: center;">Health Service</p>
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
