<?php session_start();?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php  
 error_reporting(0);
 include ('../../conndb.php');


 $query = "SELECT serviceName, count(*) as number FROM student_data WHERE officeName='OSA'AND date BETWEEN CURDATE() AND CURDATE() GROUP BY serviceName";  
 $result = mysqli_query($con, $query);  
 $totalquery = "SELECT officeName, count(*) as total FROM student_data WHERE officeName='OSA'AND date BETWEEN CURDATE() AND CURDATE()";
 $totalresult = mysqli_query($con, $totalquery);  
 $gquery="SELECT date, count(*) as guidance FROM student_data WHERE officeName='OSA' AND serviceName ='Guidance and Counseling' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY date";
 $res=mysqli_query($con,$gquery);
 $swsquery="SELECT date, count(*) as sws FROM student_data WHERE officeName='OSA' AND serviceName ='Student Welfare and Support' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY date";
 $res2=mysqli_query($con,$swsquery);

 $from_date = $_POST['from_date'];
 $to_date = $_POST['to_date'];
 
 if(isset($_POST['date'])){
 $query = "SELECT serviceName, count(*) as number FROM student_data WHERE officeName='OSA'AND date BETWEEN '$from_date' AND '$to_date' GROUP BY serviceName";  
 $result = mysqli_query($con, $query);  
 $totalquery = "SELECT officeName, count(*) as totalR FROM student_data WHERE officeName='OSA'AND date BETWEEN '$from_date' AND '$to_date'";
 $totalresult = mysqli_query($con, $totalquery);
 $total = $row['total'];
 $gquery="SELECT date, count(*) as guidance FROM student_data WHERE officeName='OSA' AND serviceName ='Guidance and Counseling' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY date";
 $res=mysqli_query($con,$gquery);
 $swsquery="SELECT date, count(*) as sws FROM student_data WHERE officeName='OSA' AND serviceName ='Student and Welfare Support' AND date BETWEEN '$from_date' AND '$to_date' GROUP BY date";
 $res2=mysqli_query($con,$swsquery);
 }
 ?>  
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart','bar']});  
           google.charts.setOnLoadCallback(drawChart);  
           google.charts.setOnLoadCallback(drawChart2); 
           google.charts.setOnLoadCallback(drawChart3);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['officeName', 'unique_ID'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["serviceName"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Chart of students availing Guidance and Counseling',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           function drawChart2() {
              var data = google.visualization.arrayToDataTable([
              ['date','Student per date'],
            <?php
              while($data=mysqli_fetch_array($res)){
                  $year=$data['date'];
                  $sale=$data['guidance'];
              ?>
              ['<?php echo $year;?>',<?php echo $sale;?>],   
              <?php   
              }
                ?> 
              ]);

              var options = {
              chart: {
                title: 'Daily Graph of Students Availed Guidance and Services',
              },
              bars: 'vertical' // Required for Material Bar Charts.
              };
              var chart = new google.charts.Bar(document.getElementById('guidance_chart'));
              chart.draw(data, google.charts.Bar.convertOptions(options));
      }
      function drawChart3() {
              var data = google.visualization.arrayToDataTable([
              ['date','Student per date'],
            <?php
              while($data=mysqli_fetch_array($res2)){
                  $year=$data['date'];
                  $sale=$data['sws'];
              ?>
              ['<?php echo $year;?>',<?php echo $sale;?>],   
              <?php   
              }
                ?> 
              ]);

              var options = {
              chart: {
                title: 'Graph of Students Availed Student and Welfare Support',
              },
              bars: 'vertical' // Required for Material Bar Charts.
              };
              var chart = new google.charts.Bar(document.getElementById('sws_chart'));
              chart.draw(data, google.charts.Bar.convertOptions(options));
      }
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
        <a class="active" href="#home">Statistics</a>
        <a href="">Add Student</a>
        <a href="">Evaluation</a>
        <a href="../osaOffice.php">Back to Office</a>

    </div>
</div>
<div class="header">
        <div class="topC">
          <div><h3>Statistics</h3></div>

        </div>
</div>
<div class="content">
  <div class="border"><h2>Statistics</h2></div>

  <div class="content">
    <h1>Guidance Services</h1>
    </div>
<div class="statsgraph">
    <form id="Form1" form action="osaStats.php" method="post">

    <input type="date" name="from_date" value="<?php echo $from_date; ?>" class="form-control">
    <input type="date" name="to_date" value="<?php echo $to_date; ?>" class="form-control">            
    <input type="submit" name="date" value="date"><br><br> 
      <br /><br /> 
    </form>
  
    <div style="width:900px;">  
      <h3>Daily Graph of Student Availed in OSA's Services</h3>  
      <br />  
      <div id="piechart" style="width: 700px; height: 500px;"></div>  
      <div class="numStats">
        <div class="total"><h2></h2></div>
        </div>
    </div>
    <h4>Guidance and Counseling Services</h4> <br /> 
    <div id="guidance_chart" style="width: 700px; height: 300px;"></div>
    <h4>Student and Welfare Support</h4> <br /> 
    <div id="sws_chart" style="width: 700px; height: 300px;"></div>
    <h4>Guidance and Counseling Services</h4> <br /> 
    <div id="guidance_chart" style="width: 700px; height: 300px;"></div>
    
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
