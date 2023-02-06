
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php
     $conn=new mysqli("localhost","cabanana62","cabana123456","super_admin");

     $query="SELECT DATE, count(*) as number FROM student_data WHERE DATE BETWEEN CURDATE() AND CURDATE() GROUP BY DATE";
     $res=mysqli_query($conn,$query);


     if(isset($_POST['date']))
     {
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
     $query = "SELECT DATE, count(*) as number FROM student_data WHERE DATE BETWEEN '$from_date' AND '$to_date' GROUP BY DATE";  
     $res = mysqli_query($conn, $query);  
     }
?> 
<form id="Form1" form action="barchart.php" method="post">

<input type="date" name="from_date" value="<?php echo $from_date; ?>" class="form-control">
<input type="date" name="to_date" value="<?php echo $to_date; ?>" class="form-control">            
<input type="submit" name="date" value="date"><br><br> 

<!DOCTYPE html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['DATES','Student per date'],
          <?php
            while($data=mysqli_fetch_array($res)){
              $year=$data['DATE'];
              $sale=$data['number'];
              
           ?>


           ['<?php echo $year;?>',<?php echo $sale;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  
  <body>
    <div id="barchart_material" style="width: 700px; height: 300px;"></div>
  </body>
</html>

