<?php 

if(!session_id())
{
    session_start();
}

include '../dbconnect.php';

if(isset($_GET['id'])){
   $qid = $_GET['id'];
}

//Retrieve booking (JOIN)
$sql = "SELECT * FROM tb_quotation 
        LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
        WHERE st_statusID != 5 AND q_quotationID = '$qid'
        ";

$result = mysqli_query($con, $sql);
$cname = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="powerec technology service, powerec, service, clean, repair, supply, air conditioning, refrigeration, power supply, telecommunication cabling, fire alarm, fogging maintenance, sanitary">
    <meta name="description"
        content="POWEREC provide various services provision such as electrical & electronic repair, air conditioning and refrigeration supply & repair, power supply & telecommunications cabling works, fire fighting & fire alarm system, fogging maintenance work, sewage maintenance work, cleaning of buildings & cleaning area services and sanitary maintenance work.">
    <meta name="robots" content="noindex,nofollow">
    <title>POWEREC</title>
    <link rel="canonical" href="" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/quotation.css" rel="stylesheet">

    <style>
    	@media print {

		    html, body {
		      height:100vh; 
		      margin: 0 !important; 
		      padding: 0 !important;
		      overflow: hidden;
		    }

		}
    </style>

</head>
<body>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->

        <div class="page-wrapper">
        	<div class="container-fluid">                
                        <div class="white-box" style="justify-content: center;">
                            <div class="row" name = "header" style="justify-content: center;">
                            	<div class="col-10 text-center" style="padding-right:0px;">
                            		<h3 style="display:inline;"> POWEREC TECHNOLOGY SERVICES </h3>
                            		<p style="display:inline;"> (JM0189707-T) </p>
                            	</div>
                            </div>

                            <span style="display: inline-block;width: 100%;border-top: 0.4px solid black;"></span>  

                            <div class="row" name = "address" style="justify-content: center;">
                            	<div class="col-10 text-center" style="padding-right:0px;">
                            		<b style="display:inline;">  
                            			No.60A, Jalan Sena 1, Taman Rinting, 81750 Masai, Johor Bahru, Johor.  
                            		</b>
                            	</div>
                            </div>

                            <div class="row" name = "contact" style="justify-content: center; max-width: content; margin-bottom:10px;">
                            	<div class="col-10 text-center" style="">
                            		<b style="display:inline;">  
                            			No.Tel: 07-386 3448 No.Fax: 07-386 3449 H/P: 019-712 3224 
                            		</b><br>
                            		<b style="display:inline;"> 
                            			Email: powerecjb@gmail.com 
                            		</b>
                            	</div>
                            </div>

                            <div class="row" name = "contact" style="justify-content: center; max-width: content; margin-bottom:0px;">
                            	<div class="col-10 text-center" style="padding-bottom:10px;">
                            		<h3 style="display:inline; color:red;">  
                            			<strong>QUOTATION</strong>
                            		</h3>
                            	</div>
                            </div>
                         
                            <div class="row">                              
                                <div class="col-8">                                                                      
                                    <p>
                                        <label style="float: left; margin-right:20px;">
                                            <b> Quotation ID : </b>
                                        </label>
                                        <?php
                                            echo $cname["q_quotationID"];
                                        ?>

                                    </p>

                                    <p>
                                        <label style="float: left; margin-right:20px;">
                                            <b> M/S : </b>
                                        </label>

                                        <?php

                                        $cid = $cname['c_custID'];
                                        $sql2 = "SELECT * FROM tb_address WHERE a_addressID = (SELECT c_addressID FROM tb_customer WHERE c_custID = '$cid')";
                                        $result2 = mysqli_query($con, $sql2);
                                        $caddress = mysqli_fetch_array($result2);

                                        echo'<label>'.$caddress["a_street"].'</label>';
                                        echo'<br>';
                                        echo'<label style="padding-left: 52px;">'.$caddress["a_postcode"].', </label>';
                                        echo'<label style="padding-left: 10px;">'.$caddress["a_city"].', </label>';
                                        echo'<br>';
                                        echo'<label style="padding-left: 52px;">'.$caddress["a_city"].', </label>';

                                        ?>
                                    </p>
                                </div>

                                <div class="col-4">
                                    <p>
                                        <label style="float: left; margin-left:auto; margin-right: 10px;" >
                                            <b> Date : </b>
                                        </label>

                                        <?php                                           
                                            echo $cname["q_date"];
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div class="row">                              
                                <div class="col-lg-3">
									<p>
                                        <label style="float: left; padding-right: 20px;">
                                            <b> RE : </b>
                                        </label>

                                        <?php                                           
                                                                                       
                                            echo "<span class='fw-normal' style='white-space: pre-line'><b>".strtoupper($cname['q_topic'])."</b></span>";
                                        ?>
                                        
                                    </p> 
								</div>
                            </div>
                            

                            <div class="table-responsive">
                                <table class="table table-condensed table-bordered" id="emptbl" >
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Qty</th>
                                            <th class="border-top-0">Unit Price </th>
                                            <th class="border-top-0">Amount (RM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <?php
                                                $sql3 = "SELECT * FROM tb_item WHERE i_quotationID = '$qid'";
                                                $result3 = mysqli_query($con, $sql3);
                                                $i = 1;
                                                
                                                while($citem = mysqli_fetch_array($result3)){
                                                    echo "<tr>";
                                                    echo "<td style='padding: 0px 10px 0px;'> ".$i++."</td>";
                                                    echo "<td style='width:50%; padding: 0px 10px 0px;'> ";
                                                        echo "<span class='fw-normal' style='white-space: pre-line'>".$citem[2]."</span>";                                        
                                                    echo "</td>";

                                                    echo "<td style='width:10%; padding: 0px 10px 0px;'> ";
                                                        echo $citem[3];
                                                        echo "&nbsp";

                                                        if ($citem[4]==1){
                                                            echo "NOS";
                                                        }
                                                        else if ($citem[4]==2){
                                                            echo "LOS";
                                                        }
                                                        else if ($citem[4]==3){
                                                            echo "UNIT";
                                                        }
                                                        else{
                                                            echo "SET";
                                                        }

                                                    echo "</td>";

                                                    echo "<td style='width:15%; padding: 0px 10px 0px;'> ";
                                                        echo $citem[5];
                                                    echo "</td>";

                                                    echo "<td style='padding: 0px 10px 0px;'> ";
                                                        echo $citem[6];
                                                    echo "</td>";
                                                }
                                            ?>
                                        </tr>                               
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th id="total" colspan="4" style="text-align: right; padding-right:20px;">Total (RM) : </th>
                                        <td style="width:150px;">
                                            <?php echo $cname["q_totalAmount"] ?>
                                        </td>
                                    </tr>
                                    </tfoot>
                                      
                                </table>
                                 
                            </div>

                            <div class="d-md-flex mb-3" style="position: relative; margin-top:10%;">                              
                                <div >
									
                                        <label>
                                            Prepared By,
                                        </label>
                                        <br>
                                        <label style="padding-bottom: 50px;">
                                            <b> POWEREC TECHNOLOGY SERVICES </b>
                                        </label>
                                        <br>

                                        <span style="display: inline-block;width: 200px;border-top: 0.4px solid black;"></span>
                                        <br>
                                        <label>
                                            <b> Rizal bin Saiman </b>
                                        </label>
								</div>
                            </div>

                        </div> <!--white page-->
                        <div class = "row" style="justify-content: center;">
                        	<a id="backbtn" type="button" class="btn btn-secondary btn-lg" href="quotationview.php?id=<?php echo $cname['q_quotationID'] ?>" style="width:200px;">Back</a>
                        	<a id="printbtn" type="button" class="btn btn-primary btn-lg" onClick="printpg();" style="width:200px; margin-left:20px;">Print</a>
                        
                    	</div>
                        
                        

                    </div> <!--container page-->
                </div> <!--wrapper page-->
        </body>

<script>
	function printpg() {

	    //Get the print button and put it into a variable
	    var printButton = document.getElementById("printbtn");
	    var backButton = document.getElementById("backbtn");

	    //Set the button visibility to 'hidden' 
	    printButton.style.visibility = 'hidden';
	    backButton.style.visibility = 'hidden';

	    //Print the page content
	    window.print();

	    //Restore button visibility
	    printButton.style.visibility = 'visible';
	    backButton.style.visibility = 'visible';

	}

</script>

    </html>