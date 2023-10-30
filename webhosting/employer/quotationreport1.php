<?php include 'header.php'; 

$u_userID=$_SESSION['u_userID'];



$sql = "SELECT * FROM tb_quotation 
        LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE q_statusID = '1'
        ORDER BY q_date DESC" ;


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



$dataPoints = array( 
	array("label"=>"Deleted", "y"=>$row4[0]),
	array("label"=>"Rejected", "y"=>$row2[0]),
    array("label"=>"Pending", "y"=>$row3[0]),
    array("label"=>"Accepted", "y"=>$row1[0]),
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
        text: "Pending"
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

</head>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-4">
            <h4 class="page-title"> 
                <a href="quotationreport1.php" style="color:black;">Quotation Report</a>
            </h4>
        </div>

    </div>
</div>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
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
            <a href="quotationreport3.php">
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
            <a href="quotationreport2.php">
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
            <a href="quotationreport1.php">
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
            <a href="quotationreport4.php">
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

      <div>
            <div  class="white-box" style="width: 100%">
                <div class="table-responsive text-center">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="border-top-0">No.</th>
                                <th class="border-top-0">Quotation ID</th>
                                <th class="border-top-0">Service ID</th>
                                <th class="border-top-0">Customer Name</th>
                                <th class="border-top-0">Date </th>
                                <th class="border-top-0">Price (RM) </th>
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

        </div>
    </div>

</div>


<?php include 'footer.php';?>