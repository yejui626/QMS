<?php include 'header.php';
include '../dbconnect.php';
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
$u_username= $_SESSION['u_username']; 
$u_userID=$_SESSION['u_userID'];



$sqlall = "SELECT * FROM tb_customer
   
    WHERE  c_statusID ='6' || '7' ";

$sqla = "SELECT * FROM tb_customer WHERE c_statusID ='6' ";
$sqli = "SELECT * FROM tb_customer WHERE c_statusID ='7' ";


$totaluser = 0;
$totalactive = 0;
$totalinactive = 0;

$result = mysqli_query($con, $sqlall); //for total user
$result1 = mysqli_query($con, $sqla);//for total admin
$result2 = mysqli_query($con, $sqli);//for total admin



while($row=mysqli_fetch_array($result)){
    $totaluser = $totaluser +1;
}

while($row1=mysqli_fetch_array($result1)){
    $totalactive = $totalactive +1;
}

while($row2=mysqli_fetch_array($result2)){
    $totalinactive = $totalinactive +1;
}




$ptotalactive=$totalactive/$totaluser*100;
$ptotalinactive=$totalinactive/$totaluser*100;




$dataPoints = array( 
    array("label"=>"Active customer", "y"=>$ptotalactive),
    array("label"=>"Inactive customer", "y"=>$ptotalinactive)
    
)


?>





<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Customer Status"
    },
    subtitles: [{
        text: ""
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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>



<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">

          <div class="row">
            
            <div class="col-lg-3 col-md-12">
            <a href="customeractivereport.php">
              <div class="white-box analytics-info">
                <h3 class="box-title">Total Active Customer</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text-success">
                        <?php

                        $acust = "SELECT * from tb_customer WHERE c_statusID = '6'";

                        if ($resultacust = mysqli_query($con, $acust)) {

                      // Return the number of rows in result set
                      $rowcountacust = mysqli_num_rows( $resultacust );
    
                        // Display result
                     printf($rowcountacust);
 }



                      ?>
                    </span>
                  </li>
                </ul>
              </div>
            </a>
            </div>
            
            <div class="col-lg-3 col-md-12">
            <a href="customerinactivereport.php">
              <div class="white-box analytics-info">
                <h3 class="box-title">Total Inactive Customer</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text-purple">
                         <?php

                        $incust = "SELECT * from tb_customer WHERE c_statusID = '7'";

                        if ($resultincust = mysqli_query($con, $incust)) {

                      // Return the number of rows in result set
                      $rowcountincust = mysqli_num_rows( $resultincust );
    
                        // Display result
                     printf($rowcountincust);
 }



                      ?>
                    </span>
                  </li>
                </ul>
              </div>
            </a>
            </div></div>
             <?php
echo '<div class="col-5 ms-auto" style="display:flex; justify-content: right;">
    <a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpage();" style="width:200px; margin-bottom:10px;">Print</a>
</div>';

?>
            
          

          <div class="row" id="printarea">
            <div class="white-box">
                <div class="table-responsive">
                    <table class="table table-hover" id = "data">
                      <h3 class="box-title">Active Customer</h3>
                        <thead>
                            <tr>
                                <th class="border-top-0">No.</th>
                                <th class="border-top-0">Customer ID</th>
                                <th class="border-top-0">Customer Name</th>
                                <th class="border-top-0">Phone No </th>
                                <th class="border-top-0">Address </th>
                                <th class="border-top-0">Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                               
                                <?php 

                                        $resultcount=0;
                                        $sqlp = "  SELECT * FROM tb_customer
                                                    LEFT JOIN tb_address on tb_customer.c_addressID= tb_address.a_addressID
                                                    LEFT JOIN tb_user ON tb_customer.c_userID = tb_user.u_userID
                                                    LEFT JOIN tb_status ON tb_customer.c_statusID = tb_status.st_statusID 
                                                    WHERE c_statusID= '6' ";
       
                                        
                                        $resultp = mysqli_query($con, $sqlp);

                                             while($rowp=mysqli_fetch_array($resultp))
                                                 {
                                                      
                                                        
                                                        $resultcount = $resultcount +1;
                                                        echo "<tr>";
                                                        echo "<td>".$resultcount."</td>";
                                                        echo "<td>".$rowp['c_custID']."</td>";
                                                        echo "<td>".$rowp['c_customerName']."</td>";
                                                         echo "<td>".$rowp['c_phoneNo']."</td>";
                                                        echo "<td>".$rowp['a_street']. "<br>" .$rowp['a_postcode']. " ".$rowp['a_city']. "<br>" .$rowp['a_state']. "</td>";
                                                         
                                                            if($rowp['c_statusID']== 6){  
                                                        echo "<td><span class ='text-success'>".$rowp['st_details']."</span></td>";
                                                             }
                                                          if($rowp['c_statusID']== 7){  
                                                        echo "<td><span style='color:red;'>".$rowp['st_details']."</span></td>";
                                                             }
                          
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

<script>
    function printpage() {
       
        var mywindow = window.open('', 'PRINT', 'height=800,width=1200');

        mywindow.document.write('<!DOCTYPE html><html dir="ltr" lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>POWEREC</title><link rel="canonical" href="" /><link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png"><link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet"><link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> <!-- Custom CSS --><link href="css/style.min.css" rel="stylesheet"><link href="css/quotation.css" rel="stylesheet">');
    
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h3 style="display:block;">POWEREC Active Customer Report</h3>');
        mywindow.document.write('<div class="page-wrapper" ><div class="container-fluid" style="display: flex; justify-content: center;"> ');
        mywindow.document.write('<div class = "row" style="opacity: 70%; display: inline; position:fixed; right:20px; justify-content: right;"><a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpg2();" style="width:200px; margin-left:20px;">Print</a></div>');
        mywindow.document.write(document.getElementById("printarea").innerHTML);
        mywindow.document.write('</div></div></body>');
        mywindow.document.write(document.getElementById("java").innerHTML);
        mywindow.document.write('</html>');

        return true;
    }
</script>


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