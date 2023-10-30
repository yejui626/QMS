<?php include 'header.php'; 

$sql = "SELECT * FROM tb_user
   LEFT JOIN tb_status ON tb_user.u_statusID = tb_status.st_statusID
    WHERE  u_statusID ='6' || '7' ";

$sql1 = "SELECT * FROM tb_user WHERE u_type ='1' ";
$sql2 = "SELECT * FROM tb_user WHERE u_type ='2' ";
$sql3 = "SELECT * FROM tb_user WHERE u_type ='3' ";

$totaluser = 0;
$totaladmin = 0;
$totalemployee = 0;
$totalcustomer = 0;
$totalactive = 0;
$totalinactive = 0;

$result = mysqli_query($con, $sql); //for total user
$result1 = mysqli_query($con, $sql1);//for total admin
$result2 = mysqli_query($con, $sql2);//for total admin
$result3 = mysqli_query($con, $sql3);//for total admin


while($row=mysqli_fetch_array($result)){
    $totaluser = $totaluser +1;
}

while($row1=mysqli_fetch_array($result1)){
    $totaladmin = $totaladmin +1;
}

while($row2=mysqli_fetch_array($result2)){
    $totalemployee = $totalemployee +1;
}

while($row3=mysqli_fetch_array($result3)){
    $totalcustomer = $totalcustomer +1;
}


$ptotaladmin=$totaladmin/$totaluser*100; 
$ptotalemployee=$totalemployee/$totaluser*100;
$ptotalcustomer=$totalcustomer/$totaluser*100;




$dataPoints = array( 
    array("label"=>"admin", "y"=>$ptotaladmin),
    array("label"=>"employee", "y"=>$ptotalemployee),
    array("label"=>"customer", "y"=>$ptotalcustomer)
    
)
 
 
?>






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









<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"> 
                <a href="dashboard.php" style="color:black;">Dashboard</a>
            </h4>
        </div>
       

    </div>
</div>



            <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Type of User"
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

<div style="position: absolute;top: 395px;width: 63px;background-color:  white;">
    <span style="color: white;">.</span>
</div>

<div style="position: absolute;top: 395px; right: 0px; width: 63px;background-color: white;">
    <span style="color: white;">.</span>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

          <div class="row justify-content-center" >

             <div class="col-lg-3 col-md-12">
            <a href="userreport.php">
              <div class="dash1 white-box analytics-info">
                <h3 class="box-title">Total User</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo " $totaluser"; ?></span>
                  </li>
                </ul>
              </div>
            </a>
            </div>
            
            <div class="col-lg-3 col-md-12">
            <a href="useradminreport.php">
              <div class="dash2 white-box analytics-info">
                <h3 class="box-title">Total Admin</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo " $totaladmin"; ?></span>
                  </li>
                </ul>
              </div>
            </a>
            </div>
            
            <div class="col-lg-3 col-md-12">
            <a href="useremployeereport.php">
              <div class="dash3 white-box analytics-info">
                <h3 class="box-title">Total Employee</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo " $totalemployee"; ?></span>
                  </li>
                </ul>
              </div>
            </a>
            </div>

            <div class="col-lg-3 col-md-12">
            <a href="usercustomerreport.php">
              <div class="dash4 white-box analytics-info">
                <h3 class="box-title">Total Customer</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                  <li class="ms-auto">
                    <span class="counter text"><?php echo " $totalcustomer"; ?></span>
                  </li>
                </ul>
              </div>
              </a>
            </div>

           
            
          </div>

          <?php
echo '<div class="col-5 ms-auto" style="display:flex; justify-content: right;">
    <a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpage();" style="width:200px; margin-bottom:10px;">Print</a>
</div>';

?>


            <div class="row" id="printarea">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">All User</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">User ID</th>
                                            <th class="border-top-0">User Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">User type</th>
                                            <th class="border-top-0">User Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                        $resultcount=0;
                                        $sqlp = "SELECT * FROM tb_user
                                                LEFT JOIN tb_status ON tb_user.u_statusID = tb_status.st_statusID
                                                 
                                                ORDER BY u_statusID, u_type";

                                        $resultp = mysqli_query($con, $sqlp);

                                             while($rowp=mysqli_fetch_array($resultp))
                                                 {
                                                      
                                                      $resultcount = $resultcount +1;
                                                        echo "<tr>";
                                                        echo "<td>".$resultcount."</td>";
                                                        echo "<td>".$rowp['u_userID']."</td>";
                                                        echo "<td>".$rowp['u_username']."</td>";
                                                         echo "<td>".$rowp['u_email']."</td>";
                                                         if($rowp['u_type'] == 1){
                                                           echo "<td>"."admin"."</td>";
                                                         }

                                                          else if($rowp['u_type'] == 2){
                                                         echo "<td>"."employee"."</td>";
                                                          }

                                                          else if($rowp['u_type'] == 3){
                                                            echo "<td>"."customer"."</td>";
                                                             }
                                                            if($rowp['u_statusID']== 6){  
                                                        echo "<td><span class ='text-success'>".$rowp['st_details']."</span></td>";
                                                             }
                                                          if($rowp['u_statusID']== 7){  
                                                        echo "<td><span style='color:red;'>".$rowp['st_details']."</span></td>";
                                                             }
                          
                                                      
                          

                                                            }


                                      
                                                             ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<?php
echo '<div class="col-5 ms-auto" style="display:flex; justify-content: right;">
    <a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpage();" style="width:200px; margin-bottom:10px;">Print</a>
</div>';

?>


        </div>
    </div>

</div>

<script>
    function printpage() {
       
        var mywindow = window.open('', 'PRINT', 'height=800,width=1200');

        mywindow.document.write('<!DOCTYPE html><html dir="ltr" lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex,nofollow"><title>POWEREC</title><link rel="canonical" href="" /><link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png"><link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet"><link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> <!-- Custom CSS --><link href="css/style.min.css" rel="stylesheet"><link href="css/quotation.css" rel="stylesheet">');
    
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h3 style="display:block;">POWEREC User Report</h3>');
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