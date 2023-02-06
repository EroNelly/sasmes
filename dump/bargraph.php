
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php  
 error_reporting(0);
 include('db.php');


 $query = "SELECT serviceName, count(*) as number FROM student_data WHERE officeName='OSA'AND date BETWEEN CURDATE() AND CURDATE() GROUP BY serviceName";  
 $result = mysqli_query($con, $query);  

 $from_date = $_POST['from_date'];
 $to_date = $_POST['to_date'];
 if(isset($_POST['date']))
 {
 $query = "SELECT serviceName, count(*) as number FROM student_data WHERE officeName='OSA'AND date BETWEEN '$from_date' AND '$to_date' GROUP BY serviceName";  
 $result = mysqli_query($con, $query);  
 }
 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           google.charts.setOnLoadCallback(drawChart2);  
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
                      title: 'List of students',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>

      <form id="Form1" form action="bargraph.php" method="post">

          <input type="date" name="from_date" value="<?php echo $from_date; ?>" class="form-control">
          <input type="date" name="to_date" value="<?php echo $to_date; ?>" class="form-control">            
          <input type="submit" name="date" value="date"><br><br> 
          <br /><br /> 
          </form>
           <div style="width:900px;">  
                <h3 style="text-align:center">Offices per student</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
          

      </body>  
 </html> 


