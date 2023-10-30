<?php include 'header.php'; ?>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<?php
$u_userID=$_SESSION['u_userID'];

$filter = 0;

if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
}

$sqldate = "SELECT MIN(q_date) FROM tb_quotation";
$resultdate = mysqli_query($con, $sqldate);
$rowdate = mysqli_fetch_array($resultdate);
$date = date("y",strtotime($rowdate[0]));
$year = DateTime::createFromFormat('y', $date);
$pyear = $year->format('Y');
$cyear = date('Y');

if($filter){
    $sql = "SELECT * FROM tb_quotation 
        LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE q_statusID = '$filter'
        ORDER BY q_date DESC" ;
}
else{
    $sql = "SELECT * FROM tb_quotation 
        LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        ORDER BY q_date DESC" ;
}


$result = mysqli_query($con, $sql);

$sql1 = "SELECT COUNT(*) FROM tb_quotation WHERE q_statusID = '3'";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($result1);

$sql2 = "SELECT COUNT(*) FROM tb_quotation WHERE q_statusID = '2'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_array($result2);

$sql3 = "SELECT COUNT(*) FROM tb_quotation WHERE q_statusID = '1'";
$result3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_array($result3);

$sql4 = "SELECT COUNT(*) FROM tb_quotation WHERE q_statusID = '5'";
$result4 = mysqli_query($con, $sql4);
$row4 = mysqli_fetch_array($result4);

$total = $row4[0] + $row3[0] + $row2[0] + $row1[0] ;
if($total==0){
    $total = 1;
}
$p1 = number_format((float)($row1[0]/$total*100), 2, '.', '');
$p2 = number_format((float)($row2[0]/$total*100), 2, '.', '');
$p3 = number_format((float)($row3[0]/$total*100), 2, '.', '');
$p4 = number_format((float)($row4[0]/$total*100), 2, '.', '');

$dataPoints = array( 
	array("label"=>"Deleted", "y"=>$p4),
	array("label"=>"Rejected", "y"=>$p2),
    array("label"=>"Pending", "y"=>$p3),
    array("label"=>"Accepted", "y"=>$p1),
)

?>
<head>
    <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {

    animationEnabled: true,
    title: {
        text: "Quotation"
    },
    subtitles: [{
        text: "<?php echo $pyear. ' - ' .$cyear; ?>"
    }],
    data: [{
        type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
        indexLabel: "{label} ({y})",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>

<style>
    .dash1{
        color: black;
        background-color: salmon;
    }

    .dash1:hover{
        background-color: indianred;
    }

    .dash2{
        color: black;
        background-color: khaki;
    }

    .dash2:hover{
        background-color: gold;
    }

    .dash3{
        color: black;
        background-color: palegreen;
    }

    .dash3:hover{
        background-color: limegreen;
    }

    .dash4{
        color: black;
        background-color: lightgrey;
    }

    .dash4:hover{
        background-color: darkgrey;
    }
</style>
</head>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-4">
            <h4 class="page-title"> 
                <a href="quotationreport.php" style="color:black;">Quotation Report</a>
            </h4>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
            
                
                <?php 
                        $cy = $cyear;
                        echo '<select class="form-select" onchange="location = this.value;" style="width:130px; position: absolute; right:10px; top :5px;" >';
                        echo '<option value="" hidden>-Select Year-</option>';
                        while ($cyear != ($pyear-1)){
                            echo '<option value="quotationreportyear.php?year='.$cyear.'">'.$cyear.'</option>';
                            $cyear--;
                        }
                        
                        echo '</select>';
                    
                ?>
                            
            
        </div>

    </div>
</div>

<div id="chartContainer" style="height: 370px; width: 100%; "></div>
<script src="js/canvasjs.min.js"></script>

<div style="position: absolute;top: 395px;width: 63px;background-color:  white;">
    <span style="color: white;">.</span>
</div>

<div style="position: absolute;top: 395px; right: 0px; width: 63px;background-color: white;">
    <span style="color: white;">.</span>
</div>

<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">

          <div class="row">
            
            <div class="col-lg-3 col-md-12">
            <a href="quotationreport.php?filter=3">
              <div class="dash3 white-box analytics-info">
                <h3 class="box-title">Accepted</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $row1[0];?></span>
                  </li>
                </ul>
              </div>
            </a>
            </div>
            
            <div class="col-lg-3 col-md-12">
            <a href="quotationreport.php?filter=2">
              <div class="dash1 white-box analytics-info">
                <h3 class="box-title">Rejected </h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $row2[0];?></span>
                  </li>
                </ul>
              </div>
            </a>
            </div>

            <div class="col-lg-3 col-md-12">
            <a href="quotationreport.php?filter=1">
              <div class="dash2 white-box analytics-info">
                <h3 class="box-title">Pending </h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $row3[0];?></span>
                  </li>
                </ul>
              </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-12">
            <a href="quotationreport.php?filter=5">
              <div class="dash4 white-box analytics-info">
                <h3 class="box-title">Deleted </h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $row4[0];?></span>
                  </li>
                </ul>
              </div>
              </a>
            </div>
            
          </div>
<div class="row">
    
    <?php 
        echo '<div class = "col-5">';
        echo '<h3 style="margin-right:10px;"> Total ';
        if ($filter == 1){
            $f = ' Pending ';
            echo' <a class="text-warning"> Pending </a>';
        }
        else if ($filter == 2){
            $f = ' Rejected ';
            echo' <a class="text-danger"> Rejected </a>';
        }
        else if ($filter == 3){
            $f = ' Accepted ';
            echo' <a class="text-success"> Accepted </a>';
        }
        else if ($filter == 5){
            $f = ' Deleted ';
            echo' <a class="text-secondary"> Deleted </a>'; 
        }
        echo 'Quotation : '.mysqli_num_rows($result).'</h3>'; 
        echo '</div>';

    echo '<div class="col-5 ms-auto" style="display:flex; justify-content: right;">
    <a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpage('.$cy.', '.$pyear.', '.$filter.', );" style="width:200px; margin-bottom:10px;">Print</a>
</div>';

?>

</div>
      <div id="printarea">
            <div  class="white-box" style="width: 100%">
                <div id="printarea1" class="table-responsive text-center">
                    <table id="printarea2" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="border-top-0">No.</th>
                                <th class="border-top-0">Quotation ID</th>
                                <th class="border-top-0">Service ID</th>
                                <th class="border-top-0">Customer Name</th>
                                <th class="border-top-0">Date </th>
                                <th class="border-top-0">Price (RM) </th>
                                <?php 
                                    if($filter == '2'){
                                        echo '<th class="border-top-0">Reasons</th>';
                                    }
                                    else if(!($filter)){
                                        echo '<th class="border-top-0">Status</th>';
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $i = 1;
                                $start = 11;
                                $end = 20;
                                if(mysqli_num_rows($result)>0){
                                while ($row = mysqli_fetch_array($result)){
                                    /*if($i < $start || $i > $end ){
                                        $i++;
                                        continue;
                                    }*/

                                    echo "<tr>";
                                    echo "<td> ".$i++."</td>";
                                    echo "<td> ".$row['q_quotationID']."</td>";
                                    echo "<td> ".$row['q_serviceID']."</td>";
                                    echo "<td> ".$row['c_customerName']."</td>";
                                    echo "<td> ".$row['q_date']."</td>";
                                    echo "<td> ".$row['q_totalAmount']."</td>";
                                    if($filter == '2'){
                                        echo "<td><span class='fw-normal' style='white-space: pre-line'>".$row['q_reason']."</span></td>";
                                    }
                                    else if(!($filter)){
                                        if($row['q_statusID']=='1'){
                                            echo "<td><span class='fw-normal text-warning'>".$row['st_details']."</span></td>";
                                        }else if ($row['q_statusID']=='2'){
                                            echo "<td><span class='fw-normal text-danger'>".$row['st_details']."</span></td>";
                                        }else if ($row['q_statusID']=='3'){
                                            echo "<td><span class='fw-normal text-success'>".$row['st_details']."</span></td>";
                                        }else if ($row['q_statusID']=='5'){
                                            echo "<td><span class='fw-normal text-secondary'>Deleted</span></td>";
                                        }
                                    }  
                                    echo "</tr>";
                                }
                                }
                                else{
                                    echo "<tr>";
                                    echo "<td>No Quotation found...</td>";
                                    echo "</tr>";
                                }
                            ?>    
                                                               
                        </tbody>
                    </table>
                </div>

                            
                <!-- ============================================================== -->
                <!-- End Table -->
                <!-- ============================================================== -->

            </div>
        </div>
<?php
echo '<div class="col-5 ms-auto" style="display:flex; justify-content: right;">
    <a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpage('.$cy.', '.$pyear.', '.$filter.', );" style="width:200px; margin-bottom:10px;">Print</a>';

?>

    <button id="btnExport" class="btn btn-secondary btn-lg" onclick="exportReportToExcel(this)" style="width:200px; margin-left:15px; margin-bottom:10px;">EXPORT REPORT</button>
</div>

        </div>
    </div>

</div>


<script>
    function exportReportToExcel() {
      let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') 
      TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
        name: `quotationreport.xlsx`, // fileName you could use any name
        sheet: {
          name: 'Sheet 1' // sheetName
        }
      });
    }
    
    function printpage(cy, py, f) {
        if(f == 1){
            var filter = "Pending";
        }
        else if(f == 2){
            var filter = "Rejected";
        }
        else if(f == 3){
            var filter = "Accepted";
        }
        else if(f == 5){
            var filter = "Deleted";
        }
        else{
            var filter = "";
        }
        var mywindow = window.open('', 'PRINT', 'height=800,width=1200');

        mywindow.document.write('<!DOCTYPE html><html dir="ltr" lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>POWEREC</title><link rel="canonical" href="" /><link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png"><link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet"><link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> <!-- Custom CSS --><link href="css/style.min.css" rel="stylesheet"><link href="css/quotation.css" rel="stylesheet">');
    
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h3 style="display:block;">POWEREC '+ filter + ' Quotation Report Year ' + py + ' - ' + cy +'</h3>');
        mywindow.document.write('<div class="page-wrapper" ><div class="container-fluid" style="display: flex; justify-content: center;"> ');
        mywindow.document.write('<div class = "row" style="opacity: 70%; display: inline; position:fixed; right:20px; justify-content: right;"><a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpg2();" style="width:200px; margin-left:20px;">Print</a></div>');
        mywindow.document.write(document.getElementById("printarea").innerHTML);
        mywindow.document.write('</div></div></body>');
        mywindow.document.write(document.getElementById("java").innerHTML);
        mywindow.document.write('</html>');

        return true;
    }
</script>
<div id="java">
    <script>
    function printpg2() {

        var printButton = document.getElementById("printbtn");
 
        printButton.style.visibility = 'hidden';
        
        window.print();
       
        printButton.style.visibility = 'visible';

    }

    </script>
</div>

<?php include 'footer.php';?>