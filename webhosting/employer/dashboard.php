<?php include 'header.php'; 
echo '<div id="phplang">';
$u_userID=$_SESSION['u_userID'];

$fyear = date('Y');
if(isset($_GET['year'])){
    $fyear = $_GET['year'];
}

$sqlq = "SELECT COUNT(*) FROM tb_quotation";
$resultq = mysqli_query($con, $sqlq);
$rowq = mysqli_fetch_array($resultq);

$sqls = "SELECT COUNT(*) FROM tb_service";
$results = mysqli_query($con, $sqls);
$rows = mysqli_fetch_array($results);

$sqlc = "SELECT COUNT(*) FROM tb_customer";
$resultc = mysqli_query($con, $sqlc);
$rowc = mysqli_fetch_array($resultc);

$sqlu = "SELECT COUNT(*) FROM tb_user";
$resultu = mysqli_query($con, $sqlu);
$rowu = mysqli_fetch_array($resultu);

$sqldate = "SELECT MIN(q_date) FROM tb_quotation WHERE q_statusID = '3'";
$resultdate = mysqli_query($con, $sqldate);
$rowdate = mysqli_fetch_array($resultdate);
$date = date("y",strtotime($rowdate[0]));
$year = DateTime::createFromFormat('y', $date);
$pyear = $year->format('Y');
$cyear = date('Y');

$sql = "SELECT MONTH(q_date), SUM(q_totalAmount) FROM tb_quotation
        WHERE YEAR(q_date) = '$fyear' AND q_statusID = '3'
        GROUP BY MONTH(q_date)
        ORDER BY MONTH(q_date)";
$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result)-1;

while($row = mysqli_fetch_array($result)){
  $n[] = $row[0]-1;
  $y = $row[0]-1;
  $data[$y] = $row[1];
}

$i=0;
$x=0;
while($i < 12){
  if($n[$x] != $i){
    $data[$i] = 0;
  }
  else if($x < $num){
    $x++;
  }
  $i++;
}


$dataPoints = array( 
  array("label"=>"Jan", "y"=>$data[0]),
  array("label"=>"Feb", "y"=>$data[1]),
  array("label"=>"Mar", "y"=>$data[2]),
  array("label"=>"Apr", "y"=>$data[3]),
  array("label"=>"May", "y"=>$data[4]),
  array("label"=>"Jun", "y"=>$data[5]),
  array("label"=>"Jul", "y"=>$data[6]),
  array("label"=>"Aug", "y"=>$data[7]),
  array("label"=>"Sept", "y"=>$data[8]),
  array("label"=>"Oct", "y"=>$data[9]),
  array("label"=>"Nov", "y"=>$data[10]),
  array("label"=>"Dec", "y"=>$data[11]),
)

?> 
<head>
    <script>
      window.onload = function() {
      
      var chart = new CanvasJS.Chart("chartContainer", {
         
          animationEnabled: true,
          title: {
              text: "Total Sales in Quotation"
          },
          subtitles: [{
              text: "<?php //echo $fyear; ?>"
          }],
          data: [{
              type: "line",
              yValueFormatString: "RM #,##0.00",
              indexLabel: "{} ({y})",
              dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
          }]
      });
      chart.render();
       
      }
</script>
</div>
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
        background-color: skyblue;
    }

    .dash4:hover{
        background-color: steelblue;
    }
</style>
</head>
    
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

            
            <!-- Container fluid  -->
            <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Three charts -->
          <!-- ============================================================== -->
          <div class="row" style="display:flex;">
            
            <div class="col-lg-3 col-md-12">
            <a href="quotationreport.php">
              <div class="dash1 white-box analytics-info">
                <h3 class="box-title">Total Quotations</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $rowq[0];?></span>
                  </li>
                </ul>
              </div>
            </a>
            </div>
            
            <div class="col-lg-3 col-md-12">
            <a href="servicereport.php">
              <div class="dash2 white-box analytics-info">
                <h3 class="box-title">Total Services</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $rows[0];?></span>
                  </li>
                </ul>
              </div>
            </a>
            </div>

            <div class="col-lg-3 col-md-12">
            <a href="customerreport.php">
              <div class="dash3 white-box analytics-info">
                <h3 class="box-title">Total Customers</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $rowc[0];?></span>
                  </li>
                </ul>
              </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-12">
            <a href="userreport.php">
              <div class="dash4 white-box analytics-info">
                <h3 class="box-title">Total Users</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo $rowu[0];?></span>
                  </li>
                </ul>
              </div>
              </a>
            </div>
            
          </div>


<?php      
  $sqlh = "SELECT * FROM tb_quotation WHERE YEAR(q_date) = '$fyear' AND q_statusID = '3' AND q_totalAmount = (SELECT MAX(q_totalAmount) FROM tb_quotation WHERE YEAR(q_date) = '$fyear' AND q_statusID = '3')";
  $resulth = mysqli_query($con, $sqlh);
  $rowh = mysqli_fetch_array($resulth);

  $sqll = "SELECT * FROM tb_quotation WHERE YEAR(q_date) = '$fyear' AND q_statusID = '3' AND q_totalAmount = (SELECT MIN(q_totalAmount) FROM tb_quotation WHERE YEAR(q_date) = '$fyear' AND q_statusID = '3')";
  $resultl = mysqli_query($con, $sqll);
  $rowl = mysqli_fetch_array($resultl);

  $sqla = "SELECT AVG(q_totalAmount) FROM tb_quotation WHERE YEAR(q_date) = '$fyear' AND q_statusID = '3'";
  $resulta = mysqli_query($con, $sqla);
  $rowa = mysqli_fetch_array($resulta);
  $avgsale = number_format($rowa[0], 2, '.', '')
?>
        
          <!-- ============================================================== -->
          <!-- QUOTATION YEARLY SALES -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
              <div id="printarea" class="white-box">
  
                <div class="row">
                  <div class="col-5" style="display:;">  
                    <h1 class="" style="display:">Annual Sales <?php echo ' '.$fyear ?> </h1>
                  </div>
                   <div class="col-3" style="margin-left:auto; margin-right:0px;">
                    
                  <?php 
                          echo '<select class="form-select" onchange="location = this.value;" style="display:inline;" >';
                          echo '<option value="" hidden>-Select Year-</option>';
                          while ($cyear != ($pyear-1)){
                              if($cyear == $fyear){
                                echo '<option value="dashboard.php?year='.$cyear.'"selected>'.$cyear.'</option>';
                              }
                              else{
                                echo '<option value="dashboard.php?year='.$cyear.'">'.$cyear.'</option>';
                              }
                              $cyear--;
                          }                         
                          echo '</select>';
                  ?>
                </div>    
              </div>

                <div class="row" style="display:flex;">

                <div class="col-lg-4 col-md-12">
                <div class="white-box analytics-info" style="background-color: honeydew;">
                <h3 class="box-title">Highest Sales</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text-sm"><?php 
                        $d = date("d M",strtotime($rowh["q_date"]));
                        echo " RM ".$rowh['q_totalAmount']." <span style='font-size:16px;'> ( ".$d." )</span>";         
                      
                      ?>
                    </span>
                  </li>
                </ul>
              </div>
            </div>

              <div class="col-lg-4 col-md-12">
              <div class="dash3 white-box analytics-info" style="background-color: seashell;">
                <h3 class="box-title">Lowest Sales</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php 
                      $d = date("d M",strtotime($rowl["q_date"]));
                      echo " RM ".$rowl['q_totalAmount']." <span style='font-size:16px;'> ( ".$d." )</span>";?>
                        
                    </span>
                  </li>
                </ul>
              </div>
            </div>

              <div class="col-lg-4 col-md-12">
              <div class="dash3 white-box analytics-info" style="background-color: aliceblue;">
                <h3 class="box-title">Average Sales</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo " RM ".$avgsale;?></span>
                  </li>
                </ul>
              </div>
            </div>

          </div> <!--end of row-->

                <div class="d-md-flex">

                  <div id="chartContainer" class="text-center" style="height: 500px; width: 100%; color:red;"></div>
                  <script src="js/canvasjs.min.js"></script>

                </div>

                </div>
            </div>
        </div>


        <div style="position: absolute;bottom: 130px;width: 87px;background-color:white;">
            <span style="color: white;">.</span>
        </div>

        <div style="position: absolute;bottom: 130px; right: 50px; width: 63px;background-color: white;">
            <span style="color: white;">.</span>
        </div>


    </div>
                
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<script>
    function printpage() {

        var mywindow = window.open('', 'PRINT', 'height=800,width=1200');

        mywindow.document.write('<!DOCTYPE html><html dir="ltr" lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>POWEREC</title><link rel="canonical" href="" /><link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png"><link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet"><link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> <!-- Custom CSS --><link href="css/style.min.css" rel="stylesheet"><link href="css/quotation.css" rel="stylesheet">');
        mywindow.document.write(document.getElementById("phplang").innerHTML);
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById("printarea").innerHTML);
        mywindow.document.write(document.getElementById("space").innerHTML);
        mywindow.document.write('</body>');
        mywindow.document.write('</html>');

        mywindow.document.close();
        mywindow.print();
        //mywindow.close();
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



<?php include 'footer.php'?>