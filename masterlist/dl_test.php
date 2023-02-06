<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<?php
// function to connect and execute the query
#event.preventDefault();
error_reporting(0);
function filterTable($query)
{
    include('../osaActivity/db.php');
    // Create connection
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;   
}

$valueToSearch = $_POST['valueToSearch'];
if(isset($_POST['search']))
{
    // search in all table columns
    // using concat mysql function

    $query1 = "SELECT * FROM `student_data` WHERE CONCAT(`unique_ID`, `idNumber`, `fullname`, `crs_yr_lvl`,`time`,`date`, `officeName`,`serviceName`,`status`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query1);   
}
else{
    $query = "SELECT * FROM `student_data`";
    $search_result = filterTable($query);
}
if(isset($_POST['reset']))
{
    echo $valueToSearch=null;
    $query = "SELECT * FROM `student_data`";
    $search_result = filterTable($query);
}
if(isset($_POST['Export'])){
        $fileName = "members-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('unique_ID', 'idNumber', 'fullname', 'crs_yr_lvl','time','date', 'officeName','serviceName','status'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
// Fetch records from database 
$query = "SELECT * FROM `student_data` WHERE CONCAT(`unique_ID`, `idNumber`, `fullname`, `crs_yr_lvl`,`time`,`date`, `officeName`,`serviceName`,`status`) LIKE '%".$valueToSearch."%'";
$search_result = filterTable($query);  
if($search_result->num_rows > 0){ 
    // Output each row of the data 
    while($row = $search_result->fetch_assoc()){
    $lineData = array($row['unique_ID'], $row['idNumber'], $row['fullname'], $row['crs_yr_lvl'],$row['time'], $row['date'], $row['officeName'],$row['serviceName'],$row['status']); 
    $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
// Render excel data 
echo $excelData; 
exit;
}
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
if(isset($_POST['date']))
{
    $query = "SELECT * FROM `student_data` WHERE date BETWEEN '$from_date' AND '$to_date'";
    $search_result = filterTable($query);
}

if(isset($_POST['reset2']))
{
    echo $from_date=null;
    echo $to_date =null;
    $query = "SELECT * FROM `student_data`";
    $search_result = filterTable($query);
}

if(isset($_POST['Export2'])){
    $fileName = "members-data_" . date('Y-m-d') . ".xls"; 

// Column names 
$fields = array('unique_ID', 'idNumber', 'fullname', 'crs_yr_lvl','time','date', 'officeName','serviceName','status'); 

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
// Fetch records from database 
$query = "SELECT * FROM `student_data` WHERE date BETWEEN '$from_date' AND '$to_date'";
$search_result = filterTable($query);  
if($search_result->num_rows > 0){ 
// Output each row of the data 
while($row = $search_result->fetch_assoc()){
$lineData = array($row['unique_ID'], $row['idNumber'], $row['fullname'], $row['crs_yr_lvl'],$row['time'], $row['date'], $row['officeName'],$row['serviceName'],$row['status']); 
$excelData .= implode("\t", array_values($lineData)) . "\n"; 
} 
}else{ 
$excelData .= 'No records found...'. "\n"; 
} 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
// Render excel data 
echo $excelData; 
exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table {
                padding: 10px;
                font-size: 15px;
                width: 100%;
                table-layout: fixed;
            }
            .tableData {
                padding-top: 50px;
            }

        </style>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class="w3-panel w3-blue">
        <h2 style="text-align:center;">SASMES MasterList</h2>

        
        </div> 
        <a style="margin: 10px;"href="../dashboard.php" class="w3-button w3-black">Back to Dashboard</a>
        <div>
        <form class="w3-container"id="Form1" form action="dl_test.php" method="post">
            <div style="margin:10px;">
            <h5>Specific Column Filter</h5>
            <input class="w3-border"type="text" name="valueToSearch" value="<?php echo $valueToSearch; ?>"/>  
            <input type="submit" class="w3-btn w3-blue" name="search" value="Filter">
            <input type="submit" class="w3-btn w3-blue" name="reset" value="Reset Filter" >
            <input type="submit" class="w3-btn w3-blue" name="Export" value="Export Filtered">
            </div>
            <div style ="margin:10px;">
            <h5>Date Range Filter</h5>
            <input type="date" name="from_date" value="<?php echo $from_date; ?>" class="form-control">
            <input type="date" name="to_date" value="<?php echo $to_date; ?>" class="form-control">
            
            <input type="submit" class="w3-btn w3-red" name="date" value="Filter Date">
            <input type="submit" class="w3-btn w3-red" name="reset2" value="Reset Filter" >
            <input type="submit" class="w3-btn w3-red" name="Export2" value="Export Filtered">
            </div>
        </form>
        </div>
        <div class="tData" >  
            <table id="example" class="display">
                <tr style="text-align:center;">
                <th>No.</th> 
                <th>Student ID</th>  
                <th>Student Name</th>  
                <th>Course, Year and level</th>  
                <th>Time</th>  
                <th>Date</th>  
                <th>Office</th> 
                <th>Service</th> 
                <th>Status</th> 
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>

                    <td class="w3-border"><?php echo $row['unique_ID'];?></td>
                    <td class="w3-border"><?php echo $row['idNumber'];?></td>
                    <td class="w3-border"><?php echo $row['fullname'];?></td>
                    <td class="w3-border"><?php echo $row['crs_yr_lvl'];?></td>
                    <td class="w3-border"><?php echo $row['time'];?></td>
                    <td class="w3-border"><?php echo $row['date'];?></td>
                    <td class="w3-border"><?php echo $row['officeName'];?></td>
                    <td class="w3-border"><?php echo $row['serviceName'];?></td>
                    <td class="w3-border"><?php echo $row['status'];?></td>
                    

                </tr>
                <?php endwhile;?>
            </table>
            </div>
          
        <br />
        
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').dataTable( {
        "lengthMenu": [20, 40, 60, 80, 100],
        "pageLength": 20
        } );

    });
  </script>

    </body>
</html>
